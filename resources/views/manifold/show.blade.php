@extends('layouts.app')

@section('template_title')
    {{ $manifold->name ?? 'Show Manifold' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Manifold</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('manifold.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
