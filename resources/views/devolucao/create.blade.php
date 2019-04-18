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
<div class="card uper">
  <div class="card-header">

  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
      
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('devolucao.store') }}">
        @csrf
        <div class="form-group">
             
        <div class="form-group">
             
             <label for="fkreservas">Equipamento reservado:</label>
             
            
            
             {!!
             
            Form::select(
                'fkreservas',
                 $reservas->pluck('eqdescricao','id'),
                old('fkreservas') ?? request()->get('fkreservas'),
                ['class' => 'form-control']
            )
        !!}




               </div>
	      <label for="datadev">Data da devolucao:</label>
        {!!
				Form::date('datadev', \Carbon\Carbon::now(),['class' => 'form-control']);

              !!}
          </div>
	      <div class="form-group">
 		<label for="horadev">Hora da devolução:</label>
        	<input type="time"  id="horadev" class="form-control" name="horadev" autofocus value="{{old('horadev')}}"/>
	  </div>

     <div class="form-group">
 		<label for="obs">Observações:</label>
        	<textarea  rows="4" cols="50" id="obs" class="form-control" name="obs" autofocus > {{old('obs')}}</textarea>
	  </div>
	  <button type="submit" class="btn btn-primary">Incluir</button>
          <a href="{{ route('devolucao.index')}}" class="btn btn-primary">Voltar</a>
      </form>
  </div>
</div>

@stop
