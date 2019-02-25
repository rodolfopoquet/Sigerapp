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
      <form method="post" action="{{ route('equipamentos.store') }}">
          <div class="form-group">
              @csrf
              <label for="eqdescricao">Descrição:</label>
              <input type="text" id="eqdescricao" class="form-control" name="eqdescricao" maxlength="60" />
          </div>
	  <div class="form-group">
 		<label for="marca">Marca do equipamento:</label>
        	<input type="text"  id="marca "class="form-control" name="marca" maxlength="60" />
	  </div>

     <div class="form-group">
 		<label for="modelo">Modelo do equipamento:</label>
        	<input type="text" id="modelo" class="form-control" name="modelo" maxlength="60" />
	  </div>

     

	 <div class="form-group">
 		<label for="codidentificacao">Número de série do equipamento:</label>
        	<input type="text"  id="codidentificacao" class="form-control" name="codidentificacao" maxlength="60" />
	  </div>
		 <div class="form-group">
			<label for="dt_aquisicao">Data de aquisição do equipamento:</label>
			{!!
				Form::date('dt_aquisicao', \Carbon\Carbon::now(),['class' => 'form-control']);

                        !!}		
		</div>

          
          <div class="form-group">
 	       
        	<input type="hidden"  id="status" class="form-control" name="status" value="Disponível"/>
	    </div>
          <button type="submit" class="btn btn-primary">Incluir</button>
          <a href="{{ route('equipamentos.index')}}" class="btn btn-primary">Voltar</a>
      </form>
  </div>
</div>

@stop
