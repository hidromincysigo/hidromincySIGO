@extends('layouts.app')

@section('template_title')
    {{ $bomba->name ?? 'Show Bomba' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Bomba</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bombas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $bomba->grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Nro Etapas:</strong>
                            {{ $bomba->nro_etapas }}
                        </div>
                        <div class="form-group">
                            <strong>Rotacion:</strong>
                            {{ $bomba->rotacion }}
                        </div>
                        <div class="form-group">
                            <strong>Caudal:</strong>
                            {{ $bomba->caudal }}
                        </div>
                        <div class="form-group">
                            <strong>Presion:</strong>
                            {{ $bomba->presion }}
                        </div>
                        <div class="form-group">
                            <strong>Rpm:</strong>
                            {{ $bomba->rpm }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $bomba->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Diametro Succion:</strong>
                            {{ $bomba->diametro_succion }}
                        </div>
                        <div class="form-group">
                            <strong>Diametro Descarga:</strong>
                            {{ $bomba->diametro_descarga }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Sello:</strong>
                            {{ $bomba->tipo_sello }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $bomba->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $bomba->id_estacion_bombeo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Fabricante:</strong>
                            {{ $bomba->id_fabricante }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
