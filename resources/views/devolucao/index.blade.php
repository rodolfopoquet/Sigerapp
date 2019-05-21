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
  <a href="{{ route('devolucao.create')}}" class="btn btn-primary">Registrar devolução</a> <br><br>
    <thead>
        <tr>

          <td><b>Recebido por:</b></td>
          <td><b>Soliciado por:</b></td>
          <td><b>Hora da devolução:</b></td>
          <td><b>Data da reserva:<b></td>
          <td><b>Data da devolução:</b></td>
          <td><b>Observações:</b>




        </tr>
    </thead>
    <tbody>

        @foreach($devolucao as $devolucoes)
        <tr>



	    <td>{{$devolucao->user->name}}</td>
            <td>{{$devolucao->reservas->user->name}}</td>
            <td>{{$devolucao->horadev}}</td>
            <td>{{$devolucao->datadev}}</td>
            <td>{{$devolucao->obs}}</td>





        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@stop
