<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Equipamentos;


/**
 * Class ReservasController
 * @package App\Http\Controllers
 */
class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reservas::orderBy('id', 'DESC')->has('equipamentos')->get();
        
        return view('reservas.index', compact('reservas'));
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos= Equipamentos::disponivel()->get();
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
            'fkequipamentos'          => 'required|max:30',
            'dtagendamento'           => 'required|date',
            'horario'                 => 'required',
        ],
        [
            'horario.required'=>'O campo horário deve ser preenchido obrigatóriamente',

        ]
    
    
    
    );

        $equipamento = Equipamentos::find($request->get('fkequipamentos'));


        $reservas = new Reservas([
            'fkequipamentos'           => $request->get('fkequipamentos'),
            'user_id'                  => auth()->user()->id,
            'dtagendamento'            => $request->get('dtagendamento'),
            'horario'                  => $request->get('horario'),
        ]);
        //bloquear o item e atualizar o seu 'status'
        /*
        fazer o select do item pela chave*/

        $equipamento->status = 'Indisponível';
        $equipamento->save();

        $reservas->save();
        alert()->success('Equipamento reservado com sucesso');
        return redirect('/reservas');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservas = Reservas::find($id);

       
        if($reservas->equipamentos->status=='Indisponível'){

            
            $equipamento = Equipamentos::find($reservas->fkequipamentos);
            $equipamento->status = 'Disponível';
            $equipamento->save(); 

        }
        $reservas->delete();

        
        alert()->success('Reserva cancelada com sucesso');
        return redirect('/reservas');
    }
   
}