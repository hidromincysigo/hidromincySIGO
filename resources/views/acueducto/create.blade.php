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
            <li class="breadcrumb-item active">Creacion de Acueducto</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->




                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Creacion de Acueducto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('acueducto.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('acueducto.form')

                        </form>
                    </div>
                </div>
          
          
@stop

@section('css')
<link ref="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

