@extends('layouts.app')
@section('title', 'Toma Río')
@section('template_title')
    Toma Rio
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="background-color: #000066;">
                        <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                            <span id="card_title">
                                {{ __('Toma Rio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('toma_rio.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Toma Río') }}
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
										<th>Acciones</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tomaRios as $tomaRio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $tomaRio->nombre }}</td>
                                            <td>
                                                <form action="{{ route('toma_rio.destroy',$tomaRio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('toma_rio.show',$tomaRio->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('toma_rio.edit',$tomaRio->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tomaRios->links() !!}
            </div>
        </div>
    </div>
@endsection
