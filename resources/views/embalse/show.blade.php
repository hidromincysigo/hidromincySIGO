@extends('layouts.app')

@section('template_title')
    {{ $embalse->name ?? 'Show Embalse' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Embalse</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('embalses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $embalse->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $embalse->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $embalse->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia:</strong>
                            {{ $embalse->parroquia }}
                        </div>
                        <div class="form-group">
                            <strong>Sector:</strong>
                            {{ $embalse->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadas:</strong>
                            {{ $embalse->coordenadas }}
                        </div>
                        <div class="form-group">
                            <strong>Proposito:</strong>
                            {{ $embalse->proposito }}
                        </div>
                        <div class="form-group">
                            <strong>Propietario:</strong>
                            {{ $embalse->propietario }}
                        </div>
                        <div class="form-group">
                            <strong>Constructora:</strong>
                            {{ $embalse->constructora }}
                        </div>
                        <div class="form-group">
                            <strong>Cronologia:</strong>
                            {{ $embalse->cronologia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
