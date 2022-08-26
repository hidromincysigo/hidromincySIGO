@extends('layouts.app')

@section('template_title')
    Motore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Motore') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('motores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Potencia</th>
										<th>Amperaje</th>
										<th>Tension</th>
										<th>Rpm</th>
										<th>Capacidad Amperio</th>
										<th>Contactor</th>
										<th>Rele Termico</th>
										<th>Temperatura</th>
										<th>Id Tipo Interruptor</th>
										<th>Id Tipo Arranque</th>
										<th>Id Estacion Bombeo</th>
										<th>Id Fabricante</th>
										<th>Supervisor Fase</th>
										<th>Operatividad</th>
										<th>En Uso</th>
										<th>Grupo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($motores as $motore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $motore->potencia }}</td>
											<td>{{ $motore->amperaje }}</td>
											<td>{{ $motore->tension }}</td>
											<td>{{ $motore->rpm }}</td>
											<td>{{ $motore->capacidad_amperio }}</td>
											<td>{{ $motore->contactor }}</td>
											<td>{{ $motore->rele_termico }}</td>
											<td>{{ $motore->temperatura }}</td>
											<td>{{ $motore->id_tipo_interruptor }}</td>
											<td>{{ $motore->id_tipo_arranque }}</td>
											<td>{{ $motore->id_estacion_bombeo }}</td>
											<td>{{ $motore->id_fabricante }}</td>
											<td>{{ $motore->supervisor_fase }}</td>
											<td>{{ $motore->operatividad }}</td>
											<td>{{ $motore->en_uso }}</td>
											<td>{{ $motore->grupo }}</td>

                                            <td>
                                                <form action="{{ route('motores.destroy',$motore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('motores.show',$motore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('motores.edit',$motore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $motores->links() !!}
            </div>
        </div>
    </div>
@endsection
