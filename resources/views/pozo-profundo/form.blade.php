<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-4">
                {{ Form::label('reg') }}
                {{ Form::text('reg', $pozoProfundo->reg, ['class' => 'form-control' . ($errors->has('reg') ? ' is-invalid' : ''), 'placeholder' => 'Reg']) }}
                {!! $errors->first('reg', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $pozoProfundo->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('caudal_diseno') }}
                {{ Form::text('caudal_diseno', $pozoProfundo->caudal_diseno, ['class' => 'form-control' . ($errors->has('caudal_diseno') ? ' is-invalid' : ''), 'placeholder' => 'Caudal Diseno']) }}
                {!! $errors->first('caudal_diseno', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Infraestructura</h3>
            </div>
            <div class="col-3">
                {{ Form::label('Nombre Infraestructura') }}
                {{ Form::text('nombre_infraestructura', $infraestructura->nombre, ['class' => 'form-control' . ($errors->has('nombre_infraestructura') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre_infraestructura', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('propietario') }}
                {{ Form::text('propietario', $infraestructura->propietario, ['class' => 'form-control' . ($errors->has('propietario') ? ' is-invalid' : ''), 'placeholder' => 'Propietario']) }}
                {!! $errors->first('propietario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('constructura') }}
                {{ Form::text('constructura', $infraestructura->constructura, ['class' => 'form-control' . ($errors->has('constructura') ? ' is-invalid' : ''), 'placeholder' => 'Constructura']) }}
                {!! $errors->first('constructura', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('proposito') }}
                {{ Form::text('proposito', $infraestructura->proposito, ['class' => 'form-control' . ($errors->has('proposito') ? ' is-invalid' : ''), 'placeholder' => 'Proposito']) }}
                {!! $errors->first('proposito', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('img') }}
                {{ Form::text('img', $infraestructura->img, ['class' => 'form-control' . ($errors->has('img') ? ' is-invalid' : ''), 'placeholder' => 'Img']) }}
                {!! $errors->first('img', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Ubicacion Geografica</h3>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Estado</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" onchange="llenarMunicipios()" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->estado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Municipio</label>
                    <select class="js-example-basic-single custom-select" name="municipio" id="municipio" onchange="llenarParroquias()" required>
                        <option value="null">Seleccione</option>
                    </select>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label>Parroquia</label>
                    <select class="js-example-basic-single custom-select" name="parroquia" id="parroquia" onchange="llenarSector()" required>
                        <option value="null">Seleccione</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Sector</label>
                    <select class="js-example-basic-single custom-select" name="sector" id="sector" required>
                        <option value="null">Seleccione</option>
                    </select>
                </div>
            </div>

            <div class="col-3">
                {{ Form::label('coordenadas_utm_a') }}
                {{ Form::text('coordenadas_utm_a', $ubicacionGeografica->coordenadas_utm_a, ['class' => 'form-control' . ($errors->has('coordenadas_utm_a') ? ' is-invalid' : ''), 'placeholder' => 'Coordenadas Utm A']) }}
                {!! $errors->first('coordenadas_utm_a', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('coordenadas_utm_b') }}
                {{ Form::text('coordenadas_utm_b', $ubicacionGeografica->coordenadas_utm_b, ['class' => 'form-control' . ($errors->has('coordenadas_utm_b') ? ' is-invalid' : ''), 'placeholder' => 'Coordenadas Utm B']) }}
                {!! $errors->first('coordenadas_utm_b', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-3">
                {{ Form::label('desc_ubicacion') }}
                {{ Form::text('desc_ubicacion', $infraestructura->desc_ubicacion, ['class' => 'form-control' . ($errors->has('desc_ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Desc Ubicacion']) }}
                {!! $errors->first('desc_ubicacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('poblacion_servida') }}
                {{ Form::text('poblacion_servida', $infraestructura->poblacion_servida, ['class' => 'form-control' . ($errors->has('poblacion_servida') ? ' is-invalid' : ''), 'placeholder' => 'Poblacion Servida']) }}
                {!! $errors->first('poblacion_servida', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Descripcion de la Infraestructura</h3>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label>Tipo de Infraestructura</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" onchange="llenarMunicipios()" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipoin as $tipoInfraestructura)
                        <option value="{{$tipoInfraestructura->id}}">{{$tipoInfraestructura->tipo_infraestructura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Tipo de Sistema</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" onchange="llenarMunicipios()" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($sistemas as $sistema)
                        <option value="{{$sistema->id}}">{{$sistema->sistemas}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Acueducto</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" onchange="llenarMunicipios()" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($acueducto as $acueductos)
                        <option value="{{$acueductos->id}}">{{$acueductos->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>