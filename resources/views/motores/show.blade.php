@extends('layouts.app')

@section('template_title')
    {{ $motore->name ?? 'Show Motore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Motore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('motores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Potencia:</strong>
                            {{ $motore->potencia }}
                        </div>
                        <div class="form-group">
                            <strong>Amperaje:</strong>
                            {{ $motore->amperaje }}
                        </div>
                        <div class="form-group">
                            <strong>Tension:</strong>
                            {{ $motore->tension }}
                        </div>
                        <div class="form-group">
                            <strong>Rpm:</strong>
                            {{ $motore->rpm }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad Amperio:</strong>
                            {{ $motore->capacidad_amperio }}
                        </div>
                        <div class="form-group">
                            <strong>Contactor:</strong>
                            {{ $motore->contactor }}
                        </div>
                        <div class="form-group">
                            <strong>Rele Termico:</strong>
                            {{ $motore->rele_termico }}
                        </div>
                        <div class="form-group">
                            <strong>Temperatura:</strong>
                            {{ $motore->temperatura }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Interruptor:</strong>
                            {{ $motore->id_tipo_interruptor }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Arranque:</strong>
                            {{ $motore->id_tipo_arranque }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $motore->id_estacion_bombeo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Fabricante:</strong>
                            {{ $motore->id_fabricante }}
                        </div>
                        <div class="form-group">
                            <strong>Supervisor Fase:</strong>
                            {{ $motore->supervisor_fase }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $motore->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>En Uso:</strong>
                            {{ $motore->en_uso }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $motore->grupo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
