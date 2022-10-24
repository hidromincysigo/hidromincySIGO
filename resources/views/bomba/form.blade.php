<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('grupo') }}
                {{ Form::text('grupo', $bomba->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo','required']); }}
                {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('nro_etapas') }}
                {{ Form::text('nro_etapas', $bomba->nro_etapas, ['class' => 'form-control' . ($errors->has('nro_etapas') ? ' is-invalid' : ''), 'placeholder' => 'Nro Etapas','required']); }}
                {!! $errors->first('nro_etapas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('rotacion') }}
                {{ Form::text('rotacion', $bomba->rotacion, ['class' => 'form-control' . ($errors->has('rotacion') ? ' is-invalid' : ''), 'placeholder' => 'Rotacion','required']); }}
                {!! $errors->first('rotacion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('caudal') }}
                {{ Form::text('caudal', $bomba->caudal, ['class' => 'form-control' . ($errors->has('caudal') ? ' is-invalid' : ''), 'placeholder' => 'Caudal','required']); }}
                {!! $errors->first('caudal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('presion') }}
                {{ Form::text('presion', $bomba->presion, ['class' => 'form-control' . ($errors->has('presion') ? ' is-invalid' : ''), 'placeholder' => 'Presion','required']); }}
                {!! $errors->first('presion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('rpm') }}
                {{ Form::text('rpm', $bomba->rpm, ['class' => 'form-control' . ($errors->has('rpm') ? ' is-invalid' : ''), 'placeholder' => 'Rpm','required']); }}
                {!! $errors->first('rpm', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('peso') }}
                {{ Form::text('peso', $bomba->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso','required']); }}
                {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('diametro_succion') }}
                {{ Form::text('diametro_succion', $bomba->diametro_succion, ['class' => 'form-control' . ($errors->has('diametro_succion') ? ' is-invalid' : ''), 'placeholder' => 'Diametro Succion','required']); }}
                {!! $errors->first('diametro_succion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('diametro_descarga') }}
                {{ Form::text('diametro_descarga', $bomba->diametro_descarga, ['class' => 'form-control' . ($errors->has('diametro_descarga') ? ' is-invalid' : ''), 'placeholder' => 'Diametro Descarga','required']); }}
                {!! $errors->first('diametro_descarga', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('tipo_sello') }}
                {{ Form::text('tipo_sello', $bomba->tipo_sello, ['class' => 'form-control' . ($errors->has('tipo_sello') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Sello','required']); }}
                {!! $errors->first('tipo_sello', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}" @if($operatividadd->id === $bomba->operatividad) selected="true" @endif>{{$operatividadd->operatividad}}</option>
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
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $bomba->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad','required']); }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
            {{-- <div class="col-3">
                {{ Form::label('En Uso') }}
                {{ Form::text('en_uso', $bomba->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso','required']); }}
                {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
            <div class="col-3">
                <div class="form-group">
                    <label>Estacion de Bombeo</label>
                    <select class="js-example-basic-single custom-select" name="estacion" id="estacion" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($estacion as $estacionBombeo)
                        <option value="{{$estacionBombeo->id}}" @if($bomba->id_estacion_bombeo === $estacionBombeo->id) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
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
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>