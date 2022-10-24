@extends('layouts.app')

@section('template_title')
    {{ $pozoProfundo->name ?? 'Show Pozo Profundo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Mostrar Pozo Profundo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pozo_profundos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $pozoProfundo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Caudal Diseño:</strong>
                            {{ $pozoProfundo->caudal_diseno }}
                        </div>
                        <div class="form-group">
                            <strong>Infraestructura</strong>
                            {{ $pozoProfundo->nombre_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Propietario</strong>
                            {{ $pozoProfundo->propietario }}
                        </div>
                        <div class="form-group">
                            <strong>Constructora</strong>
                            {{ $pozoProfundo->constructora }}
                        </div>
                        <div class="form-group">
                            <strong>Propósito</strong>
                            {{ $pozoProfundo->proposito }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección</strong>
                            {{ $pozoProfundo->estado }} - {{ $pozoProfundo->municipio }} - {{ $pozoProfundo->parroquia }} - {{ $pozoProfundo->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción Ubicación</strong>
                            {{ $pozoProfundo->desc_ubicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas UTM A</strong>
                            {{ $pozoProfundo->coordenadas_utm_a }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas UTM B</strong>
                            {{ $pozoProfundo->coordenadas_utm_b }}
                        </div>
                        <div class="form-group">
                            <strong>Población Servida</strong>
                            {{ $pozoProfundo->poblacion_servida }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Infraestructura</strong>
                            {{ $pozoProfundo->tipo_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Sistema</strong>
                            {{ $pozoProfundo->sistemas }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Proceso Hídrico</strong>
                            {{ $pozoProfundo->tipo_proceso_hidrico }}
                        </div>
                        <div class="form-group">
                            <strong>Acueducto</strong>
                            {{ $pozoProfundo->nombre_acueducto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
