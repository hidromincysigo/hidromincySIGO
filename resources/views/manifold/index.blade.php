@extends('layouts.app')

@section('template_title')
    Manifold
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Manifold') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('manifold.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Id Tipo Manifold</th>
										<th>Cant Bridas</th>
										<th>Cant Monometro</th>
										<th>Cant Valvulas</th>
										<th>Cant Tuberias</th>
										<th>Operatividad</th>
										<th>Id Estacion Bombeo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manifolds as $manifold)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $manifold->nombre }}</td>
											<td>{{ $manifold->id_tipo_manifold }}</td>
											<td>{{ $manifold->cant_bridas }}</td>
											<td>{{ $manifold->cant_monometro }}</td>
											<td>{{ $manifold->cant_valvulas }}</td>
											<td>{{ $manifold->cant_tuberias }}</td>
											<td>{{ $manifold->operatividad }}</td>
											<td>{{ $manifold->id_estacion_bombeo }}</td>

                                            <td>
                                                <form action="{{ route('manifolds.destroy',$manifold->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('manifolds.show',$manifold->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('manifolds.edit',$manifold->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $manifolds->links() !!}
            </div>
        </div>
    </div>
@endsection
