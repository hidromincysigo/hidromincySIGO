@extends('layouts.app')

@section('template_title')
    {{ $tomaRio->name ?? 'Show Toma Rio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Toma Rio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('toma_rio.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tomaRio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Infraestructura</strong>
                            {{ $tomaRio->nombre_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Propietario</strong>
                            {{ $tomaRio->propietario }}
                        </div>
                        <div class="form-group">
                            <strong>Constructora</strong>
                            {{ $tomaRio->constructora }}
                        </div>
                        <div class="form-group">
                            <strong>Propósito</strong>
                            {{ $tomaRio->proposito }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección</strong>
                            {{ $tomaRio->estado }} - {{ $tomaRio->municipio }} - {{ $tomaRio->parroquia }} - {{ $tomaRio->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción Ubicación</strong>
                            {{ $tomaRio->desc_ubicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas UTM A</strong>
                            {{ $tomaRio->coordenadas_utm_a }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas UTM B</strong>
                            {{ $tomaRio->coordenadas_utm_b }}
                        </div>
                        <div class="form-group">
                            <strong>Población Servida</strong>
                            {{ $tomaRio->poblacion_servida }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Infraestructura</strong>
                            {{ $tomaRio->tipo_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Sistema</strong>
                            {{ $tomaRio->sistemas }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Proceso Hídrico</strong>
                            {{ $tomaRio->tipo_proceso_hidrico }}
                        </div>
                        <div class="form-group">
                            <strong>Acueducto</strong>
                            {{ $tomaRio->nombre_acueducto }}
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
