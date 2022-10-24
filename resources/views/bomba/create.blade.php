@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<section class="content container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Crear Nueva Bomba</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('bombas.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('bomba.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
