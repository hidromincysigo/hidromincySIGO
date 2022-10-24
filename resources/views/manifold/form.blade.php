<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-3">
                {{ Form::label('Nombre Manifold') }}
                {{ Form::text('nombre_manifold', $manifold->nombre_manifold, ['class' => 'form-control' . ($errors->has('nombre_manifold') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Manifold','required']); }}
                {!! $errors->first('nombre_manifold', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Manifold</label>
                    <select class="js-example-basic-single custom-select" name="tipo" id="tipo" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipo as $tipoManifold)
                        <option value="{{$tipoManifold->id}}" @if($manifold->id_tipo_manifold === $tipoManifold->id) selected="true" @endif>{{$tipoManifold->tipo_manifold}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Bridas') }}
                {{ Form::text('cant_bridas', $manifold->cant_bridas, ['class' => 'form-control' . ($errors->has('cant_bridas') ? ' is-invalid' : ''), 'placeholder' => 'Cant Bridas','required']); }}
                {!! $errors->first('cant_bridas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Monometros') }}
                {{ Form::text('cant_monometro', $manifold->cant_monometro, ['class' => 'form-control' . ($errors->has('cant_monometro') ? ' is-invalid' : ''), 'placeholder' => 'Cant Monometro','required']); }}
                {!! $errors->first('cant_monometro', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Valvulas') }}
                {{ Form::text('cant_valvulas', $manifold->cant_valvulas, ['class' => 'form-control' . ($errors->has('cant_valvulas') ? ' is-invalid' : ''), 'placeholder' => 'Cant Valvulas','required']); }}
                {!! $errors->first('cant_valvulas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Tuberias') }}
                {{ Form::text('cant_tuberias', $manifold->cant_tuberias, ['class' => 'form-control' . ($errors->has('cant_tuberias') ? ' is-invalid' : ''), 'placeholder' => 'Cant Tuberias','required']); }}
                {!! $errors->first('cant_tuberias', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}" @if($operatividadd->id === $manifold->operatividad) selected="true" @endif>{{$operatividadd->operatividad}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        {{-- <div class="col-3">
            {{ Form::label('operatividad') }}
            {{ Form::text('operatividad', $manifold->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad','required']); }}
            {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="col-3">
            <div class="form-group">
                <label>Estacion de Bombeo</label>
                <select class="js-example-basic-single custom-select" name="estacion" id="estacion" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($estacion as $estacionBombeo)
                    <option value="{{$estacionBombeo->id}}" @if($manifold->id_estacion_bombeo === $estacionBombeo->id) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
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
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>