@extends('layouts.app')

@section('template_title')
    {{ $detallesTecnico->name ?? 'Show Detalles Tecnico' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalles Tecnico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalles-tecnicos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Succion Min:</strong>
                            {{ $detallesTecnico->succion_min }}
                        </div>
                        <div class="form-group">
                            <strong>Succion Max:</strong>
                            {{ $detallesTecnico->succion_max }}
                        </div>
                        <div class="form-group">
                            <strong>Descarga Min:</strong>
                            {{ $detallesTecnico->descarga_min }}
                        </div>
                        <div class="form-group">
                            <strong>Descarga Max:</strong>
                            {{ $detallesTecnico->descarga_max }}
                        </div>
                        <div class="form-group">
                            <strong>Amp Min:</strong>
                            {{ $detallesTecnico->amp_min }}
                        </div>
                        <div class="form-group">
                            <strong>Amp Max:</strong>
                            {{ $detallesTecnico->amp_max }}
                        </div>
                        <div class="form-group">
                            <strong>Voltaje Min:</strong>
                            {{ $detallesTecnico->voltaje_min }}
                        </div>
                        <div class="form-group">
                            <strong>Voltaje Max:</strong>
                            {{ $detallesTecnico->voltaje_max }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $detallesTecnico->id_estacion_bombeo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
