@extends('layouts.app')

@section('title', 'Plantas')
@section('template_title')
    Plantas
@endsection

@section('content')

    {{-- <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
            <li class="breadcrumb-item active">listados de Plantas</li>
            </ol>
        </div>
        </div>
    </div> --}}

    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="background-color: #000066;">
                        <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                            <span id="card_title">
                                {{ __('Planta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('plantas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Planta') }}
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
                                        <th>Caudal Diseño</th>
                                        <th>Id Tipo Planta</th>
                                        <th>Id Infraestructura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plantas as $planta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $planta->nombre }}</td>
                                            <td>{{ $planta->caudal_diseño }}</td>
                                            <td>{{ $planta->id_tipo_planta }}</td>
                                            <td>{{ $planta->id_infraestructura }}</td>

                                            <td>
                                                <form action="{{ route('plantas.destroy',$planta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('plantas.show',$planta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('plantas.edit',$planta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $plantas->links() !!}
            </div>
        </div>
    </div>
@endsection
