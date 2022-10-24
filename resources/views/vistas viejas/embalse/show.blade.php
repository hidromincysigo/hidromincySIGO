@extends('layouts.app')

@section('template_title')
    {{ $embalse->name ?? 'Show Embalse' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- {{dd($embalse)}} --}}
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">MOSTRAR {{ $embalse->nombre }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('embalses.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Reg:</strong>
                            {{ $embalse->reg }}
                        </div>
                        <div class="form-group">
                            <strong></strong>
                            {{ $embalse->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Infraestructura</strong>
                            {{ $embalse->nombre_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Propietario</strong>
                            {{ $embalse->propietario }}
                        </div>
                        <div class="form-group">
                            <strong>Constructora</strong>
                            {{ $embalse->constructora }}
                        </div>
                        <div class="form-group">
                            <strong>Propósito</strong>
                            {{ $embalse->proposito }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección</strong>
                            {{ $embalse->estado }} - {{ $embalse->municipio }} - {{ $embalse->parroquia }} - {{ $embalse->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción Ubicación</strong>
                            {{ $embalse->desc_ubicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas UTM A</strong>
                            {{ $embalse->coordenadas_utm_a }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas UTM B</strong>
                            {{ $embalse->coordenadas_utm_b }}
                        </div>
                        <div class="form-group">
                            <strong>Población Servida</strong>
                            {{ $embalse->poblacion_servida }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Infraestructura</strong>
                            {{ $embalse->tipo_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Sistema</strong>
                            {{ $embalse->sistemas }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Proceso Hídrico</strong>
                            {{ $embalse->tipo_proceso_hidrico }}
                        </div>
                        <div class="form-group">
                            <strong>Acueducto</strong>
                            {{ $embalse->nombre_acueducto }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
