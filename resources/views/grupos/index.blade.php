@extends('layouts.app')

@section('template_title')
    Asignacion Grupo
@endsection

@section('content')
    <div class="container-fluid">
        {{dd($asignacionGrupos)}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asignacion Grupo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grupos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Equipo</th>
										<th>Id Infraestructura</th>
										<th>Grupo</th>
										<th>Operatividad</th>
										<th>En Uso</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignacionGrupos as $asignacionGrupo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $asignacionGrupo->id_equipo }}</td>
											<td>{{ $asignacionGrupo->id_infraestructura }}</td>
											<td>{{ $asignacionGrupo->grupo }}</td>
											<td>{{ $asignacionGrupo->operatividad }}</td>
											<td>{{ $asignacionGrupo->en_uso }}</td>

                                            <td>
                                                <form action="{{ route('grupos.destroy',$asignacionGrupo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupos.show',$asignacionGrupo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupos.edit',$asignacionGrupo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $asignacionGrupos->links() !!}
            </div>
        </div>
    </div>
@endsection
