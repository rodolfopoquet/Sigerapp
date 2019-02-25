<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Equipamentos;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reservas::all();
        
        return view('reservas.index', compact('reservas'));
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos= Equipamentos::all();
        $reservas =  Reservas::all();

        return view('reservas.create')->withEquipamentos($equipamentos);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fkequipamentos'          => 'required|unique:reservas|max:30',
            'dtagendamento'           => 'required|date',
            'horario'                 => 'required',
          
             ]
     
             );
               $reservas = new Reservas([
                 'fkequipamentos'           => $request->get('fkequipamentos'),
                 'user_id'                  =>  auth()->user()->id,
                 'dtagendamento'            => $request->get('dtagendamento'),
                 'horario'                  => $request->get('horario'),
                 
               ]);

               if($reservas){
                   //bloquear o item e atualizar o seu 'status'
                   /*
                   fazer o select do item pela chave*/

                   
                   $equipamento = Equipamentos::find($request->get('fkequipamentos'));
                
                   $equipamento->status = 'Indisponivel';
                   $equipamento->save();                   
               }

                 
               
               $reservas->save();
               return redirect('/reservas')->with('success', 'Reserva  realizada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipamentos=Equipamentos::all();
        $reservas = Reservas::find($id);

        return view('reservas.edit', compact('reservas','equipamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fkequipamentos'          => 'required|max:60',
            'solicitante'             => 'required|max:60',
            'dtagendamento'           => 'required|date',
            'horario'                 => 'required|max:60',
           
             ]
        
             
             );
                $reservas = Reservas::find($id);
                $reservas->fkequipamentos         = $request->get('fkequipamentos');
                $reservas->user_id                =  auth()->user()->id;
                $reservas->dtagendamento          = $request->get('dtagendamento');
                $reservas->horario                = $request->get('horario');
               
               
              
               $reservas->save();
               return redirect('/reservas')->with('success', 'Reserva atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
