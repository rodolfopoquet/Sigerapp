<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\EquipamentosController;
use App\Models\Reservas;
use App\Models\Equipamentos;
use App\Models\Devolucao;

class DevolucaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devolucao      = Devolucao::all();
        $reservas       = Reservas::all();
        return view('devolucao.index', compact('devolucao','reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devolucao= Devolucao::all();
        $reservas =  Equipamentos::has('reserva')->disponivel(false)->get();
        return view('devolucao.create')->withReservas($reservas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'fkreservas'           => 'required',         
            'obs'                  => 'required',
            'datadev'              => 'required',
            'horadev'		       => 'required',
        ],
        
        [
            'horadev.required'=> 'O campo hora de devolução deve ser preenchido obrigatóriamente',
            'obs.required'=> 'O campo observações deve ser preenchido obrigatóriamente',

        ]
      
    );                  
        $devolucao = new Devolucao([
            'fkreservas'           => $request->get('fkreservas'),
            'obs'                  => $request->get('obs'),
            'datadev'              => $request->get('datadev'),
            'horadev'              => $request->get('horadev'),
            'user_id'              =>auth()->user()->id,
           
           
          ]);
         
          $equipamento = Equipamentos::find($devolucao->reservas->fkequipamentos);
           
          $equipamento->status = 'Disponível';
          $equipamento->save(); 
          
         /* $reservas=Reservas::find($devolucao->fkreservas);
          $reservas->delete();*/
          
         

           $devolucao->save();
           return redirect('/devolucao')->with('success', 'Equipamento devolvido com sucesso!');
       
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
        //
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
        //
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

