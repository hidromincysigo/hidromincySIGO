
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
            <li class="breadcrumb-item active">           {{ $acueducto->nombre }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

 <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles del  Acueducto: <strong> {{ $acueducto->nombre }}</strong></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('acueducto.index') }}">Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $acueducto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $acueducto->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad Distribucion:</strong>
                            {{ $acueducto->capacidad_distribucion }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad Modificada:</strong>
                            {{ $acueducto->capacidad_modificada }}
                        </div>

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
