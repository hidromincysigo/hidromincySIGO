<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-3">
            {{ Form::label('potencia') }}
            {{ Form::text('potencia', $motores->potencia, ['class' => 'form-control' . ($errors->has('potencia') ? ' is-invalid' : ''), 'placeholder' => 'Potencia']) }}
            {!! $errors->first('potencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('amperaje') }}
            {{ Form::text('amperaje', $motores->amperaje, ['class' => 'form-control' . ($errors->has('amperaje') ? ' is-invalid' : ''), 'placeholder' => 'Amperaje']) }}
            {!! $errors->first('amperaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('tension') }}
            {{ Form::text('tension', $motores->tension, ['class' => 'form-control' . ($errors->has('tension') ? ' is-invalid' : ''), 'placeholder' => 'Tension']) }}
            {!! $errors->first('tension', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('rpm') }}
            {{ Form::text('rpm', $motores->rpm, ['class' => 'form-control' . ($errors->has('rpm') ? ' is-invalid' : ''), 'placeholder' => 'Rpm']) }}
            {!! $errors->first('rpm', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('capacidad_amperio') }}
            {{ Form::text('capacidad_amperio', $motores->capacidad_amperio, ['class' => 'form-control' . ($errors->has('capacidad_amperio') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad Amperio']) }}
            {!! $errors->first('capacidad_amperio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('contactor') }}
            {{ Form::text('contactor', $motores->contactor, ['class' => 'form-control' . ($errors->has('contactor') ? ' is-invalid' : ''), 'placeholder' => 'Contactor']) }}
            {!! $errors->first('contactor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('rele_termico') }}
            {{ Form::text('rele_termico', $motores->rele_termico, ['class' => 'form-control' . ($errors->has('rele_termico') ? ' is-invalid' : ''), 'placeholder' => 'Rele Termico']) }}
            {!! $errors->first('rele_termico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('temperatura') }}
            {{ Form::text('temperatura', $motores->temperatura, ['class' => 'form-control' . ($errors->has('temperatura') ? ' is-invalid' : ''), 'placeholder' => 'Temperatura']) }}
            {!! $errors->first('temperatura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Arranque</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($arranque as $tipoArranque)
                        <option value="{{$tipoArranque->id}}">{{$tipoArranque->tipo_arranque}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Interruptor</label>
                    <select class="js-example-basic-single custom-select" name="estado" id="estado" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($interruptor as $tipoInterruptor)
                        <option value="{{$tipoInterruptor->id}}">{{$tipoInterruptor->tipo_interruptor}}</option>
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
            {{ Form::label('supervisor_fase') }}
            {{ Form::text('supervisor_fase', $motores->supervisor_fase, ['class' => 'form-control' . ($errors->has('supervisor_fase') ? ' is-invalid' : ''), 'placeholder' => 'Supervisor Fase']) }}
            {!! $errors->first('supervisor_fase', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('operatividad') }}
            {{ Form::text('operatividad', $motores->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad']) }}
            {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('en_uso') }}
            {{ Form::text('en_uso', $motores->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso']) }}
            {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('grupo') }}
            {{ Form::text('grupo', $motores->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo']) }}
            {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>