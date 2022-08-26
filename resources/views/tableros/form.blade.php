<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('ancho') }}
                {{ Form::text('ancho', $tablero->ancho, ['class' => 'form-control' . ($errors->has('ancho') ? ' is-invalid' : ''), 'placeholder' => 'Ancho']) }}
                {!! $errors->first('ancho', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('alto') }}
                {{ Form::text('alto', $tablero->alto, ['class' => 'form-control' . ($errors->has('alto') ? ' is-invalid' : ''), 'placeholder' => 'Alto']) }}
                {!! $errors->first('alto', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('profundidad') }}
                {{ Form::text('profundidad', $tablero->profundidad, ['class' => 'form-control' . ($errors->has('profundidad') ? ' is-invalid' : ''), 'placeholder' => 'Profundidad']) }}
                {!! $errors->first('profundidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('aislante') }}
                {{ Form::text('aislante', $tablero->aislante, ['class' => 'form-control' . ($errors->has('aislante') ? ' is-invalid' : ''), 'placeholder' => 'Aislante']) }}
                {!! $errors->first('aislante', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('capacidad') }}
                {{ Form::text('capacidad', $tablero->capacidad, ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad']) }}
                {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!}
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
                    <label>Tipo de Tension</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipo as $tipoTension)
                        <option value="{{$tipoTension->id}}">{{$tipoTension->tipo_tension_tablero}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $tablero->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad']) }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('en_uso') }}
                {{ Form::text('en_uso', $tablero->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso']) }}
                {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('grupo') }}
                {{ Form::text('grupo', $tablero->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo']) }}
                {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>