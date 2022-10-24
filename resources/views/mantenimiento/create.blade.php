@extends ('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<style type="text/css">
    .btn-guardar {
        margin-left: 500px ;
    }
</style>

	<div class="card-body wizard-content bg-white" id="validation">
        <form action="{{ route('mantenimiento.store') }}" class="validation-wizard wizard-circle" id="reporteSeguimiento">
            <input type="text" hidden name="id_direccion" id="id_direccion">
            <section >
                <div class="row" id="data_reporte">
                    <div class="container">
                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mt-5 mb-3">
                            <div hidden class="input-group input-group-joined">
                                <input class="form-control" type="text" value="999999" placeholder="Ingrese el Numero del Reporte" aria-label="Search" id="codReporte" name="codReporte" maxlength="12" minlength="8" onkeypress="return valideKey(event)">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button"  onclick="search_reporte($('#codReporte'))">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Nombre:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="nombre" name="nombre" value="" disabled>
                            </div>

                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Apellido:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="apellido" name="apellido" value="" disabled >
                            </div>

                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Telefono:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="telefono" name="telefono" value="" disabled onkeypress="return valideKey(event)" >
                            </div>
                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Correo:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control required" id="correo" name="correo" value="" disabled >
                            </div>
                        

                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                            <label for="">Dirección:</label>
                            <div class="row">
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                  <input type="text" class="form-control required"  placeholder="Municipio:" id="municipio" name="municipio" value="" disabled >                            
                                </div>
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Parroquia:" id="parroquia" name="parroquia" value="" disabled >                               
                                </div>
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Sector/Urbanización:" id="sector" name="sector" value="" disabled>
                                </div>


                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Avenida:" value="" id="avenida" name="avenida" disabled >
                                </div>

                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Referencia:" id="referencia" name="referencia" value="" disabled >
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                        	Orden Nro:
                            <div class="row">
                            	<div class="col-4 form-group">
                                	<input type="text" class="form-control required"  placeholder="Código del Reporte:" id="codigo" name="codigo" value="99999" disabled >
                                </div>
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">                               
                                	<input type="text" class="form-control required"  placeholder="Fecha :" id="fecha" name="fecha" value="" disabled >
                                </div>

                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">   
                                	<input type="text" class="form-control required"  placeholder="Hora:" id="hora" name="hora" value="" disabled>
                                </div>

                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                            <label for="">Datos de la Averia:</label>
                            <div class="row">
                                 <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Tipo de Averia:" id="averia" name="averia" value=" - " disabled >
                                </div>

                                 <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Cuadrilla Asignada	:" id="cuadrilla" name="cuadrilla">
                                </div>


                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="ubicación:" id="ubicacion" name="ubicacion" >
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-5">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Observaciones:</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="5" style="resize:none" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <section>
            <div class="container">                
                <div class="row">
                    <div class="col-3" {{-- primer select --}}>
                        Datos de la Tuberia
                        <select name="datosTuberia" id="datosTuberia" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($datosTuberia as $dato)
                                <option value="{{ $dato->id }}" @if( $dato->id === 'datosTuberia') selected @endif >{{ $dato->descripcion_tuberia }}</option>    

                            @endforeach
                        </select>
                    </div>


                    <div class="col-3" style="width: 100%" {{-- segundo select --}}>
                        <div style="width: 50%; float: left;">                            
                                    Diametro mm:
                            <input type="text" class="form-control required" id="diametro" name="diametro" style="width:100px;">
                        </div>
                        <div style="width: 50%; float: right;">                    
                                    Profundidad Mts:
                            <input type="text" class="form-control required " id="profundidad" name="profundidad" style="width:100px;">
                        </div>
                    </div>

                    <div class="col-2">
                        Tipo de Red
                        <select name="tipoRed" id="tipoRed" class="form-control custom-select required" name="" id="tipoRed">
                            <option value="">Seleccione</option>
                            @foreach($tipoRed as $red)
                                <option value="{{ $red->id }}"> {{ $red->descripcion_red }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2" {{-- tercer select --}}>
                        Elemento que Falla
                        <select name="elementoFalla" id="elementoFalla" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($elementoFalla as $falla)
                                <option value="{{$falla->id}}"> {{ $falla->descripcion_elemento_falla }}</option>
                            @endforeach
                        </select>                
                    </div>

                    <div class="col-2" {{--select final--}}>
                    Causa Posible                   
                        <select name="causaPosible" id="causaPosible" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($causaPosible as $causa)
                                <option value="{{$causa->id}}"> {{ $causa->descripcion_causa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>          
        </section>
        <br>

        <section>
            <div class="container">
                    <h4>Tiempo de Reparacion</h4>
                <div class="row">                        
                    <div class="col-3">
                        <h6 >Inicio</h6>
                        <input class="form-control" type="date" id="fehca_ini" name="fecha_ini">
                    </div>
                    <div class="col-3">
                        <h6 >Fin</h6>
                        <input class="form-control" type="date" id="fecha_fin" name="fecha_fin">
                    </div>

                    <div class="col-3">
                        <h6 >Descarga</h6>
                        <input class="form-control" type="text" id="descarga" name="descarga">
                    </div>

                    <div class="col-3">
                        <h6 >Estado de la Averia</h6>
                        <select name="estadoAveria" id="estadoAveria" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($estatuAveria as $estatu)                               
                                    <option value="{{$estatu->id}}"> {{ $estatu->descrip_estatu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-5">
                        <h4>Tiene Hueco</h4>
                        <select name="hueco" id="hueco" onchange="mostrarDatosHueco()" class="form-control custom-select required">
                            <option value="no">NO</option>
                            <option value="si">SI</option>
                        </select>
                    </div>
                    <div class="col-7">
                        <h4>Actividades Realizadas</h4>
                        <textarea class="form-control" id="actividadesRealizadas" name="actividadesRealizadas" rows="3" style="height: 12em;"></textarea>
                    </div>

                </div>
            </div>
        <br>

            </section>
                <br>

                {{-- tabla de datos del hueco --}}
                <section>
                <div class="container" id="datosHueco" style="display:none;">
                    <div class="row">
                        <div class="col">
                            <h4 style="margin-left:2em;">Datos Del Hueco</h4>
                                <table class="table" align="center" id="tablaDatosHueco">
                                    <tr>
                                        <th>Largo</th>
                                        <th>Ancho</th>
                                        <th>Profundidad</th>                                        
                                    </tr>
                                    <tr class="clonarlo">
                                        <td>                                        
                                            <input class="form-control" type="text" id="largo" name="largo" style="width:25em;" onkeypress="return valideKey(event)">
                                        </td>
                                        <td><input class="form-control" type="text" id="ancho" name="ancho" style="width:25em;"></td>
                                        <td><input class="form-control" type="text" id="profundidad" name="profundidadHueco" style="width:25em;" onkeypress="return valideKey(event)"></td>
                                    </tr>
                                </table>
                        </div>
                         
                    </div>
                </div>
            </section>
            {{-- fin tabla de los huecos  --}}

                <br>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4 style="margin-left:2em;">Materiales Utilizados</h4>
                                <table class="table" align="center" id="tablaArticulos">
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Descripcion</th>
                                        <th>Orden de Almacen</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <tr class="clonarlo">
                                        <td>                                        
                                            <input class="form-control" type="text" id="cantidad" name="cantidad[]" style="width:4em;" onkeypress="return valideKey(event)">
                                        </td>
                                        <td><input class="form-control" type="text" id="descripcion" name="descripcion[]" style="width:45em;"></td>
                                        <td><input class="form-control" type="text" id="ordenNum" name="ordenNum[]" style="width:8em;" onkeypress="return valideKey(event)"></td>
                                        <td>
                                            <button class="btn btn-primary" type="button" onclick="agregar_fila()">
                                                <i class="fas fa-fw fa-plus-circle" style="align-center"></i>
                                            </button>

                                            <button class="btn btn-danger" type="button" onclick="eliminar_fila($(this))">
                                                <i class="fas fa-fw fa-times-circle"></i>
                                            </button>                                
                                        </td>
                                    </tr>
                                </table>
                        </div>
                         
                    </div>
                </div>
                    {{-- </div>
                </div> --}} 
            </section>
            @csrf
            <div class="btn-guardar">
                    <button class='btn btn-primary' name="guardar" value='Guardar'
                        >Guardar
                    </button>
                </div>
        </form>
                
        	</div>

	<script type="application/javascript">

		function search_reporte(codReporte){
		    var codReporte = codReporte[0].value;     
            //console.log(codReporte)
		    $.ajax({
		        type: "POST",
		        url: "/seguimiento/searchReporte",
		        data: {
		        	"_token": "{{ csrf_token() }}",
		            codReporte:codReporte
		        },
		        success: function(response){
                    console.log(response)
		            var response = $.parseJSON(response);
		             if(response != null && Object.keys(response).length > 0){
		                response = response[0];
		                $("#nombre").val(response.nombre).attr('readonly','true');
		                $("#apellido").val(response.apellido).attr('readonly','true');
		                $("#correo").val(response.correo).attr('readonly','true');
		                $("#telefono").val(response.telefono).attr('readonly','true');
		                $("#municipio").val(response.nom_mpio).attr('readonly','true');
                        $("#parroquia").val(response.nom_parroq).attr('readonly','true');
                        $("#sector").val(response.nom_sector).attr('readonly','true');
		                $("#avenida").val(response.nom_av_calle).attr('readonly','true');
		                $("#referencia").val(response.pnto_ref).attr('readonly','true');
                        $("#codigo").val(response.cod_reporte).attr('readonly','true');
                        $("#fecha").val(response.fecha_crea).attr('readonly','true');
                        $("#hora").val(response.hora_crea).attr('readonly','true');
                        $("#averia").val(response.nom_subcateg).attr('readonly','true');
                        $("#observaciones").val(response.observaciones)
                        $("#id_direccion").val(response.id_direccion)
		            }else{
                        Swal.fire(
                            'Alerta',
                            'No Hay Registro Con Este Numero De Reporte',
                            'error'
                        )
                    }
                }
		    });
		}

        function mostrarDatosHueco(){
            var hueco = $("#hueco").val()
            if(hueco =='si'){
                $("#datosHueco").css('display','');
            }else{
                $("#datosHueco").css('display','none');
            }
        }

        function guardarSeguimiento(){
            var formulario = $("#reporteSeguimiento").serialize()
            //console.log(formulario);
            formulario += "&_token={{ csrf_token() }}"
            $.ajax({
                method: 'POST',
                url: 'store',
                dataType: 'json',
                data: formulario,
                success:function(respuesta){
                    if(respuesta == true){
                        Swal.fire(
                            'Realizado',
                            'Seguimiento Almacenado con Exito ',
                            'success'
                        )

                        window.setInterval(
                            window.location.href="{{'/seguimiento/listado'}}", 3000
                        )

                    }else{
                        Swal.fire(
                            'Fallo',
                            'Hubo un Error al Guardar el Seguimiento',
                            'error'
                        )
                    }
                }

            })
        }

    	function agregar_fila(){
    		var id_tabla = 'tablaMateriales';
			var fila = $('#'+id_tabla+' .clonarlo').eq(0).clone(true, true)
			fila.find('input').val('')
			$('#'+id_tabla).append(fila)
    	}

        function eliminar_fila(fila){

            var n_filas = fila.parent().closest('.table').find('.clonarlo').length
            var filaEliminar = fila.parent().closest('.clonarlo')
            //console.log(filaEliminar)

            if(n_filas > 1){
                filaEliminar.remove()
            }else{
                filaEliminar.find('input').val('')
            }

           
        }


    	function valideKey(evt){
            
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if(code==8) { // backspace.
              return true;
            } else if(code>=48 && code<=57) { // is a number.
              return true;
            } else{ // other keys.
              return false;
            }
        }

        //var form = $(".validation-wizard").show();

		

	</script>

@endsection