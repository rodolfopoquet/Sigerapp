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
  <a href="{{ route('reservas.create')}}" class="btn btn-primary">Nova Reserva</a> <br><br>
    <thead>
        <tr>
          
          <td><b>Solicitante:</b></td>
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
            <td>{{$reservas->equipamentos->eqdescricao}} / {{$reservas->equipamentos->marca}}  / {{$reservas->equipamentos->modelo}} </td>
            
		

        
         <td><a href="{{ route('reservas.edit',$reservas->id)}}" class="btn btn-primary">Editar</a></td>
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