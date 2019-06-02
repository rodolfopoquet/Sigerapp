@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

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
  <a href="{{ route('manutencoes.create')}}" class="btn btn-primary">Abrir O.S</a><br><br>
    <thead>
        <tr>
          
          <td><b>Solicitado por:</b></td>
          <td><b>Tipo de equipamento:</b></td>
          <td><b>Marca:</b></td>
          <td><b>Modelo:</b></td>         
          <td><b>Numero de série:</b></td>  
          <td><b>Descrição da OS:<b></td>  
          <td><b>Data de de Abertura da O.S:</b></td>
          <td><b>Status:</b><td>
          
          
         
	   
          <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($manutencoes as $manutencoes)
        <tr>
            
            <td>{{$manutencoes->user->name}}</td>
            <td>{{$manutencoes->equipamentos->eqdescricao}}</td>
            <td>{{$manutencoes->equipamentos->marca}}</td>
            <td>{{$manutencoes->equipamentos->modelo}}</td>
            <td>{{$manutencoes->equipamentos->codidentificacao}}</td>
            <td>{{$manutencoes->descricaoproblema}}</td>
            <td>{{$manutencoes->data}}</td>
            <td><font color='red'>{{$manutencoes->status}}</font><td>
            
            
            <td><a href="{{ route('manutencoes.index')}}" class="btn btn-primary">Fechar O.S </a></td>
            
            
        
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@stop