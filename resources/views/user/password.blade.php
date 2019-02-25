@extends('adminlte::page')


@section('title', 'SIGER - Sistema Gerenciador de Reservas')
@section('content')

@if (Session::has('message'))
 <div class="text-danger">
 {{Session::get('message')}}
 </div>
@endif

<form method="post" action="{{url('user/updatepassword')}}">
    {{csrf_field()}}
            <div class="form-group">
                <label for="mypassword">Senha Atual:</label>
                <input type="password" name="mypassword" class="form-control">
                <div class="text-danger">{{$errors->first('mypassword')}}</div>
            </div>
            <div class="form-group">
                <label for="password">Nova Senha:</label>
                <input type="password" name="password" class="form-control">
                <div class="text-danger">{{$errors->first('password')}}</div>
            </div>
            <div class="form-group">
                <label for="mypassword">Confirme a nova senha:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Alterar a senha</button>
</form>
@stop