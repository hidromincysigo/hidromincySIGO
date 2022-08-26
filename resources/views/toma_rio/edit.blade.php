@extends('layouts.app')

@section('template_title')
    Update Toma Rio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header col-12" style="background-color: #000066;">
                        <h3 class="card-title" style="color: white;">Update Toma Rio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('toma_rio.update', $tomaRio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('toma-rio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
