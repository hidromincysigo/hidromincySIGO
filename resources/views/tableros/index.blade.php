@extends('layouts.app')

@section('template_title')
    Tablero
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tablero') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tableros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Ancho</th>
										<th>Alto</th>
										<th>Profundidad</th>
										<th>Aislante</th>
										<th>Capacidad</th>
										<th>Id Estacion Bombeo</th>
										<th>Id Fabricante</th>
										<th>Id Tipo Tension</th>
										<th>Operatividad</th>
										<th>En Uso</th>
										<th>Grupo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tableros as $tablero)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tablero->ancho }}</td>
											<td>{{ $tablero->alto }}</td>
											<td>{{ $tablero->profundidad }}</td>
											<td>{{ $tablero->aislante }}</td>
											<td>{{ $tablero->capacidad }}</td>
											<td>{{ $tablero->id_estacion_bombeo }}</td>
											<td>{{ $tablero->id_fabricante }}</td>
											<td>{{ $tablero->id_tipo_tension }}</td>
											<td>{{ $tablero->operatividad }}</td>
											<td>{{ $tablero->en_uso }}</td>
											<td>{{ $tablero->grupo }}</td>

                                            <td>
                                                <form action="{{ route('tableros.destroy',$tablero->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tableros.show',$tablero->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tableros.edit',$tablero->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tableros->links() !!}
            </div>
        </div>
    </div>
@endsection
