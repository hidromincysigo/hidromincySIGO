@extends('layouts.app')
@section('title', 'Crear Planta')
@section('template_title')
    Create Planta
@endsection

@section('content')
    <section class="content container-fluid" style="padding-top: 10px;">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header col-12" style="background-color: #000066;">
                        <h3 class="card-title" style="color: white;">Crear Planta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('plantas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('planta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
