@extends('layouts.app')
@section('title', 'Dique Toma')
@section('template_title')
Dique Toma
@endsection

@section('content')

<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                        <div style="display: flex; justify-content: space-between; align-items: center; color: white;">
                        <span id="card_title">
                            {{ __('Dique Toma') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('dique_toma.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                <th>Toma Rio</th>
                                <th>Caudal Diseño</th>
                                <th>Caudal Recibe</th>
                                <th>Estatus</th>
                                <th>Acciones</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diqueTomas as $diqueToma)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $diqueToma->nombre }}</td>
                                <td>{{ $diqueToma->toma_rio }}</td>
                                <td>{{ $diqueToma->caudal_diseno }}</td>
                                <td>{{ $diqueToma->caudal_recibe }}</td>
                                <td>{{ $diqueToma->status }}</td>
                                <td>
                                    <form action="{{ route('dique_toma.destroy',$diqueToma->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dique_toma.show',$diqueToma->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dique_toma.edit',$diqueToma->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
