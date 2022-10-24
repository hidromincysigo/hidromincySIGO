@extends('layouts.app')

@section('template_title')
{{ $diqueToma->name ?? 'Show Dique Toma' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        {{-- {{dd($diqueToma)}} --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h3 class="card-title" style="color: white;">VER {{ $diqueToma->nombre }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dique_toma.index') }}"> VOLVER</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Reg:</strong>
                                {{ $diqueToma->reg }}
                            </div>
                            <div class="form-group">
                                <strong>Nombre::</strong>
                                {{ $diqueToma->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Toma Río:</strong>
                                {{ $diqueToma->toma_rio }}
                            </div>
                            <div class="form-group">
                                <strong>Caudal Diseño:</strong>
                                {{ $diqueToma->caudal_diseno }}
                            </div>
                            <div class="form-group">
                                <strong>Caudal Recibe:</strong>
                                {{ $diqueToma->caudal_recibe }}
                            </div>
                            <div class="form-group">
                                <strong>Estatus:</strong>
                                {{ $diqueToma->status }}
                            </div>
                            <div class="form-group">
                                <strong>Infraestructura:</strong>
                                {{ $diqueToma->nombre_infraestructura }}
                            </div>
                            <div class="form-group">
                                <strong>Propietario:</strong>
                                {{ $diqueToma->propietario }}
                            </div>
                            <div class="form-group">
                                <strong>Constructora:</strong>
                                {{ $diqueToma->constructora }}
                            </div>
                            <div class="form-group">
                                <strong>Propósito:</strong>
                                {{ $diqueToma->proposito }}
                            </div>
                            <div class="form-group">
                                <strong>Dirección:</strong>
                                {{ $diqueToma->estado }} - {{ $diqueToma->municipio }} - {{ $diqueToma->parroquia }} - {{ $diqueToma->sector }}
                            </div>
                            <div class="form-group">
                                <strong>Descripción Ubicación:</strong>
                                {{ $diqueToma->desc_ubicacion }}
                            </div>
                            <div class="form-group">
                                <strong>Coordenadas UTM A:</strong>
                                {{ $diqueToma->coordenadas_utm_a }}
                            </div>
                            <div class="form-group">
                                <strong>Coordenadas UTM B:</strong>
                                {{ $diqueToma->coordenadas_utm_b }}
                            </div>
                            <div class="form-group">
                                <strong>Población Servida:</strong>
                                {{ $diqueToma->poblacion_servida }}
                            </div>
                            <div class="form-group">
                                <strong>Tipo de Infraestructura:</strong>
                                {{ $diqueToma->tipo_infraestructura }}
                            </div>
                            <div class="form-group">
                                <strong>Tipo Sistema:</strong>
                                {{ $diqueToma->sistemas }}
                            </div>
                            <div class="form-group">
                                <strong>Tipo de Proceso Hídrico:</strong>
                                {{ $diqueToma->tipo_proceso_hidrico }}
                            </div>
                            <div class="form-group">
                                <strong>Acueducto:</strong>
                                {{ $diqueToma->nombre_acueducto }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection
