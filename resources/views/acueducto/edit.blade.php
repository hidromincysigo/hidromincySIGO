@extends ('adminlte::page')

@section('title', 'Acueductos')


@section('content')


    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
  
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
            <li class="breadcrumb-item active">Edicion</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->


    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Acueducto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('acueducto.update', $acueducto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('acueducto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

          
@stop

@section('css')
<link ref="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

