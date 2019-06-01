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
        $equipamentos = Equipamentos::orderBy('eqdescricao','DESC')->get();
        return view('equipamentos.index', compact('equipamentos'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
             'eqdescricao'          => 'required|max:30|unique:equipamentos',
             'marca'                => 'required|:max:30',
             'modelo'               => 'required|:max:30',
             'status'               => 'required',
             'codidentificacao'     => 'required|unique:equipamentos|max:30',
             'dt_aquisicao'         => 'required|date',
            
        ],[
            'eqdescricao.required' => 'O Tipo de equipamento deve ser preenchido obrigatóriamente',
            'marca.required'=>'O campo marca deve ser preenchido obrigatóriamente',
            'modelo.required'=>'O campo modelo deve ser preenchido obrigatóriamente',
            'codidentificacao.required'=>'O campo de número de série deve ser preenchido obrigatóriamente',
            'codidentificacao.unique'=>'O campo número de série é único',
            'eqdescricao.max'=>'É permitido no máximo 30 digitos',
            'eqdescricao.unique'=>'Não é permitido cadastrar tipos de equipamentos iguais',
            'modelo.max'=>'É permitido no máximo 30 dígitos',
                   
            ]
    
         
              
              );
                $equipamentos =Equipamentos::create([
                  'eqdescricao'        => $request->get('eqdescricao'),
                  'marca'              => $request->get('marca'),
                  'modelo'             => $request->get('modelo'),
                  'status'             => $request->get('status'),
                  'codidentificacao'   => $request->get('codidentificacao'),
                  'dt_aquisicao'       => $request->get('dt_aquisicao'),
                  
                 
                ]);
            
                                      
                $equipamentos->save();
                alert()->success('Equipamento adicionado com sucesso');
                return redirect('/equipamentos');

    }

    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
            'eqdescricao'           => 'required|max:30',
            'marca'                 => 'required|max:30',
            'modelo'                => 'required|max:30',
            'status'                => 'required',
            'codidentificacao'      => 'required|max:30',
            'dt_aquisicao'          => 'required|date',
            
                 
        ],
        [
            'eqdescricao.required' => 'O Tipo de equipamento deve ser preenchido obrigatóriamente',
            'marca.required'=>'O campo marca deve ser preenchido obrigatóriamente',
            'modelo.required'=>'O campo modelo deve ser preenchido obrigatóriamente',
            'codidentificacao.required'=>'O campo de número de série deve ser preenchido obrigatóriamente',
            'codidentificacao.unique'=>'O campo número de série é único',
            'eqdescricao.max'=>'É permitido no máximo 30 digitos',
            'modelo.max'=>'É permitido no máximo 30 dígitos',
                   
        ]
        
             
             );
                $equipamentos = Equipamentos::find($id);
                $equipamentos->eqdescricao        = $request->get('eqdescricao');
                $equipamentos->marca              = $request->get('marca');
                $equipamentos->modelo             = $request->get('modelo');
                $equipamentos->status              = $request->get('status');
                $equipamentos->codidentificacao   = $request->get ('codidentificacao');
                $equipamentos->dt_aquisicao       = $request->get ('dt_aquisicao');
               
                
              if($equipamentos->status=='Disponível'){
                $equipamentos->status='Disponível';
               $equipamentos->save();
               alert()->success('Equipamento atualizado com sucesso');
               return redirect('/equipamentos');
               }

               if($equipamentos->status=='Indisponível'){
                $equipamentos->status='Indisponível';
                $equipamentos->save();
                alert()->success('Equipamento atualizado com sucesso');
                return redirect('/equipamentos');
               }

               if($equipamentos->status=='Retirado para manutenção'){
                $equipamentos->status='Retirado para manutenção';
                $equipamentos->save();
                alert()->success('Equipamento atualizado com sucesso');
                return redirect('/equipamentos');
               }
   
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamentos = Equipamentos::whereStatus('Disponível')->find($id);
       
      
        if(!$equipamentos){
            alert()->error('Equipamento não pode ser removido, pois está em uso ou manutenção');
            return redirect('/equipamentos');
        }

        $equipamentos->delete();

        alert()->success('Equipamento excluido com sucesso');

        return redirect('/equipamentos');
    }

    
   
}
