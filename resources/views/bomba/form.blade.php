<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('grupo') }}
                {{ Form::text('grupo', $bomba->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo']) }}
                {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('nro_etapas') }}
                {{ Form::text('nro_etapas', $bomba->nro_etapas, ['class' => 'form-control' . ($errors->has('nro_etapas') ? ' is-invalid' : ''), 'placeholder' => 'Nro Etapas']) }}
                {!! $errors->first('nro_etapas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('rotacion') }}
                {{ Form::text('rotacion', $bomba->rotacion, ['class' => 'form-control' . ($errors->has('rotacion') ? ' is-invalid' : ''), 'placeholder' => 'Rotacion']) }}
                {!! $errors->first('rotacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('caudal') }}
                {{ Form::text('caudal', $bomba->caudal, ['class' => 'form-control' . ($errors->has('caudal') ? ' is-invalid' : ''), 'placeholder' => 'Caudal']) }}
                {!! $errors->first('caudal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('presion') }}
                {{ Form::text('presion', $bomba->presion, ['class' => 'form-control' . ($errors->has('presion') ? ' is-invalid' : ''), 'placeholder' => 'Presion']) }}
                {!! $errors->first('presion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('rpm') }}
                {{ Form::text('rpm', $bomba->rpm, ['class' => 'form-control' . ($errors->has('rpm') ? ' is-invalid' : ''), 'placeholder' => 'Rpm']) }}
                {!! $errors->first('rpm', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('peso') }}
                {{ Form::text('peso', $bomba->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
                {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('diametro_succion') }}
                {{ Form::text('diametro_succion', $bomba->diametro_succion, ['class' => 'form-control' . ($errors->has('diametro_succion') ? ' is-invalid' : ''), 'placeholder' => 'Diametro Succion']) }}
                {!! $errors->first('diametro_succion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('diametro_descarga') }}
                {{ Form::text('diametro_descarga', $bomba->diametro_descarga, ['class' => 'form-control' . ($errors->has('diametro_descarga') ? ' is-invalid' : ''), 'placeholder' => 'Diametro Descarga']) }}
                {!! $errors->first('diametro_descarga', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('tipo_sello') }}
                {{ Form::text('tipo_sello', $bomba->tipo_sello, ['class' => 'form-control' . ($errors->has('tipo_sello') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Sello']) }}
                {!! $errors->first('tipo_sello', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-4">
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $bomba->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad']) }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Área Designada</span>
            </div>
            <div class="col-6">
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
            <div class="col-6">
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
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>