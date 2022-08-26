@extends('layouts.app')

@section('template_title')
    Tuberia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tuberia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tuberias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Diametro</th>
										<th>Norma</th>
										<th>Grado</th>
										<th>Espesor</th>
										<th>Longitud</th>
										<th>Sdr</th>
										<th>Pn</th>
										<th>Rde</th>
										<th>Id Tipo Tuberia</th>
										<th>Id Tipo Material</th>
										<th>Id Estacion Bombeo</th>
										<th>Id Fabricante</th>
										<th>Id Manifold</th>
										<th>Operatividad</th>
										<th>En Uso</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tuberias as $tuberia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tuberia->diametro }}</td>
											<td>{{ $tuberia->norma }}</td>
											<td>{{ $tuberia->grado }}</td>
											<td>{{ $tuberia->espesor }}</td>
											<td>{{ $tuberia->longitud }}</td>
											<td>{{ $tuberia->sdr }}</td>
											<td>{{ $tuberia->pn }}</td>
											<td>{{ $tuberia->rde }}</td>
											<td>{{ $tuberia->id_tipo_tuberia }}</td>
											<td>{{ $tuberia->id_tipo_material }}</td>
											<td>{{ $tuberia->id_estacion_bombeo }}</td>
											<td>{{ $tuberia->id_fabricante }}</td>
											<td>{{ $tuberia->id_manifold }}</td>
											<td>{{ $tuberia->operatividad }}</td>
											<td>{{ $tuberia->en_uso }}</td>

                                            <td>
                                                <form action="{{ route('tuberias.destroy',$tuberia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tuberias.show',$tuberia->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tuberias.edit',$tuberia->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tuberias->links() !!}
            </div>
        </div>
    </div>
@endsection
