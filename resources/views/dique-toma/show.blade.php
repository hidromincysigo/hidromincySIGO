@extends('layouts.app')

@section('template_title')
    {{ $diqueToma->name ?? 'Show Dique Toma' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dique Toma</span>
                        </div>
                        <div class="float-right">
<a class="btn btn-primary" href="{{ route('diquetoma.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $diqueToma->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia:</strong>
                            {{ $diqueToma->parroquia }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $diqueToma->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Ref Sector:</strong>
                            {{ $diqueToma->ref_sector }}
                        </div>
                        <div class="form-group">
                            <strong>Utm A:</strong>
                            {{ $diqueToma->utm_a }}
                        </div>
                        <div class="form-group">
                            <strong>Utm B:</strong>
                            {{ $diqueToma->utm_b }}
                        </div>
                        <div class="form-group">
                            <strong>Acueducto:</strong>
                            {{ $diqueToma->acueducto }}
                        </div>
                        <div class="form-group">
                            <strong>Toma Rio:</strong>
                            {{ $diqueToma->toma_rio }}
                        </div>
                        <div class="form-group">
                            <strong>Caudal Diseño:</strong>
                            {{ $diqueToma->caudal_diseño }}
                        </div>
                        <div class="form-group">
                            <strong>Caudal Recibe:</strong>
                            {{ $diqueToma->caudal_recibe }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $diqueToma->estatus }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
