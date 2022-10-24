<div class="box box-info padding-1">
    <div class="box-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Se encontraron los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-3">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre_infraestructura', $infraestructura->nombre_infraestructura, ['class' => 'form-control' . ($errors->has('nombre_infraestructura') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Edificación','required']); }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Proceso</label>
                    <select class="js-example-basic-single custom-select" name="procesoHidrico" id="procesoHidrico" onchange="llenarSistema()" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipoin as $tipoInfraestructura)
                        <option value="{{$tipoInfraestructura->id}}" @if($tipoInfraestructura->id === $infraestructura->id_proceso) selected="true" @endif>{{$tipoInfraestructura->descripcion_proceso}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Proceso</label>
                    <select class="js-example-basic-single custom-select" name="tipoSistema" id="tipoSistema" required>
                        @if(isset($sistemas))
                        <option value="{{$sistemas->id}}">{{$sistemas->sistemas}}</option>
                        @else
                        <option value="">Seleccione</option>
                        @endif

                        {{-- <option value="" selected>Seleccione</option>
                        @foreach($sistemas as $sistema)
                        <option value="{{$sistema->id}}" @if($sistema->id === $infraestructura->id_sistema) selected="true" @endif>{{$sistema->sistemas}}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Acueducto Responsable</label>
                    <select class="js-example-basic-single custom-select" name="acueducto" id="acueducto" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($acueducto as $acueductos)
                        <option value="{{$acueductos->id}}" @if($acueductos->id === $infraestructura->id_acueducto) selected="true" @endif>{{$acueductos->nombre_acueducto}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
{{--             <div class="col-4">
                <div class="form-group">
                    <label>Proceso Hídrico</label>
                    <select class="js-example-basic-single custom-select" name="hidrico" id="hidrico" required>
                        <option value="" selected>Seleccione</option>
                        @foreach($hidrico as $procesoHidrico)
                        <option value="{{$procesoHidrico->id}}" @if($procesoHidrico->id === $infraestructura->id_tipo_proceso_hidrico) selected="true" @endif>{{$procesoHidrico->tipo_proceso_hidrico}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
{{--         <div class="col-3">
            {{ Form::label('propietario') }}
            {{ Form::text('propietario', $infraestructura->propietario, ['class' => 'form-control' . ($errors->has('propietario') ? ' is-invalid' : ''), 'placeholder' => 'Propietario','required']); }}
            {!! $errors->first('propietario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('constructura') }}
            {{ Form::text('constructura', $infraestructura->constructura, ['class' => 'form-control' . ($errors->has('constructura') ? ' is-invalid' : ''), 'placeholder' => 'Constructura','required']); }}
            {!! $errors->first('constructura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('proposito') }}
            {{ Form::text('proposito', $infraestructura->proposito, ['class' => 'form-control' . ($errors->has('proposito') ? ' is-invalid' : ''), 'placeholder' => 'Proposito','required']); }}
            {!! $errors->first('proposito', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        {{-- <div class="col-3">
            {{ Form::label('img') }}
            {{ Form::text('img', $infraestructura->img, ['class' => 'form-control' . ($errors->has('img') ? ' is-invalid' : ''), 'placeholder' => 'Img','required']); }}
            {!! $errors->first('img', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
            <h3 class="card-title" style="color: white;">Ubicación Geográfica</h3>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Estado</label>
                <select class="js-example-basic-single custom-select" name="estado" id="estado" onchange="llenarMunicipios()" required>
                    <option value="" selected>Seleccione</option>
                    @foreach($estados as $estado)
                    <option value="{{$estado->id}}" @if($estado->id === $ubicacionGeografica->id_estado) selected="true" @endif>{{$estado->estado}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Municipio</label>
                <select class="js-example-basic-single custom-select" name="municipio" id="municipio" onchange="llenarParroquias()" required>
                    @if(isset($municipios))
                    <option value="{{$municipios->id}}">{{$municipios->municipio}}</option>
                    @else
                    <option value="">Seleccione</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Parroquia</label>
                <select class="js-example-basic-single custom-select" name="parroquia" id="parroquia" onchange="llenarSector()" required>
                    @if(isset($parroquias))
                    <option value="{{$parroquias->id}}">{{$parroquias->parroquia}}</option>
                    @else
                    <option value="">Seleccione</option>
                    @endif
                </select>
            </div>
        </div>
            {{-- <div class="col-3">
            {{ Form::label('sector') }}
            {{ Form::text('sector', $sectores->sector, ['class' => 'form-control' . ($errors->has('sector') ? ' is-invalid' : ''), 'placeholder' => 'Sector','required']); }}
            {!! $errors->first('sector', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="col-4">
            <div class="form-group">
                <label>Sector</label>
                <select class="js-example-basic-single custom-select" name="sector" id="sector" required>
                    @if(isset($sectores))
                    <option value="{{$sectores->id}}">{{$sectores->sector}}</option>
                    @else
                    <option value="">Seleccione</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-4">
            {{ Form::label('coordenadas_utm_a') }}
            {{ Form::text('coordenadas_utm_a', $ubicacionGeografica->coordenadas_utm_a, ['class' => 'form-control' . ($errors->has('coordenadas_utm_a') ? ' is-invalid' : ''), 'placeholder' => 'Coordenadas Utm A','required']); }}
            {!! $errors->first('coordenadas_utm_a', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('coordenadas_utm_b') }}
            {{ Form::text('coordenadas_utm_b', $ubicacionGeografica->coordenadas_utm_b, ['class' => 'form-control' . ($errors->has('coordenadas_utm_b') ? ' is-invalid' : ''), 'placeholder' => 'Coordenadas Utm B','required']); }}
            {!! $errors->first('coordenadas_utm_b', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="col-3">
            {{ Form::label('desc_ubicacion') }}
            {{ Form::text('desc_ubicacion', $infraestructura->desc_ubicacion, ['class' => 'form-control' . ($errors->has('desc_ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Desc Ubicacion','required']); }}
            {!! $errors->first('desc_ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
{{--         <div class="col-3">
            {{ Form::label('poblacion_servida') }}
            {{ Form::text('poblacion_servida', $infraestructura->poblacion_servida, ['class' => 'form-control' . ($errors->has('poblacion_servida') ? ' is-invalid' : ''), 'placeholder' => 'Poblacion Servida','required']); }}
            {!! $errors->first('poblacion_servida', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        

        {{-- <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
            <h3 class="card-title" style="color: white;">Fabricante</h3>
        </div>
        <div class="col-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre_fabricante', $fabricante->nombre_fabricante, ['class' => 'form-control' . ($errors->has('nombre_fabricante') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Fabricante','required']); }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $fabricante->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo','required']); }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('serial') }}
            {{ Form::text('serial', $fabricante->serial, ['class' => 'form-control' . ($errors->has('serial') ? ' is-invalid' : ''), 'placeholder' => 'Serial','required']); }}
            {!! $errors->first('serial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('origen') }}
            {{ Form::text('origen', $fabricante->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen','required']); }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
            {{-- <div class="col-4">
                {{ Form::label('ficha') }}
                {{ Form::text('ficha', $fabricante->ficha, ['class' => 'form-control' . ($errors->has('ficha') ? ' is-invalid' : ''), 'placeholder' => 'Ficha','required']); }}
                {!! $errors->first('ficha', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
        </div>
    </div>
    <div class="box-footer mt20" style="margin-top: 20px;" align="center">
        <button type="submit" class="btn btn-success" id="boton">Guardar</button>
        <div class="float-right" align="left">
            <a class="btn btn-primary" href="{{ route('infraestructura.index') }}"> Volver</a>
        </div>
    </div>
</div>