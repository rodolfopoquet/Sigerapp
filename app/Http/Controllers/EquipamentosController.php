<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamentos;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = Equipamentos::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos =  Equipamentos::all();
        return view('equipamentos.create');
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
            'eqdescricao'          => 'required|max:60|unique:equipamentos',
            'marca'                => 'required|:max:60',
            'modelo'               => 'required|:max:60',
            'status'               => 'required',
            'codidentificacao'     => 'required|max:60|unique:equipamentos',
            'dt_aquisicao'         => 'required|date',
         
                 
             ]
        
             
             );
               $equipamentos = new Equipamentos([
                 'eqdescricao'        => $request->get('eqdescricao'),
                 'marca'              => $request->get('marca'),
                 'modelo'             => $request->get('modelo'),
                 'status'             => $request->get('status'),
                 'codidentificacao'   => $request->get('codidentificacao'),
                 'dt_aquisicao'       => $request->get('dt_aquisicao'),
                
                
               ]);
               $equipamentos->save();
               return redirect('/equipamentos')->with('success', 'Equipamento incluido com sucesso');
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
        $equipamentos = Equipamentos::find($id);

        return view('equipamentos.edit', compact('equipamentos'));
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
            'eqdescricao'           => 'required|max:60',
            'marca'                 => 'required|max:60',
            'modelo'                => 'required|max:60',
            'status'                => 'required',
            'codidentificacao'      => 'required|max:60',
            'dt_aquisicao'          => 'required|date',
         
                 
             ]
        
             
             );
                $equipamentos = Equipamentos::find($id);
                $equipamentos->eqdescricao        = $request->get('eqdescricao');
                $equipamentos->marca              = $request->get('marca');
                $equipamentos->modelo             = $request->get('modelo');
                $equipamentos->status              = $request->get('status');
                $equipamentos->codidentificacao   = $request->get ('codidentificacao');
                $equipamentos->dt_aquisicao       = $request->get ('dt_aquisicao');
               
                
              
               $equipamentos->save();
               return redirect('/equipamentos')->with('success', 'Equipamento Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamentos = Equipamentos::find($id);
        $equipamentos ->delete();

        return redirect('/equipamentos')->with('success', 'Equipamento excluido com sucesso');
    }

    
   
}
