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
      <form method="post" action="{{ route('equipamentos.update', $equipamentos->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="eqdescricao">Descrição:</label>
          <input type="text" class="form-control"  id="eqdescricao" name="eqdescricao" maxlength="60" value={{ $equipamentos->eqdescricao }} />
        </div>
        <div class="form-group">
          <label for="marca">Marca do equipamento:</label>
          <input type="text" class="form-control"  id="marca" name="marca"  maxlength="60" value={{ $equipamentos->marca }} />
        </div>
        <div class="form-group">
          <label for="modelo">Modelo do equipamento:</label>
          <input type="text" class="form-control"  id="modelo" name="modelo" maxlength="60" value={{ $equipamentos->modelo }} />
        </div>
        <div class="form-group">
          <label for="codidentificacao">Número de série do equipamento:</label>
          <input type="text" class="form-control"  id="codidentificacao" name="codidentificacao" maxlength="60" value={{ $equipamentos->codidentificacao }} />
        </div>
         <label for="dt_aquisicao">Data de aquisição do equipamento:</label>
			{!!
				Form::date('dt_aquisicao', \Carbon\Carbon::now(),['class' => 'form-control']);

                        !!}		
		</div>

         
        <input type="hidden" class="form-control" id="status" name="status" value="Disponível"/>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('equipamentos.index')}}" class="btn btn-primary">Voltar</a>
      </form>
  </div>
</div>

@stop
