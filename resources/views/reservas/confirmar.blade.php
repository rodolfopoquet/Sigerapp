@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">

 
<form method="post" action="{{url('confirmarreservas')}}">
    {{csrf_field()}}
 
 
  <table class="table table-striped">
  
    <thead>
        <tr>
          
          <td><b>Reservado por:</b></td>
          <td><b>Horário de agendamento:</b></td>
          <td><b>Data de agendamento:</b></td>    
          <td><b>Equipamento/ Marca/ Modelo:</b></td>
         
	       
	   
          <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>

        @foreach($reservas as $reservas)
        <tr>
      
            
                  
	         <td>{{$reservas->user->name}}</td>
            <td>{{$reservas->horario}}</td>
            <td>{{$reservas->dtagendamento}}</td>
            @if($reservas->equipamentos)
            <td>{{$reservas->equipamentos->eqdescricao}} / {{$reservas->equipamentos->marca}}  / {{$reservas->equipamentos->modelo}} </td>
            @else
            <td> --- </td>
            @endif
		

        
            <td>
                <form action="{{ route('reservas.destroy', $reservas->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar a reserva?')" type="submit">Cancelar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@stop