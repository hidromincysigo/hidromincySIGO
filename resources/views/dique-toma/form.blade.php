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
            {{ Form::label('desc_ubicacion') }}
            {{ Form::text('desc_ubicacion', $diqueToma->desc_ubicacion, ['class' => 'form-control' . ($errors->has('desc_ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Desc Ubicacion']) }}
            {!! $errors->first('desc_ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('utm_a') }}
            {{ Form::text('utm_a', $diqueToma->utm_a, ['class' => 'form-control' . ($errors->has('utm_a') ? ' is-invalid' : ''), 'placeholder' => 'Utm A']) }}
            {!! $errors->first('utm_a', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('utm_b') }}
            {{ Form::text('utm_b', $diqueToma->utm_b, ['class' => 'form-control' . ($errors->has('utm_b') ? ' is-invalid' : ''), 'placeholder' => 'Utm B']) }}
            {!! $errors->first('utm_b', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
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
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Control del Dique Toma</h3>
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