@extends ('adminlte::page')

@section('title', 'Acueductos')


@section('content')


    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
  
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
            <li class="breadcrumb-item active">listados  de Acueductos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->





<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Acueducto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('acueducto.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                    <th>#</th>
                                        
										<th>Nombre</th>
										<th>Estado</th>
										<th>Capacidad Distribucion</th>
										<th>Capacidad Modificada</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acueductos as $acueducto)
                                        <tr>

                                                <td>{{ ++$i }}</td>
											<td>{{ $acueducto->nombre }}</td>
											<td>{{ $acueducto->estado}}</td>
											<td>{{ $acueducto->capacidad_distribucion }}</td>
											<td>{{ $acueducto->capacidad_modificada }}</td>

                                            <td>
                                                <form action="{{ route('acueducto.destroy',$acueducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('acueducto.show',$acueducto->id) }}">  ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('acueducto.edit',$acueducto->id) }}">  editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"> eliminar </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $acueductos->links() !!}
            </div>
        </div>
    </div>







@stop

@section('css')
<link ref="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop



