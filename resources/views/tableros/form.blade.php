<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('ancho') }}
                {{ Form::text('ancho', $tablero->ancho, ['class' => 'form-control' . ($errors->has('ancho') ? ' is-invalid' : ''), 'placeholder' => 'Ancho','required']); }}
                {!! $errors->first('ancho', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('alto') }}
                {{ Form::text('alto', $tablero->alto, ['class' => 'form-control' . ($errors->has('alto') ? ' is-invalid' : ''), 'placeholder' => 'Alto','required']); }}
                {!! $errors->first('alto', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('profundidad') }}
                {{ Form::text('profundidad', $tablero->profundidad, ['class' => 'form-control' . ($errors->has('profundidad') ? ' is-invalid' : ''), 'placeholder' => 'Profundidad','required']); }}
                {!! $errors->first('profundidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('aislante') }}
                {{ Form::text('aislante', $tablero->aislante, ['class' => 'form-control' . ($errors->has('aislante') ? ' is-invalid' : ''), 'placeholder' => 'Aislante','required']); }}
                {!! $errors->first('aislante', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('capacidad') }}
                {{ Form::text('capacidad', $tablero->capacidad, ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad','required']); }}
                {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}" @if($operatividadd->id === $tablero->operatividad) selected="true" @endif>{{$operatividadd->operatividad}}</option>
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
            {{-- <div class="col-4">
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $tablero->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad','required']); }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('en_uso') }}
                {{ Form::text('en_uso', $tablero->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso','required']); }}
                {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
            <div class="col-4">
                {{ Form::label('grupo') }}
                {{ Form::text('grupo', $tablero->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo','required']); }}
                {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Tipo de Tension</label>
                    <select class="js-example-basic-single custom-select" name="tension" id="tension" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipo as $tipoTension)
                        <option value="{{$tipoTension->id}}" @if($tipoTension->id === $tablero->id_tipo_tension) selected="true" @endif>{{$tipoTension->tipo_tension_tablero}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Estacion de Bombeo</label>
                    <select class="js-example-basic-single custom-select" name="estacion" id="estacion" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($estacion as $estacionBombeo)
                        <option value="{{$estacionBombeo->id}}" @if($estacionBombeo->id === $tablero->id_estacion_bombeo) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-header col-12" style="padding-top: 10px;">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Fabricante</h3>
                </div>
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
            {{-- <div class="card-header col-12" style="padding-top: 10px;">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Estado</h3>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>