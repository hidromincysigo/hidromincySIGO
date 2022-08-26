@extends('layouts.app')

@section('template_title')
    {{ $estacionBombeo->name ?? 'Show Estacion Bombeo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Estacion Bombeo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estacion-bombeos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estacionBombeo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Grupos:</strong>
                            {{ $estacionBombeo->cantidad_grupos }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Estacion Bombeo:</strong>
                            {{ $estacionBombeo->id_tipo_estacion_bombeo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Servicio:</strong>
                            {{ $estacionBombeo->id_tipo_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Id Infraestructura:</strong>
                            {{ $estacionBombeo->id_infraestructura }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
