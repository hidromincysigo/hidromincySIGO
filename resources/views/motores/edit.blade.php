@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header col-12" style="background-color: #000066;">
                        <h3 class="card-title" style="color: white;">Update Motore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('motores.update', $motores->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            {{-- <input type="text" name="id" id="id" value="{{$motores->id}}" hidden> --}}
                            @include('motores.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
