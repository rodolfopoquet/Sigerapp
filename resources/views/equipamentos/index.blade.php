@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
  <a href="{{ route('equipamentos.create')}}" class="btn btn-primary">Novo equipamento</a><br><br>
    <thead>
        <tr>
          
          <td><b>Tipo de equipamento:</b></td>
          <td><b>Marca:</b></td>
          <td><b>Modelo:</b></td>         
          <td><b>Numero de série:</b></td>    
          <td><b>Data de aquisição:</b></td>
          <td><b>Status:</b></td>
         
	   
          <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamentos as $equipamentos)
        <tr>
            
	          <td>{{$equipamentos->eqdescricao}}</td>
            <td>{{$equipamentos->marca}}</td>
            <td>{{$equipamentos->modelo}}</td>
            <td>{{$equipamentos->codidentificacao}}</td>
            <td>{{$equipamentos->dt_aquisicao}}</td>
            <td>{{$equipamentos->status}} </td>
            
		
            
            
         <td><a href="{{ route('equipamentos.edit',$equipamentos->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('equipamentos.destroy', $equipamentos->id)}}" method="post" onclick="return confirm('Tem certeza que deseja cancelar a reserva?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@stop