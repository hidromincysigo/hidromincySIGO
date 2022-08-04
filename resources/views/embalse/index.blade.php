@extends('layouts.app')

@section('template_title')
    Embalse
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Embalse') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('embalses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Reg</th>
										<th>Nombre</th>
										<th>Estado</th>
										<th>Municipio</th>
										<th>Parroquia</th>
										<th>Desc Ubicacion</th>
										<th>Utm A</th>
										<th>Utm B</th>
										<th>Proposito</th>
										<th>Propietario</th>
										<th>Constructora</th>
										<th>Cronologia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($embalses as $embalse)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $embalse->reg }}</td>
											<td>{{ $embalse->nombre }}</td>
											<td>{{ $embalse->estado }}</td>
											<td>{{ $embalse->municipio }}</td>
											<td>{{ $embalse->parroquia }}</td>
											<td>{{ $embalse->desc_ubicacion }}</td>
											<td>{{ $embalse->utm_a }}</td>
											<td>{{ $embalse->utm_b }}</td>
											<td>{{ $embalse->proposito }}</td>
											<td>{{ $embalse->propietario }}</td>
											<td>{{ $embalse->constructora }}</td>
											<td>{{ $embalse->cronologia }}</td>

                                            <td>
                                                <form action="{{ route('embalses.destroy',$embalse->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('embalses.show',$embalse->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('embalses.edit',$embalse->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $embalses->links() !!}
            </div>
        </div>
    </div>
@endsection
