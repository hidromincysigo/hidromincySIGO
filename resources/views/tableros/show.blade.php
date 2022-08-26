@extends('layouts.app')

@section('template_title')
    {{ $tablero->name ?? 'Show Tablero' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Tablero</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tableros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ancho:</strong>
                            {{ $tablero->ancho }}
                        </div>
                        <div class="form-group">
                            <strong>Alto:</strong>
                            {{ $tablero->alto }}
                        </div>
                        <div class="form-group">
                            <strong>Profundidad:</strong>
                            {{ $tablero->profundidad }}
                        </div>
                        <div class="form-group">
                            <strong>Aislante:</strong>
                            {{ $tablero->aislante }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $tablero->capacidad }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $tablero->id_estacion_bombeo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Fabricante:</strong>
                            {{ $tablero->id_fabricante }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Tension:</strong>
                            {{ $tablero->id_tipo_tension }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $tablero->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>En Uso:</strong>
                            {{ $tablero->en_uso }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $tablero->grupo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
