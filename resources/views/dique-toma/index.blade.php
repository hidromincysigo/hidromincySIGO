@extends('layouts.app')

@section('template_title')
    Dique Toma
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dique Toma') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dique-tomas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Estado</th>
										<th>Parroquia</th>
										<th>Municipio</th>
										<th>Ref Sector</th>
										<th>Utm A</th>
										<th>Utm B</th>
										<th>Acueducto</th>
										<th>Toma Rio</th>
										<th>Caudal Diseño</th>
										<th>Caudal Recibe</th>
										<th>Estatus</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diqueTomas as $diqueToma)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $diqueToma->estado }}</td>
											<td>{{ $diqueToma->parroquia }}</td>
											<td>{{ $diqueToma->municipio }}</td>
											<td>{{ $diqueToma->ref_sector }}</td>
											<td>{{ $diqueToma->utm_a }}</td>
											<td>{{ $diqueToma->utm_b }}</td>
											<td>{{ $diqueToma->acueducto }}</td>
											<td>{{ $diqueToma->toma_rio }}</td>
											<td>{{ $diqueToma->caudal_diseño }}</td>
											<td>{{ $diqueToma->caudal_recibe }}</td>
											<td>{{ $diqueToma->estatus }}</td>

                                            <td>
                                                <form action="{{ route('dique-tomas.destroy',$diqueToma->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dique-tomas.show',$diqueToma->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dique-tomas.edit',$diqueToma->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $diqueTomas->links() !!}
            </div>
        </div>
    </div>
@endsection
