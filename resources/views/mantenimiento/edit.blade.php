@extends('layouts.dashboard')
@section('title', "")
@section('main-content')

{{-- {{dd($editar)}} --}}

<style>
    .pdf{
        text-decoration: none;
        /*padding: 5px;*/
        font-weight: 600;
        font-size: 20px;
        /*color:#fff;*/
        background-color: #b1e6f5;
        border-radius: 6px;
        border: 2px solid #0016b0;
    }

    .btn-guardar {
        margin-left: 500px ;
    }

</style>
	<div class="card-body wizard-content bg-white" id="validation">
        <form action="#" class="validation-wizard wizard-circle" id="reporteSeguimiento">
            <input type="text" hidden name="id_direccion" id="id_direccion">
            <div hidden>
                codig_reporte
                <input type="text" name="codReporte" value="{{$editar->cod_reporte}}">
                codigo_seguimiento
                <input type="text" name="id_seguimiento" value="{{$editar->id_seguimiento}}">
            </div>

            <div class="pdf col-2 centered">                
                <a href="#" onclick="window.location.href='{{Route('pdf.seg', $editar->id_seguimiento)}}'" target="_blank"> Descargar Pdf</a>
                {{-- <button class="btn btn-danger" onclick="window.location.href='{{Route('pdf.seg', $editar->id_seguimiento)}}'">
                    Descargar PDF
                </button> --}}
            </div>
<br>
            <section >
                <div class="row" id="data_reporte">
                    <div class="container">
                        <div class="row">
                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Nombre:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="nombre" name="nombre" disabled value="{{$editar->nombre}}">
                            </div>

                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Apellido:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="apellido" name="apellido" disabled value="{{$editar->apellido}}">
                            </div>

                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Telefono:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="telefono" name="telefono" disabled value="{{$editar->telefono}}">
                            </div>
                            <div class="col-3 col-md-3 col-xl-3 col-sm-3 mb-3 form-group">
                                <label for="" class="form-control-label">
                                    Correo:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control required" id="correo" name="correo" disabled value="{{$editar->correo}}">
                            </div>
                        

                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                            <label for="">Dirección:</label>
                            <div class="row">
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                  <input type="text" class="form-control required"  placeholder="Municipio:" id="municipio" name="municipio" disabled value="{{$editar->nom_mpio}}">                            
                                </div>
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Parroquia:" id="parroquia" name="parroquia" disabled value="{{$editar->nom_parroq}}">                               
                                </div>
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Sector/Urbanización:" id="sector" name="sector" disabled value="{{$editar->nom_sector}}">
                                </div>


                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Avenida:" id="avenida" name="avenida" disabled value="{{$editar->nom_av_calle}}">
                                </div>

                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Referencia:" id="referencia" name="referencia" disabled value="{{$editar->pnto_ref}}">
                                    </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                        	Orden Nro:
                            <div class="row">
                            	<div class="col-4 form-group">
                                	<input type="text" class="form-control required"  placeholder="Código del Reporte:" id="codigo" name="codigo" disabled value="{{$editar->cod_reporte}}">
                                </div>
                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">                               
                                	<input type="text" class="form-control required"  placeholder="Fecha :" id="fecha" name="fecha" disabled value="{{$editar->fecha_crea}}">
                                </div>

                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">   
                                	<input type="text" class="form-control required"  placeholder="Hora:" id="hora" name="hora" disabled value="{{$editar->hora_crea}}">
                                </div>

                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                            <label for="">Datos de la Averia:</label>
                            <div class="row">
                                 <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Tipo de Averia:" id="averia" name="averia" disabled value="{{$editar->nom_categ}} - {{$editar->nom_subcateg}}">
                                </div>

                                 <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="Cuadrilla Asignada	:" id="cuadrilla" name="cuadrilla" value="{{$editar->cuadrilla}}">
                                </div>


                                <div class="col-4 col-md-4 col-xl-4 col-sm-4 mb-3 form-group">
                                	<input type="text" class="form-control required"  placeholder="ubicación:" id="ubicacion" name="ubicacion" value="{{$editar->ubicacion}}">
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-xl-12 col-sm-12 mb-5">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Observaciones:</label>
                                <textarea class="form-control" disabled id="observaciones" name="observaciones" rows="5" style="resize:none"> {{$editar->observaciones}} </textarea>
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
                                <option value="{{ $dato->cod_dato_tuberia }}" @if($editar->cod_material_tuberia === $dato->cod_dato_tuberia) selected='true'@endif >{{ $dato->descripcion_tuberia }}</option>    
                            @endforeach
                        </select>
                    </div>


                    <div class="col-3" style="width: 100%" {{-- segundo select --}}>
                        <div style="width: 50%; float: left;">                            
                                    Diametro mm:
                            <input type="text" class="form-control required" id="diametro" name="diametro" style="width:100px;" value="{{$editar->diametro}}">
                        </div>
                        <div style="width: 50%; float: right;">                    
                                    Profundidad Mts:
                            <input type="text" class="form-control required " id="profundidad" name="profundidad" style="width:100px;" value="{{$editar->profundidad}}">
                        </div>
                    </div>

                    <div class="col-2">
                        Tipo de Red
                        <select name="tipoRed" id="tipoRed" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($tipoRed as $red)
                                <option value="{{ $red->cod_tipo_red }}" @if($editar->cod_tipo_red === $red->cod_tipo_red) selected='true' @endif> {{ $red->descripcion_red }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2" {{-- tercer select --}}>
                        Elemento que Falla
                        <select name="elementoFalla" id="elementoFalla" class="form-control custom-select">
                            <option value="">Seleccione</option>
                            @foreach($elementoFalla as $falla)
                                <option value="{{$falla->cod_elemento_falla}}" @if($editar->cod_elemento_falla === $falla->cod_elemento_falla) selected='true' @endif > {{ $falla->descripcion_elemento_falla }}</option>
                            @endforeach
                        </select>                
                    </div>

                    <div class="col-2" {{--select final--}}>
                    Causa Posible                   
                        <select name="causaPosible" id="causaPosible" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($causaPosible as $causa)
                                <option value="{{$causa->cod_causa_posible}}" @if($editar->cod_causa_posible == $causa->cod_causa_posible) selected='true' @endif > {{ $causa->descripcion_causa }}</option>
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
                        <input class="form-control" type="date" id="fehca_ini" name="fecha_ini" value="{{$editar->fecha_inicio}}">
                    </div>
                    <div class="col-3">
                        <h6 >Fin</h6>
                        <input class="form-control" type="date" id="fecha_fin" name="fecha_fin" value="{{$editar->fecha_fin}}">
                    </div>

                    <div class="col-3">
                        <h6 >Descarga</h6>
                        <input class="form-control" type="text" id="descarga" name="descarga" value="{{$editar->descarga}}">
                    </div>

                    <div class="col-3">
                        <h6 >Estado de la Averia</h6>                            
                        <select name="estadoAveria" id="estadoAveria" class="form-control custom-select required">
                            <option value="">Seleccione</option>
                            @foreach($estatuAveria as $estatu)
                                <option value="{{$estatu->id_estatu}}" @if($editar->id_estatu === $estatu->id_estatu) selected='true' @endif > {{ $estatu->descrip_estatu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-5">
                        <h4>Tiene Hueco</h4>
                        <select name="hueco" id="hueco" onchange="mostrarDatosHueco()" class="form-control custom-select required">
                            @if($editar->profundidad_hueco != '') 
                                <option value="si">SI</option>
                                <option value="no">NO</option>
                            @else
                                <option value="no">NO</option>
                                <option value="si">SI</option>
                            @endif
                        </select>
                    </div>

                    <div class="col-7">
                        <h4>Actividades Realizadas</h4>
                        <textarea class="form-control" id="actividadesRealizadas" name="actividadesRealizadas" rows="3" style="height: 12em;">
                            {{ $editar->actividades_realizadas}}
                        </textarea>
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
                                            <input class="form-control" value="{{$editar->largo}}" type="text" id="largo" name="largo" style="width:25em;" onkeypress="return valideKey(event)">
                                        </td>
                                        <td><input class="form-control" value="{{$editar->ancho}}" type="text" id="ancho" name="ancho" style="width:25em;"></td>
                                        <td><input class="form-control" value="{{$editar->profundidad_hueco}}" type="text" id="profundidad" name="profundidadHueco" style="width:25em;" onkeypress="return valideKey(event)"></td>
                                    </tr>
                                </table>
                        </div>
                         
                    </div>
                </div>
            </section>
            {{-- fin tabla de los huecos  --}}
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4 style="margin-left:2em;">Materiales Utilizados</h4>
                                <table class="table" align="center" id="tablaMateriales">
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Descripcion</th>
                                        <th>Orden de Almacen</th>
                                        <th>Acciones</th>
                                    </tr>
                                    @foreach($materiales as $i => $material)
                                        <tr class="clonarlo">
                                            <td>                                        
                                                <input class="form-control" type="text" id="cantidad" name="cantidad[]" style="width:4em;" onkeypress="return valideKey(event)" value="{{$material->cantidad}}">
                                            </td>
                                            <td><input class="form-control" type="text" id="descripcion" name="descripcion[]" style="width:45em;" value="{{ $material->material }}"></td>
                                            <td><input class="form-control" type="text" id="ordenNum" name="ordenNum[]" style="width:8em;" onkeypress="return valideKey(event)" value="{{$material->orden_almacen}}"></td>
                                            <td>
                                                <button class="btn btn-primary" type="button" onclick="agregar_fila()">
                                                    <i class="fas fa-fw fa-plus-circle" style="align-center"></i>
                                                </button>

                                                <button class="btn btn-danger" type="button" onclick="eliminar_fila($(this))">
                                                    <i class="fas fa-fw fa-times-circle"></i>
                                                </button>                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
                <div class="btn-guardar">
                    <button class='btn btn-primary center' name="guardar" value='Guardar'
                        onclick ="editarSeguimiento()">Guardar
                    </button>
                </div>
        	</div>

	<script type="application/javascript">
        $(document).ready(function(){
            var huecoExiste = $("#hueco").val()
            //alert(huecoExiste)
            if (huecoExiste == 'si'){
                $("#datosHueco").css('display','')
            }
        })

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
            //alert(hueco)
            if(hueco =='si'){
                $("#datosHueco").css('display','');
            }else{
                $("#datosHueco").css('display','none');
            }
        }

        function editarSeguimiento(){
            
            var formulario = $("#reporteSeguimiento").serialize()
            //console.log(formulario)
            formulario += "&_token={{ csrf_token() }}"
            $.ajax({
                method: 'POST',
                url: '/seguimiento/editSeguimiento/',
                dataType: 'json',
                data: formulario,
                success:function(respuesta){
                    //alert(respuesta)

                    if(respuesta == 1){
                        Swal.fire(
                            'Realizado',
                            'Seguimiento Actualizado con Exito ',
                            'success'
                        )

                        window.setInterval(
                            window.location.href="{{'/seguimiento/listado'}}", 5000
                        )

                    }else{
                        Swal.fire(
                            'Fallo',
                            'Hubo un Error al Editar el Seguimiento',
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
