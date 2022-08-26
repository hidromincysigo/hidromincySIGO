@extends('layouts.app')

@section('template_title')
    Update Acueducto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title" style="color: white;">Update Acueducto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('acueductos.update', $acueducto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('acueducto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
