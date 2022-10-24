@extends('layouts.app')

@section('title', 'Estacion Bombeo')
@section('template_title')
    Estacion Bombeo
@endsection

@section('content')

    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="background-color: #000066;">
                        <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                            <span id="card_title">
                                {{ __('Estacion Bombeo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estacion_bombeo.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Cantidad Grupos</th>
										<th>Id Tipo Estacion Bombeo</th>
										<th>Id Tipo Servicio</th>
										<th>Id Infraestructura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estacionBombeos as $estacionBombeo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estacionBombeo->nombre }}</td>
											<td>{{ $estacionBombeo->cantidad_grupos }}</td>
											<td>{{ $estacionBombeo->id_tipo_estacion_bombeo }}</td>
											<td>{{ $estacionBombeo->id_tipo_servicio }}</td>
											<td>{{ $estacionBombeo->id_infraestructura }}</td>

                                            <td>
                                                <form action="{{ route('estacion_bombeo.destroy',$estacionBombeo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estacion_bombeo.show',$estacionBombeo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estacion_bombeo.edit',$estacionBombeo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $estacionBombeos->links() !!}
            </div>
        </div>
    </div>
@endsection
