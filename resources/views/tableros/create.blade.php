@extends('layouts.app')

@section('template_title')
    Create Tablero
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header col-12" style="background-color: #000066;">
                        <h3 class="card-title" style="color: white;">Create Tablero</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tableros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tableros.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
