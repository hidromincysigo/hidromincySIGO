@extends('layouts.app')

@section('template_title')
    Detalles Tecnico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalles Tecnico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalles_tecnicos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Succion Min</th>
										<th>Succion Max</th>
										<th>Descarga Min</th>
										<th>Descarga Max</th>
										<th>Amp Min</th>
										<th>Amp Max</th>
										<th>Voltaje Min</th>
										<th>Voltaje Max</th>
										<th>Id Estacion Bombeo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detallesTecnicos as $detallesTecnico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detallesTecnico->succion_min }}</td>
											<td>{{ $detallesTecnico->succion_max }}</td>
											<td>{{ $detallesTecnico->descarga_min }}</td>
											<td>{{ $detallesTecnico->descarga_max }}</td>
											<td>{{ $detallesTecnico->amp_min }}</td>
											<td>{{ $detallesTecnico->amp_max }}</td>
											<td>{{ $detallesTecnico->voltaje_min }}</td>
											<td>{{ $detallesTecnico->voltaje_max }}</td>
											<td>{{ $detallesTecnico->id_estacion_bombeo }}</td>

                                            <td>
                                                <form action="{{ route('detalles_tecnicos.destroy',$detallesTecnico->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalles_tecnicos.show',$detallesTecnico->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalles_tecnicos.edit',$detallesTecnico->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $detallesTecnicos->links() !!}
            </div>
        </div>
    </div>
@endsection
