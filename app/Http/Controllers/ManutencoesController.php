<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manutencoes;
use App\Models\Equipamentos;
use App\Http\EquipamentosController;

class ManutencoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manutencoes = Manutencoes::orderBy('id', 'DESC')->get();
        return view('manutencoes.index', compact('manutencoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos= Equipamentos::disponivel()->get();
        return view('manutencoes.create')->withEquipamentos($equipamentos);
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
            'descricaoproblema'          => 'required|max:1600',
            'fkequipamentos'             => 'required',
            'data'                       => 'required|date',
            'status'                     => 'required',
          
            
                      
       ],[
           'descricaoproblema.required' => 'O campo descrição do problema apresentado deve ser preenchido obrigatóriamente',
                             
        ]
   
        
             
             );
               $manutencoes = new Manutencoes([
                 'descricaoproblema'  => $request->get('descricaoproblema'),
                 'data'               => $request->get('data'),
		         'fkequipamentos'     => $request->get('fkequipamentos'),
                 'user_id'            => auth()->user()->id,
                 'status'             => $request->get('status'),

                 
                 
                
               ]
           
           
           );
           //Para alteração do status no equipamento selecionado!
           $equipamentos = Equipamentos::find($request->get('fkequipamentos'));
           $equipamentos->status = 'Retirado para manutenção';
           $equipamentos->save();

           $manutencoes->save();
            return redirect('/manutencoes')->with('success', 'Solicitação de manutenção aberta com sucesso');
   
    }

    public function encerrar(Request $request, $id)
    {

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