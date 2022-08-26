@extends('layouts.app')

@section('template_title')
    {{ $tuberia->name ?? 'Show Tuberia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h3 class="card-title" style="color: white;">Show Tuberia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tuberias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Diametro:</strong>
                            {{ $tuberia->diametro }}
                        </div>
                        <div class="form-group">
                            <strong>Norma:</strong>
                            {{ $tuberia->norma }}
                        </div>
                        <div class="form-group">
                            <strong>Grado:</strong>
                            {{ $tuberia->grado }}
                        </div>
                        <div class="form-group">
                            <strong>Espesor:</strong>
                            {{ $tuberia->espesor }}
                        </div>
                        <div class="form-group">
                            <strong>Longitud:</strong>
                            {{ $tuberia->longitud }}
                        </div>
                        <div class="form-group">
                            <strong>Sdr:</strong>
                            {{ $tuberia->sdr }}
                        </div>
                        <div class="form-group">
                            <strong>Pn:</strong>
                            {{ $tuberia->pn }}
                        </div>
                        <div class="form-group">
                            <strong>Rde:</strong>
                            {{ $tuberia->rde }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Tuberia:</strong>
                            {{ $tuberia->id_tipo_tuberia }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Material:</strong>
                            {{ $tuberia->id_tipo_material }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $tuberia->id_estacion_bombeo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Fabricante:</strong>
                            {{ $tuberia->id_fabricante }}
                        </div>
                        <div class="form-group">
                            <strong>Id Manifold:</strong>
                            {{ $tuberia->id_manifold }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $tuberia->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>En Uso:</strong>
                            {{ $tuberia->en_uso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
