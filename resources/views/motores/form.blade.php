<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('potencia') }}
                {{ Form::text('potencia', $motores->potencia, ['class' => 'form-control' . ($errors->has('potencia') ? ' is-invalid' : ''), 'placeholder' => 'Potencia','required']); }}
                {!! $errors->first('potencia', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('amperaje') }}
                {{ Form::text('amperaje', $motores->amperaje, ['class' => 'form-control' . ($errors->has('amperaje') ? ' is-invalid' : ''), 'placeholder' => 'Amperaje','required']); }}
                {!! $errors->first('amperaje', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('tension (V)') }}
                {{ Form::text('tension', $motores->tension, ['class' => 'form-control' . ($errors->has('tension') ? ' is-invalid' : ''), 'placeholder' => 'Tension','required']); }}
                {!! $errors->first('tension', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('rpm') }}
                {{ Form::text('rpm', $motores->rpm, ['class' => 'form-control' . ($errors->has('rpm') ? ' is-invalid' : ''), 'placeholder' => 'Rpm','required']); }}
                {!! $errors->first('rpm', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('capacidad_amperio') }}
                {{ Form::text('capacidad_amperio', $motores->capacidad_amperio, ['class' => 'form-control' . ($errors->has('capacidad_amperio') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad Amperio','required']); }}
                {!! $errors->first('capacidad_amperio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('contactor') }}
                {{ Form::text('contactor', $motores->contactor, ['class' => 'form-control' . ($errors->has('contactor') ? ' is-invalid' : ''), 'placeholder' => 'Contactor','required']); }}
                {!! $errors->first('contactor', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('rele_termico') }}
                {{ Form::text('rele_termico', $motores->rele_termico, ['class' => 'form-control' . ($errors->has('rele_termico') ? ' is-invalid' : ''), 'placeholder' => 'Rele Termico','required']); }}
                {!! $errors->first('rele_termico', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('temperatura (º)') }}
                {{ Form::text('temperatura', $motores->temperatura, ['class' => 'form-control' . ($errors->has('temperatura') ? ' is-invalid' : ''), 'placeholder' => 'Temperatura','required']); }}
                {!! $errors->first('temperatura', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Motor</label>
                    <select class="js-example-basic-single custom-select" name="tipoMotor" id="tipoMotor" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipoMotor as $tipoMotors)
                        <option value="{{$tipoMotors->id}}" @if($motores->id_tipo_motor=== $tipoMotors->id) selected="true" @endif>{{$tipoMotors->tipo_motor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Arranque</label>
                    <select class="js-example-basic-single custom-select" name="arranque" id="arranque" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($arranque as $tipoArranque)
                        <option value="{{$tipoArranque->id}}" @if($motores->id_tipo_arranque === $tipoArranque->id) selected="true" @endif>{{$tipoArranque->tipo_arranque}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Interruptor</label>
                    <select class="js-example-basic-single custom-select" name="interruptor" id="interruptor" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($interruptor as $tipoInterruptor)
                        <option value="{{$tipoInterruptor->id}}" @if($motores->id_tipo_interruptor === $tipoInterruptor->id) selected="true" @endif>{{$tipoInterruptor->tipo_interruptor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Estacion de Bombeo</label>
                    <select class="js-example-basic-single custom-select" name="estacion" id="estacion" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($estacion as $estacionBombeo)
                        <option value="{{$estacionBombeo->id}}" @if($motores->id_estacion_bombeo === $estacionBombeo->id) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('supervisor_fase') }}
                {{ Form::text('supervisor_fase', $motores->supervisor_fase, ['class' => 'form-control' . ($errors->has('supervisor_fase') ? ' is-invalid' : ''), 'placeholder' => 'Supervisor Fase','required']); }}
                {!! $errors->first('supervisor_fase', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            {{-- <div class="col-3">
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $motores->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad','required']); }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
            <div class="col-3">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}" @if($operatividadd->id === $motores->operatividad) selected="true" @endif>{{$operatividadd->operatividad}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>En Uso</label>
                    <select class="js-example-basic-single custom-select" name="en_uso" id="en_uso" required>
                        <option value="true" selected>SI</option>
                        <option value="false">NO</option>
                    </select>
                </div>
            </div>
            {{-- <div class="col-3">
                {{ Form::label('en_uso') }}
                {{ Form::text('en_uso', $motores->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso','required']); }}
                {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
            <div class="col-3">
                {{ Form::label('grupo') }}
                {{ Form::text('grupo', $motores->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo','required']); }}
                {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
                <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
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
            </div>
            {{-- <div class="col-4">
                {{ Form::label('ficha') }}
                {{ Form::text('ficha', $fabricante->ficha, ['class' => 'form-control' . ($errors->has('ficha') ? ' is-invalid' : ''), 'placeholder' => 'Ficha','required']); }}
                {!! $errors->first('ficha', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>