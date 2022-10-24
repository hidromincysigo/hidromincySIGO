<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-6">
                {{ Form::label('reg') }}
                {{ Form::text('reg', $diqueToma->reg, ['class' => 'form-control' . ($errors->has('reg') ? ' is-invalid' : ''), 'placeholder' => 'Reg']) }}
                {!! $errors->first('reg', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $diqueToma->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            {{-- <div class="card-header col-12" style="padding-top: 10px;">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Infraestructura</h3>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('Nombre Infraestructura') }}
                {{ Form::text('nombre_infraestructura', $infraestructura->nombre_infraestructura, ['class' => 'form-control' . ($errors->has('nombre_infraestructura') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre_infraestructura', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('propietario') }}
                {{ Form::text('propietario', $infraestructura->propietario, ['class' => 'form-control' . ($errors->has('propietario') ? ' is-invalid' : ''), 'placeholder' => 'Propietario']) }}
                {!! $errors->first('propietario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('Constructora') }}
                {{ Form::text('constructora', $infraestructura->constructora, ['class' => 'form-control' . ($errors->has('constructora') ? ' is-invalid' : ''), 'placeholder' => 'Constructora']) }}
                {!! $errors->first('constructora', '<div class="invalid-feedback">:message</div>') !!}
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
            <div class="card-header col-12" style="padding-top: 10px;">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ubicacion Geografica</h3>
                </div>
            </div>
            <div class="col-3">
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
            <div class="col-3">
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

            <div class="col-3">
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
            <div class="col-3">
            {{ Form::label('sector') }}
            {{ Form::text('sector', $sectores->sector, ['class' => 'form-control' . ($errors->has('sector') ? ' is-invalid' : ''), 'placeholder' => 'Sector']) }}
            {!! $errors->first('sector', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
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
            {{ Form::label('descripcion_ubicacion') }}
            {{ Form::text('desc_ubicacion', $ubicacionGeografica->desc_ubicacion, ['class' => 'form-control' . ($errors->has('desc_ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Desc Ubicacion']) }}
            {!! $errors->first('desc_ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('poblacion_servida') }}
            {{ Form::text('poblacion_servida', $infraestructura->poblacion_servida, ['class' => 'form-control' . ($errors->has('poblacion_servida') ? ' is-invalid' : ''), 'placeholder' => 'Poblacion Servida']) }}
            {!! $errors->first('poblacion_servida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="card-header col-12" style="padding-top: 10px;">
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Descripcion de la Infraestructura</h3>
            </div>
        </div>
            <div class="col-4">
                {{ Form::label('tipo_infraestructura') }}
                {{ Form::text('tipo_infraestructura', $tipoin->tipo_infraestructura, ['class' => 'form-control' . ($errors->has('tipo_infraestructura') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Infraestructura']) }}
                {!! $errors->first('tipo_infraestructura', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('sistemas') }}
            {{ Form::text('sistemas', $sistema->sistemas, ['class' => 'form-control' . ($errors->has('sistemas') ? ' is-invalid' : ''), 'placeholder' => 'Sistemas']) }}
            {!! $errors->first('sistemas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo de Infraestructura</label>
                <select class="js-example-basic-single custom-select" name="tipoInfraestructura" id="tipoInfraestructura" onchange="llenarMunicipios()" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($tipoin as $tipoInfraestructura)
                    <option value="{{$tipoInfraestructura->id}}" @if($tipoInfraestructura->id === $infraestructura->id_tipo_infraestructura) selected="true" @endif>{{$tipoInfraestructura->tipo_infraestructura}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo de Sistema</label>
                <select class="js-example-basic-single custom-select" name="tipoSistema" id="tipoSistema" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($sistemas as $sistema)
                    <option value="{{$sistema->id}}" @if($sistema->id === $infraestructura->id_sistema) selected="true" @endif>{{$sistema->sistemas}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Proceso Hídrico</label>
                <select class="js-example-basic-single custom-select" name="hidrico" id="hidrico" required>
                    <option value="" selected>Seleccione</option>
                    @foreach($hidrico as $procesoHidrico)
                    <option value="{{$procesoHidrico->id}}" @if($procesoHidrico->id === $infraestructura->id_tipo_proceso_hidrico) selected="true" @endif>{{$procesoHidrico->tipo_proceso_hidrico}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Acueducto</label>
                <select class="js-example-basic-single custom-select" name="acueducto" id="acueducto" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($acueducto as $acueductos)
                    <option value="{{$acueductos->id}}" @if($acueductos->id === $infraestructura->id_acueducto) selected="true" @endif>{{$acueductos->nombre_acueducto}}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="card-header col-12" style="padding-top: 10px;">
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Control del Dique Toma</h3>
            </div>
        </div>
        <div class="col-3">
            {{ Form::label('toma_rio') }}
            {{ Form::text('toma_rio', $diqueToma->toma_rio, ['class' => 'form-control' . ($errors->has('toma_rio') ? ' is-invalid' : ''), 'placeholder' => 'Toma Rio']) }}
            {!! $errors->first('toma_rio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('caudal_diseno') }}
            {{ Form::text('caudal_diseno', $diqueToma->caudal_diseno, ['class' => 'form-control' . ($errors->has('caudal_diseno') ? ' is-invalid' : ''), 'placeholder' => 'Caudal Diseno']) }}
            {!! $errors->first('caudal_diseno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('caudal_recibe') }}
            {{ Form::text('caudal_recibe', $diqueToma->caudal_recibe, ['class' => 'form-control' . ($errors->has('caudal_recibe') ? ' is-invalid' : ''), 'placeholder' => 'Caudal Recibe']) }}
            {!! $errors->first('caudal_recibe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('status') }}
            {{ Form::text('status', $diqueToma->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>