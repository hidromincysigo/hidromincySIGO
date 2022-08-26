<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-3">
            {{ Form::label('diametro') }}
            {{ Form::text('diametro', $tuberia->diametro, ['class' => 'form-control' . ($errors->has('diametro') ? ' is-invalid' : ''), 'placeholder' => 'Diametro']) }}
            {!! $errors->first('diametro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('norma') }}
            {{ Form::text('norma', $tuberia->norma, ['class' => 'form-control' . ($errors->has('norma') ? ' is-invalid' : ''), 'placeholder' => 'Norma']) }}
            {!! $errors->first('norma', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('grado') }}
            {{ Form::text('grado', $tuberia->grado, ['class' => 'form-control' . ($errors->has('grado') ? ' is-invalid' : ''), 'placeholder' => 'Grado']) }}
            {!! $errors->first('grado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('espesor') }}
            {{ Form::text('espesor', $tuberia->espesor, ['class' => 'form-control' . ($errors->has('espesor') ? ' is-invalid' : ''), 'placeholder' => 'Espesor']) }}
            {!! $errors->first('espesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('longitud') }}
            {{ Form::text('longitud', $tuberia->longitud, ['class' => 'form-control' . ($errors->has('longitud') ? ' is-invalid' : ''), 'placeholder' => 'Longitud']) }}
            {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('sdr') }}
            {{ Form::text('sdr', $tuberia->sdr, ['class' => 'form-control' . ($errors->has('sdr') ? ' is-invalid' : ''), 'placeholder' => 'Sdr']) }}
            {!! $errors->first('sdr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('pn') }}
            {{ Form::text('pn', $tuberia->pn, ['class' => 'form-control' . ($errors->has('pn') ? ' is-invalid' : ''), 'placeholder' => 'Pn']) }}
            {!! $errors->first('pn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('rde') }}
            {{ Form::text('rde', $tuberia->rde, ['class' => 'form-control' . ($errors->has('rde') ? ' is-invalid' : ''), 'placeholder' => 'Rde']) }}
            {!! $errors->first('rde', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo Tubería</label>
                <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($tipo as $tipoTuberia)
                    <option value="{{$tipoTuberia->id}}">{{$tipoTuberia->tipo_tuberia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo Material</label>
                <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($material as $tipoMaterial)
                    <option value="{{$tipoMaterial->id}}">{{$tipoMaterial->tipo_material}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Estacion de Bombeo</label>
                <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($estacion as $estacionBombeo)
                    <option value="{{$estacionBombeo->id}}">{{$estacionBombeo->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Fabricante</label>
                <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($fabricante as $fabri)
                    <option value="{{$fabri->id}}">{{$fabri->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Manifold</label>
                <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($manifold as $manifold)
                    <option value="{{$manifold->id}}">{{$manifold->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            {{ Form::label('operatividad') }}
            {{ Form::text('operatividad', $tuberia->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad']) }}
            {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('en_uso') }}
            {{ Form::text('en_uso', $tuberia->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso']) }}
            {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>