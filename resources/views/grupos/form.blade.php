<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-4">
                <div class="form-group">
                    <label>Estacion de Bombeo</label>
                    <select class="js-example-basic-single custom-select" name="id_infraestructura" id="id_infraestructura" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($infraestructura as $infraestructuras)
                        <option value="{{$infraestructuras->id}}" {{-- @if($infraestructura->id === $infraestructura->operatividad) selected="true" @endif --}}>{{$infraestructuras->nombre_infraestructura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Tipo Equipo</label>
                    <select class="js-example-basic-single custom-select" name="tipoEquipo" id="tipoEquipo" onchange="llenarEquipo()" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipoEquipo as $tipoEquipos)
                        <option value="{{$tipoEquipos->id}}" {{-- @if($tipoEquipo->id === $tipoEquipo->operatividad) selected="true" @endif --}}>{{$tipoEquipos->tipo_equipo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Equipo</label>
                    <select class="js-example-basic-single custom-select" name="id_equipo" id="id_equipo" required>
                        <option value="" selected>Seleccione</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                {{ Form::label('Grupo') }}
                <input type="text" class="form-control required" id="grupo" name="grupo" @if(isset($bomba->nro_etapas)) value="{{$bomba->nro_etapas}}" @endif required>
            </div>
            
            <div class="col-4">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}">{{$operatividadd->operatividad}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>En Uso</label>
                    <select class="js-example-basic-single custom-select" name="en_uso" id="en_uso" required>
                        <option value="true" selected>Si</option>
                        <option value="false">No</option>
                    </select>
                </div>
            </div>
        </div>



        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        var equipoSelect = $("#tipo_equipo").val()
        if(equipoSelect == 1){
            $("#bomba").show();
            $("#tablero").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(equipoSelect == 2){
            $("#manifold").show();
            $("#bomba").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(equipoSelect == 3){
            $("#motor").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(equipoSelect == 4){
            $("#tablero").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(equipoSelect == 5){
            $("#tuberia").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#valvula").hide();
        }
        if(equipoSelect == 6){
            $("#valvula").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
        }
    })

    function mostrarDisenoEquipo(id){
        if(id == ''){
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(id == 1){
            $("#bomba").show();
            $("#tablero").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(id == 2){
            $("#manifold").show();
            $("#bomba").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(id == 3){
            $("#motor").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(id == 4){
            $("#tablero").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tuberia").hide();
            $("#valvula").hide();
        }
        if(id == 5){
            $("#tuberia").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#valvula").hide();
        }
        if(id == 6){
            $("#valvula").show();
            $("#bomba").hide();
            $("#manifold").hide();
            $("#motor").hide();
            $("#tablero").hide();
            $("#tuberia").hide();
        }
    }

</script>