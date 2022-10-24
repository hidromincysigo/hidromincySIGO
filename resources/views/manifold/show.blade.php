@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ver Manifold</h3>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('manifold.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                        <th>Tipo Manifold</th>
                                        <th>Cantidad Bridas</th>
                                        <th>Cantidad Monometro</th>
                                        <th>Cantidad Valvulas</th>
                                        <th>Cantidad Tuberias</th>
                                        <th>Operatividad</th>
                                        <th>Estacion Bombeo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$manifold->nombre_manifold}}</td>
                                    <td>{{$manifold->tipo_manifold}}</td>
                                    <td>{{$manifold->cant_bridas}}</td>
                                    <td>{{$manifold->cant_monometro}}</td>
                                    <td>{{$manifold->cant_valvulas}}</td>
                                    <td>{{$manifold->cant_tuberias}}</td>
                                    <td>{{$manifold->operatividad}}</td>
                                    <td>{{$manifold->nombre_infraestructura}}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $manifold->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Manifold:</strong>
                            {{ $manifold->id_tipo_manifold }}
                        </div>
                        <div class="form-group">
                            <strong>Cant Bridas:</strong>
                            {{ $manifold->cant_bridas }}
                        </div>
                        <div class="form-group">
                            <strong>Cant Monometro:</strong>
                            {{ $manifold->cant_monometro }}
                        </div>
                        <div class="form-group">
                            <strong>Cant Valvulas:</strong>
                            {{ $manifold->cant_valvulas }}
                        </div>
                        <div class="form-group">
                            <strong>Cant Tuberias:</strong>
                            {{ $manifold->cant_tuberias }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $manifold->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $manifold->id_estacion_bombeo }}
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
