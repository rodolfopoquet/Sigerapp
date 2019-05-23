<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\EquipamentosController;
use App\Models\Devolucao;
use App\Models\Reservas;
use App\Models\Equipamentos;
use App\Models\User;

class DevolucaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devolucao = Devolucao::orderBy('id', 'DESC')->has('reservas.equipamentos')->get();
        return view('devolucao.index', compact('devolucao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devolucao= Devolucao::all();
        $equipamentos =  Equipamentos::has('reservas')->disponivel(false)->get();
        return view('devolucao.create')->withEquipamentos('equipamentos');
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
        $devolucao = Devolucao::create([
            'fkreservas'           => $request->get('fkreservas'),
            'obs'                  => $request->get('obs'),
            'datadev'              => $request->get('datadev'),
            'horadev'              => $request->get('horadev'),
            'user_id'              => auth()->user()->id,
           
          ]);
          
          $equipamentos = Equipamentos::find($devolucao->reservas->fkequipamentos);
          $equipamentos->status='Disponível';
          $equipamentos->save();       
        $devolucao->save();
           alert()->success('Equipamento devolvido com sucesso');
           return redirect('/devolucao');
       
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

