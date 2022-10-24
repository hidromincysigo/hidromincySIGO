<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-4">
            {{ Form::label('succion_min') }}
            {{ Form::text('succion_min', $detallesTecnico->succion_min, ['class' => 'form-control' . ($errors->has('succion_min') ? ' is-invalid' : ''), 'placeholder' => 'Succion Min']) }}
            {!! $errors->first('succion_min', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('succion_max') }}
            {{ Form::text('succion_max', $detallesTecnico->succion_max, ['class' => 'form-control' . ($errors->has('succion_max') ? ' is-invalid' : ''), 'placeholder' => 'Succion Max']) }}
            {!! $errors->first('succion_max', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('descarga_min') }}
            {{ Form::text('descarga_min', $detallesTecnico->descarga_min, ['class' => 'form-control' . ($errors->has('descarga_min') ? ' is-invalid' : ''), 'placeholder' => 'Descarga Min']) }}
            {!! $errors->first('descarga_min', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('descarga_max') }}
            {{ Form::text('descarga_max', $detallesTecnico->descarga_max, ['class' => 'form-control' . ($errors->has('descarga_max') ? ' is-invalid' : ''), 'placeholder' => 'Descarga Max']) }}
            {!! $errors->first('descarga_max', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('amp_min') }}
            {{ Form::text('amp_min', $detallesTecnico->amp_min, ['class' => 'form-control' . ($errors->has('amp_min') ? ' is-invalid' : ''), 'placeholder' => 'Amp Min']) }}
            {!! $errors->first('amp_min', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('amp_max') }}
            {{ Form::text('amp_max', $detallesTecnico->amp_max, ['class' => 'form-control' . ($errors->has('amp_max') ? ' is-invalid' : ''), 'placeholder' => 'Amp Max']) }}
            {!! $errors->first('amp_max', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('voltaje_min') }}
            {{ Form::text('voltaje_min', $detallesTecnico->voltaje_min, ['class' => 'form-control' . ($errors->has('voltaje_min') ? ' is-invalid' : ''), 'placeholder' => 'Voltaje Min']) }}
            {!! $errors->first('voltaje_min', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
            {{ Form::label('voltaje_max') }}
            {{ Form::text('voltaje_max', $detallesTecnico->voltaje_max, ['class' => 'form-control' . ($errors->has('voltaje_max') ? ' is-invalid' : ''), 'placeholder' => 'Voltaje Max']) }}
            {!! $errors->first('voltaje_max', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-4">
                <div class="form-group">
                    <label>Estacion de Bombeo</label>
                    <select class="js-example-basic-single custom-select" name="estacion" id="estacion" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($estacion as $estacionBombeo)
                        <option value="{{$estacionBombeo->id}}" @if($detallesTecnico->id_estacion_bombeo === $estacionBombeo->id) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
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