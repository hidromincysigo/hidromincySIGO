<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $embalse->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $embalse->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $embalse->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parroquia') }}
            {{ Form::text('parroquia', $embalse->parroquia, ['class' => 'form-control' . ($errors->has('parroquia') ? ' is-invalid' : ''), 'placeholder' => 'Parroquia']) }}
            {!! $errors->first('parroquia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sector') }}
            {{ Form::text('sector', $embalse->sector, ['class' => 'form-control' . ($errors->has('sector') ? ' is-invalid' : ''), 'placeholder' => 'Sector']) }}
            {!! $errors->first('sector', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('coordenadas') }}
            {{ Form::text('coordenadas', $embalse->coordenadas, ['class' => 'form-control' . ($errors->has('coordenadas') ? ' is-invalid' : ''), 'placeholder' => 'Coordenadas']) }}
            {!! $errors->first('coordenadas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proposito') }}
            {{ Form::text('proposito', $embalse->proposito, ['class' => 'form-control' . ($errors->has('proposito') ? ' is-invalid' : ''), 'placeholder' => 'Proposito']) }}
            {!! $errors->first('proposito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('propietario') }}
            {{ Form::text('propietario', $embalse->propietario, ['class' => 'form-control' . ($errors->has('propietario') ? ' is-invalid' : ''), 'placeholder' => 'Propietario']) }}
            {!! $errors->first('propietario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('constructora') }}
            {{ Form::text('constructora', $embalse->constructora, ['class' => 'form-control' . ($errors->has('constructora') ? ' is-invalid' : ''), 'placeholder' => 'Constructora']) }}
            {!! $errors->first('constructora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cronologia') }}
            {{ Form::text('cronologia', $embalse->cronologia, ['class' => 'form-control' . ($errors->has('cronologia') ? ' is-invalid' : ''), 'placeholder' => 'Cronologia']) }}
            {!! $errors->first('cronologia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>