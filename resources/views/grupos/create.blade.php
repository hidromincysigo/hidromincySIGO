@extends ('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Asignacion Grupo</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('grupos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('grupos.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script type="text/javascript">
    function llenarEquipo(){
        var equipo = $('#tipoEquipo').val()
            //console.log(estado)
            $.ajax({
                url : '/tipoSistema',
                type : 'post',
                data :  {
                    tipo : equipo,
                    "_token": "{{ csrf_token() }}"
                },
                success:function(equipos){
                    // var equipos = $.parseJSON(equipos)
                    $('#id_equipo').empty()
                    $("#id_equipo").append("<option value='null'>Seleccione</option>")
                    for (var i = 0; i < equipos.length; i++){
                        $("#id_equipo").append("<option value='"+equipos[i].id+"'>"+equipos[i].nombre_equipo+"</option>")
                    }
                }
            })
        }
    </script>