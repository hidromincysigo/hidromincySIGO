<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('diametro') }}
                {{ Form::text('diametro', $valvula->diametro, ['class' => 'form-control' . ($errors->has('diametro') ? ' is-invalid' : ''), 'placeholder' => 'Diametro','required']); }}
                {!! $errors->first('diametro', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('presion_nominal') }}
                {{ Form::text('presion_nominal', $valvula->presion_nominal, ['class' => 'form-control' . ($errors->has('presion_nominal') ? ' is-invalid' : ''), 'placeholder' => 'Presion Nominal','required']); }}
                {!! $errors->first('presion_nominal', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo Valvula</label>
                    <select class="js-example-basic-single custom-select" name="tipo" id="tipo" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipo as $tvalvula)
                        <option value="{{$tvalvula->id}}" @if($tvalvula->id === $valvula->id_tipo_valvula) selected="true" @endif>{{$tvalvula->tipo_valvula}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Accionamiento</label>
                    <select class="js-example-basic-single custom-select" name="accionamiento" id="accionamiento" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($accionamiento as $accionamientos)
                        <option value="{{$accionamientos->id}}" @if($accionamientos->id === $valvula->accionamiento) selected="true" @endif>{{$accionamientos->tipo_accionamiento}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-3">
                {{ Form::label('accionamiento') }}
                {{ Form::text('accionamiento', $valvula->accionamiento, ['class' => 'form-control' . ($errors->has('accionamiento') ? ' is-invalid' : ''), 'placeholder' => 'Accionamiento','required']); }}
                {!! $errors->first('accionamiento', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
            <div class="col-3">
                {{ Form::label('fc') }}
                {{ Form::text('fc', $valvula->fc, ['class' => 'form-control' . ($errors->has('fc') ? ' is-invalid' : ''), 'placeholder' => 'Fc','required']); }}
                {!! $errors->first('fc', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}" @if($operatividadd->id === $valvula->operatividad) selected="true" @endif>{{$operatividadd->operatividad}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-3">
                {{ Form::label('operatividad') }}
                {{ Form::text('operatividad', $valvula->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad','required']); }}
                {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
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
            {{ Form::text('en_uso', $valvula->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso','required']); }}
            {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="col-3">
            <div class="form-group">
                <label>Estacion de Bombeo</label>
                <select class="js-example-basic-single custom-select" name="estacion" id="estacion" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($estacion as $estacionBombeo)
                    <option value="{{$estacionBombeo->id}}" @if($estacionBombeo->id === $valvula->id_estacion_bombeo) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
            <h3 class="card-title" style="color: white;">Fabricante</h3>
        </div>
        <div class="col-3">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre_fabricante', $fabricante->nombre_fabricante, ['class' => 'form-control' . ($errors->has('nombre_fabricante') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Fabricante','required']); }}
            {!! $errors->first('nombre_fabricante', '<div class="invalid-feedback">:message</div>') !!}
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
            {{-- <div class="col-3">
                {{ Form::label('ficha') }}
                {{ Form::text('ficha', $fabricante->ficha, ['class' => 'form-control' . ($errors->has('ficha') ? ' is-invalid' : ''), 'placeholder' => 'Ficha','required']); }}
                {!! $errors->first('ficha', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
        </div>
    </div>
</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>