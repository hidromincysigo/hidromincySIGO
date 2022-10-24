@extends('layouts.app')

@section('template_title')
    {{ $asignacionGrupo->name ?? 'Show Asignacion Grupo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Asignacion Grupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asignacion-grupos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Equipo:</strong>
                            {{ $asignacionGrupo->id_equipo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Infraestructura:</strong>
                            {{ $asignacionGrupo->id_infraestructura }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $asignacionGrupo->grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $asignacionGrupo->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>En Uso:</strong>
                            {{ $asignacionGrupo->en_uso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
