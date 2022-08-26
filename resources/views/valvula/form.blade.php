<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('diametro') }}
                {{ Form::text('diametro', $valvula->diametro, ['class' => 'form-control' . ($errors->has('diametro') ? ' is-invalid' : ''), 'placeholder' => 'Diametro']) }}
                {!! $errors->first('diametro', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('presion_nominal') }}
                {{ Form::text('presion_nominal', $valvula->presion_nominal, ['class' => 'form-control' . ($errors->has('presion_nominal') ? ' is-invalid' : ''), 'placeholder' => 'Presion Nominal']) }}
                {!! $errors->first('presion_nominal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo Valvula</label>
                    <select class="js-example-basic-single custom-select" name="tipo" id="tipo" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipo as $tvalvula)
                        <option value="{{$tvalvula->id}}">{{$tvalvula->tipo_valvula}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('accionamiento') }}
                {{ Form::text('accionamiento', $valvula->accionamiento, ['class' => 'form-control' . ($errors->has('accionamiento') ? ' is-invalid' : ''), 'placeholder' => 'Accionamiento']) }}
                {!! $errors->first('accionamiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('fc') }}
                {{ Form::text('fc', $valvula->fc, ['class' => 'form-control' . ($errors->has('fc') ? ' is-invalid' : ''), 'placeholder' => 'Fc']) }}
                {!! $errors->first('fc', '<div class="invalid-feedback">:message</div>') !!}
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
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $valvula->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad']) }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>