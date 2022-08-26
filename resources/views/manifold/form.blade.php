<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $manifold->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Manifold</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipo as $tipoManifold)
                        <option value="{{$tipoManifold->id}}">{{$tipoManifold->tipo_manifold}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="col-3">
            {{ Form::label('cant_bridas') }}
            {{ Form::text('cant_bridas', $manifold->cant_bridas, ['class' => 'form-control' . ($errors->has('cant_bridas') ? ' is-invalid' : ''), 'placeholder' => 'Cant Bridas']) }}
            {!! $errors->first('cant_bridas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('cant_monometro') }}
            {{ Form::text('cant_monometro', $manifold->cant_monometro, ['class' => 'form-control' . ($errors->has('cant_monometro') ? ' is-invalid' : ''), 'placeholder' => 'Cant Monometro']) }}
            {!! $errors->first('cant_monometro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('cant_valvulas') }}
            {{ Form::text('cant_valvulas', $manifold->cant_valvulas, ['class' => 'form-control' . ($errors->has('cant_valvulas') ? ' is-invalid' : ''), 'placeholder' => 'Cant Valvulas']) }}
            {!! $errors->first('cant_valvulas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('cant_tuberias') }}
            {{ Form::text('cant_tuberias', $manifold->cant_tuberias, ['class' => 'form-control' . ($errors->has('cant_tuberias') ? ' is-invalid' : ''), 'placeholder' => 'Cant Tuberias']) }}
            {!! $errors->first('cant_tuberias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('operatividad') }}
            {{ Form::text('operatividad', $manifold->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad']) }}
            {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
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
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>