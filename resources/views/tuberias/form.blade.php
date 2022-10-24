<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-3">
            {{ Form::label('diametro') }}
            {{ Form::text('diametro', $tuberia->diametro, ['class' => 'form-control' . ($errors->has('diametro') ? ' is-invalid' : ''), 'placeholder' => 'Diametro','required']); }}
            {!! $errors->first('diametro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('norma') }}
            {{ Form::text('norma', $tuberia->norma, ['class' => 'form-control' . ($errors->has('norma') ? ' is-invalid' : ''), 'placeholder' => 'Norma','required']); }}
            {!! $errors->first('norma', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('grado') }}
            {{ Form::text('grado', $tuberia->grado, ['class' => 'form-control' . ($errors->has('grado') ? ' is-invalid' : ''), 'placeholder' => 'Grado','required']); }}
            {!! $errors->first('grado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('espesor') }}
            {{ Form::text('espesor', $tuberia->espesor, ['class' => 'form-control' . ($errors->has('espesor') ? ' is-invalid' : ''), 'placeholder' => 'Espesor','required']); }}
            {!! $errors->first('espesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('longitud') }}
            {{ Form::text('longitud', $tuberia->longitud, ['class' => 'form-control' . ($errors->has('longitud') ? ' is-invalid' : ''), 'placeholder' => 'Longitud','required']); }}
            {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('sdr') }}
            {{ Form::text('sdr', $tuberia->sdr, ['class' => 'form-control' . ($errors->has('sdr') ? ' is-invalid' : ''), 'placeholder' => 'Sdr','required']); }}
            {!! $errors->first('sdr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('pn') }}
            {{ Form::text('pn', $tuberia->pn, ['class' => 'form-control' . ($errors->has('pn') ? ' is-invalid' : ''), 'placeholder' => 'Pn','required']); }}
            {!! $errors->first('pn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('rde') }}
            {{ Form::text('rde', $tuberia->rde, ['class' => 'form-control' . ($errors->has('rde') ? ' is-invalid' : ''), 'placeholder' => 'Rde','required']); }}
            {!! $errors->first('rde', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
                <div class="form-group">
                    <label>Operatividad</label>
                    <select class="js-example-basic-single custom-select" name="operatividad" id="operatividad" required>
                        <option value="#" selected>Seleccione</option>
                        @foreach($operatividad as $operatividadd)
                        <option value="{{$operatividadd->id}}" @if($operatividadd->id === $tuberia->operatividad) selected="true" @endif>{{$operatividadd->operatividad}}</option>
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
            {{ Form::text('operatividad', $tuberia->operatividad, ['class' => 'form-control' . ($errors->has('operatividad') ? ' is-invalid' : ''), 'placeholder' => 'Operatividad','required']); }}
            {!! $errors->first('operatividad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{ Form::label('en_uso') }}
            {{ Form::text('en_uso', $tuberia->en_uso, ['class' => 'form-control' . ($errors->has('en_uso') ? ' is-invalid' : ''), 'placeholder' => 'En Uso','required']); }}
            {!! $errors->first('en_uso', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="col-3">
            <div class="form-group">
                <label>Tipo Tubería</label>
                <select class="js-example-basic-single custom-select" name="tuberia" id="tuberia" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($tipo as $tipoTuberia)
                    <option value="{{$tipoTuberia->id}}" @if($tipoTuberia->id === $tuberia->id_tipo_tuberia) selected="true" @endif>{{$tipoTuberia->tipo_tuberia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo Material</label>
                <select class="js-example-basic-single custom-select" name="material" id="material" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($material as $tipoMaterial)
                    <option value="{{$tipoMaterial->id}}" @if($tipoMaterial->id === $tuberia->id_tipo_material) selected="true" @endif>{{$tipoMaterial->tipo_material}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Manifold</label>
                <select class="js-example-basic-single custom-select" name="manifold" id="manifold" required>
                    <option value="#" selected>Seleccione</option>
                    @foreach($manifold as $manifold)
                    <option value="{{$manifold->id}}" @if($manifold->id === $tuberia->id_manifold) selected="true" @endif>{{$manifold->nombre_manifold}}</option>
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
                    <option value="{{$estacionBombeo->id}}" @if($estacionBombeo->id === $tuberia->id_estacion_bombeo) selected="true" @endif>{{$estacionBombeo->nombre_infraestructura}}</option>
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
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>