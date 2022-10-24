@extends('layouts.app')

@section('title', 'Pozo Profundo')
@section('template_title')
Pozo Profundo
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                        <span id="card_title">
                            {{ __('Pozo Profundo') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('pozo_profundos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                <th>Reg</th>
                                <th>Nombre</th>
                                <th>Caudal Diseño</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pozoProfundos as $pozoProfundo)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pozoProfundo->reg }}</td>
                                <td>{{ $pozoProfundo->nombre }}</td>
                                <td>{{ $pozoProfundo->caudal_diseno }}</td>

                                <td>
                                    <form action="{{ route('pozo_profundos.destroy',$pozoProfundo->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('pozo_profundos.show',$pozoProfundo->id) }}"><i
                                            class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('pozo_profundos.edit',$pozoProfundo->id) }}"><i
                                                class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $pozoProfundos->links() !!}
            </div>
        </div>
    </div>
    @endsection
