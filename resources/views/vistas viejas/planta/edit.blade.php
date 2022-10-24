@extends('layouts.app')

@section('template_title')
    Editar Planta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title" style="color: white;">EDITAR {{-- {{ $embalse->nombre }} --}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{-- {{ route('embalses.update', $embalse->id) }} --}}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('plantas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
