@extends('adminlte::page')


@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')
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
<div class="card uper">
  <div class="card-header">

  </div>

<form method="post" action="{{url('user/updatepassword')}}">
    {{csrf_field()}}
            <div class="form-group">
                <label for="mypassword">Senha Atual:</label>
                <input type="password" name="mypassword" class="form-control">
               
            <div class="form-group">
                <label for="password">Nova Senha:</label>
                <input type="password" name="password" class="form-control">
                
            <div class="form-group">
                <label for="mypassword">Confirme a nova senha:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Alterar a senha</button>
</form>
@stop