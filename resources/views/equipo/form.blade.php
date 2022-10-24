<div class="box box-info padding-1">
    <div class="box-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Se encontraron los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Equipo</label>
                    <select class="custom-select" name="tipo_equipo" id="tipo_equipo" onchange="mostrarDisenoEquipo(this.value)">
                        <option value="">Seleccione</option>
                        @foreach($tipoEquipo as $tipoEquipos)
                        <option value="{{$tipoEquipos->id}}" @if($equipo->tipo_equipo === $tipoEquipos->id) selected="true" @endif>{{$tipoEquipos->tipo_equipo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('nombre_equipo') }}
                {{ Form::text('nombre_equipo', $equipo->nombre_equipo, ['class' => 'form-control' . ($errors->has('nombre_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombre_equipo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('marca') }}
                {{ Form::text('marca', $equipo->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
                {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-3">
                {{ Form::label('modelo') }}
                {{ Form::text('modelo', $equipo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        
        <div name="bomba" id="bomba" style="display:none;">
            <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
                <h3 class="card-title" style="color: white;">Diseño de Fabricante</h3>
            </div>
            <div class="row">
                <div class="col-3">
                    {{ Form::label('nro_etapas') }}
                    <input type="text" class="form-control required" id="nro_etapas" name="nro_etapas" @if(isset($bomba->nro_etapas)) value="{{$bomba->nro_etapas}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('rotacion') }}
                    <input type="text" class="form-control required" id="rotacion" name="rotacion" @if(isset($bomba->rotacion)) value="{{$bomba->rotacion}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('caudal') }}
                    <input type="text" class="form-control required" id="caudal" name="caudal" @if(isset($bomba->caudal)) value="{{$bomba->caudal}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('presion') }}
                    <input type="text" class="form-control required" id="presion" name="presion" @if(isset($bomba->presion)) value="{{$bomba->presion}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('rpm') }}
                    <input type="text" class="form-control required" id="rpm" name="rpm" @if(isset($bomba->rpm)) value="{{$bomba->rpm}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('peso') }}
                    <input type="text" class="form-control required" id="peso" name="peso" @if(isset($bomba->peso)) value="{{$bomba->peso}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('diametro_succion') }}
                    <input type="text" class="form-control required" id="diametro_succion" name="diametro_succion" @if(isset($bomba->diametro_succion)) value="{{$bomba->diametro_succion}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('diametro_descarga') }}
                    <input type="text" class="form-control required" id="diametro_descarga" name="diametro_descarga" @if(isset($bomba->diametro_descarga)) value="{{$bomba->diametro_descarga}}" @endif>
                </div>
                <div class="col-3">
                    {{ Form::label('tipo_sello') }}
                    <input type="text" class="form-control required" id="tipo_sello" name="tipo_sello" @if(isset($bomba->tipo_sello)) value="{{$bomba->tipo_sello}}" @endif>
                </div>
            </div>
        </div>




                <div name="manifold" id="manifold" style="display:none;">
    
            <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
                <h3 class="card-title" style="color: white;">Diseño de Fabricante</h3>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>Tipo de Manifold</label>
                    <select class="js-example-basic-single custom-select" name="tipoManifold" id="tipoManifold">
                        <option value="" selected>Seleccione</option>
                        @foreach($tipoManifold as $tipoManifold)
                        <option value="{{$tipoManifold->id}}" @if(isset($manifold->id_tipo_manifold) and $manifold->id_tipo_manifold === $tipoManifold->id) selected="true" @endif>{{$tipoManifold->tipo_manifold}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-3">
                    {{ Form::label('Cantidad Bridas') }}
                    <input type="text" class="form-control required" id="cant_bridas" name="cant_bridas" @if(isset($manifold->cant_bridas)) value="{{ $manifold->cant_bridas }}" @endif>
                {{-- {{ Form::text('cant_bridas', $manifold->cant_bridas, ['class' => 'form-control' . ($errors->has('cant_bridas') ? ' is-invalid' : ''), 'placeholder' => 'Cant Bridas','required']); }}
                {!! $errors->first('cant_bridas', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Monometros') }}
                <input type="text" class="form-control required" id="cant_monometros" name="cant_monometros" @if(isset($manifold->cant_monometro)) value="{{$manifold->cant_monometro}}" @endif>
                {{-- {{ Form::text('cant_monometro', $manifold->cant_monometro, ['class' => 'form-control' . ($errors->has('cant_monometro') ? ' is-invalid' : ''), 'placeholder' => 'Cant Monometro','required']); }}
                {!! $errors->first('cant_monometro', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Valvulas') }}
                <input type="text" class="form-control required" id="cant_valvulas" name="cant_valvulas" @if(isset($manifold->cant_valvulas)) value="{{$manifold->cant_valvulas}}" @endif>

                {{-- {{ Form::text('cant_valvulas', $manifold->cant_valvulas, ['class' => 'form-control' . ($errors->has('cant_valvulas') ? ' is-invalid' : ''), 'placeholder' => 'Cant Valvulas','required']); }}
                {!! $errors->first('cant_valvulas', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('Cantidad Tuberias') }}
                <input type="text" class="form-control required" id="cant_tuberias" name="cant_tuberias" @if(isset($manifold->cant_tuberias)) value="{{$manifold->cant_tuberias}}" @endif>

                {{-- {{ Form::text('cant_tuberias', $manifold->cant_tuberias, ['class' => 'form-control' . ($errors->has('cant_tuberias') ? ' is-invalid' : ''), 'placeholder' => 'Cant Tuberias','required']); }}
                {!! $errors->first('cant_tuberias', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
        </div>
    </div>

        <div name="motor" id="motor" style="display:none;">

        <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
            <h3 class="card-title" style="color: white;">Diseño de Fabricante</h3>
        </div>
        <div class="row">
            <div class="col-3">
                {{ Form::label('potencia') }}
                <input type="text" class="form-control required" name="potencia" id="potencia" @if(isset($motores->potencia)) value="{{$motores->potencia}}" @endif>
                {{-- {{ Form::text('potencia', $motores->potencia, ['class' => 'form-control' . ($errors->has('potencia') ? ' is-invalid' : ''), 'placeholder' => 'Potencia','required']); }}
                {!! $errors->first('potencia', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('amperaje') }}
                <input type="text" class="form-control required" name="amperaje" id="amperaje" @if(isset($motores->amperaje)) value="{{$motores->amperaje}}" @endif>
                {{-- {{ Form::text('amperaje', $motores->amperaje, ['class' => 'form-control' . ($errors->has('amperaje') ? ' is-invalid' : ''), 'placeholder' => 'Amperaje','required']); }}
                {!! $errors->first('amperaje', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('tension (V)') }}
                <input type="text" class="form-control required" name="tension" id="tension" @if(isset($motores->tension)) value="{{$motores->tension}}" @endif>
                {{-- {{ Form::text('tension', $motores->tension, ['class' => 'form-control' . ($errors->has('tension') ? ' is-invalid' : ''), 'placeholder' => 'Tension','required']); }}
                {!! $errors->first('tension', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('rpm') }}
                <input type="text" class="form-control required" name="rpmMotor" id="rpmMotor" @if(isset($motores->rpm)) value="{{$motores->rpm}}" @endif>
                {{-- {{ Form::text('rpm', $motores->rpm, ['class' => 'form-control' . ($errors->has('rpm') ? ' is-invalid' : ''), 'placeholder' => 'Rpm','required']); }}
                {!! $errors->first('rpm', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('capacidad_amperio') }}
                <input type="text" class="form-control required" name="capacidad_amperio" id="capacidad_amperio" @if(isset($motores->capacidad_amperio)) value="{{$motores->capacidad_amperio}}" @endif>
                {{-- {{ Form::text('capacidad_amperio', $motores->capacidad_amperio, ['class' => 'form-control' . ($errors->has('capacidad_amperio') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad Amperio','required']); }}
                {!! $errors->first('capacidad_amperio', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('contactor') }}
                <input type="text" class="form-control required" name="contactor" id="contactor" @if(isset($motores->contactor)) value="{{$motores->contactor}}" @endif>
                {{-- {{ Form::text('contactor', $motores->contactor, ['class' => 'form-control' . ($errors->has('contactor') ? ' is-invalid' : ''), 'placeholder' => 'Contactor','required']); }}
                {!! $errors->first('contactor', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('rele_termico') }}
                <input type="text" class="form-control required" name="rele_termico" id="rele_termico" @if(isset($motores->rele_termico)) value="{{$motores->rele_termico}}" @endif>
                {{-- {{ Form::text('rele_termico', $motores->rele_termico, ['class' => 'form-control' . ($errors->has('rele_termico') ? ' is-invalid' : ''), 'placeholder' => 'Rele Termico','required']); }}
                {!! $errors->first('rele_termico', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('temperatura (º)') }}
                <input type="text" class="form-control required" name="temperatura" id="temperatura" @if(isset($motores->temperatura)) value="{{$motores->temperatura}}" @endif>
                {{-- {{ Form::text('temperatura', $motores->temperatura, ['class' => 'form-control' . ($errors->has('temperatura') ? ' is-invalid' : ''), 'placeholder' => 'Temperatura','required']); }}
                {!! $errors->first('temperatura', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Motor</label>
                    <select class="js-example-basic-single custom-select" name="tipoMotor" id="tipoMotor">
                        <option value="" selected>Seleccione</option>
                        @foreach($tipoMotor as $tipoMotors)
                        <option value="{{$tipoMotors->id}}" @if(isset($motores->id_tipo_motor) and $motores->id_tipo_motor === $tipoMotors->id) selected="true" @endif>{{$tipoMotors->tipo_motor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Arranque</label>
                    <select class="js-example-basic-single custom-select" name="arranque" id="arranque">
                        <option value="" selected>Seleccione</option>
                        @foreach($arranque as $tipoArranque)
                        <option value="{{$tipoArranque->id}}" @if(isset($motores->id_tipo_arranque) and $motores->id_tipo_arranque === $tipoArranque->id) selected="true" @endif>{{$tipoArranque->tipo_arranque}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tipo de Interruptor</label>
                    <select class="js-example-basic-single custom-select" name="interruptor" id="interruptor">
                        <option value="" selected>Seleccione</option>
                        @foreach($interruptor as $tipoInterruptor)
                        <option value="{{$tipoInterruptor->id}}" @if(isset($motores->id_tipo_interruptor) and $motores->id_tipo_interruptor === $tipoInterruptor->id) selected="true" @endif>{{$tipoInterruptor->tipo_interruptor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                {{ Form::label('supervisor_fase') }}
                <input type="text" class="form-control required" name="supervisor_fase" id="supervisor_fase" @if(isset($motores->supervisor_fase)) value="{{$motores->supervisor_fase}}" @endif>
                {{-- {{ Form::text('supervisor_fase', $motores->supervisor_fase, ['class' => 'form-control' . ($errors->has('supervisor_fase') ? ' is-invalid' : ''), 'placeholder' => 'Supervisor Fase','required']); }}
                {!! $errors->first('supervisor_fase', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
        </div>
    </div>

        <div name="tablero" id="tablero" style="display:none;">

        <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
            <h3 class="card-title" style="color: white;">Diseño de Fabricante</h3>
        </div>
        <div class="row">
            <div class="col-3">
                {{ Form::label('ancho') }}
                <input type="text" class="form-control required" name="ancho" id="ancho" @if(isset($tablero->ancho)) value="{{$tablero->ancho}}" @endif>
                {{--                 {{ Form::text('ancho', $tablero->ancho, ['class' => 'form-control' . ($errors->has('ancho') ? ' is-invalid' : ''), 'placeholder' => 'Ancho','required']); }}
                {!! $errors->first('ancho', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('alto') }}
                <input type="text" class="form-control required" name="alto" id="alto" @if(isset($tablero->alto)) value="{{$tablero->alto}}" @endif>
                {{--                 {{ Form::text('alto', $tablero->alto, ['class' => 'form-control' . ($errors->has('alto') ? ' is-invalid' : ''), 'placeholder' => 'Alto','required']); }}
                {!! $errors->first('alto', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('profundidad') }}
                <input type="text" class="form-control required" name="profundidad" id="profundidad" @if(isset($tablero->profundidad)) value="{{$tablero->profundidad}}" @endif>
                {{-- {{ Form::text('profundidad', $tablero->profundidad, ['class' => 'form-control' . ($errors->has('profundidad') ? ' is-invalid' : ''), 'placeholder' => 'Profundidad','required']); }}
                {!! $errors->first('profundidad', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-3">
                {{ Form::label('aislante') }}
                <input type="text" class="form-control required" name="aislante" id="aislante" @if(isset($tablero->aislante)) value="{{$tablero->aislante}}" @endif>
                {{-- {{ Form::text('aislante', $tablero->aislante, ['class' => 'form-control' . ($errors->has('aislante') ? ' is-invalid' : ''), 'placeholder' => 'Aislante','required']); }}
                {!! $errors->first('aislante', '<div class="invalid-feedback">:message</div>') !!} --}}
            </div>
            <div class="col-4">
                {{ Form::label('capacidad') }}
                <input type="text" class="form-control required" name="capacidad" id="capacidad" @if(isset($tablero->capacidad)) value="{{$tablero->capacidad}}" @endif>
                {{-- {{ Form::text('capacidad', $tablero->capacidad, ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad','required']); }}
                {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!} --}}
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
                <div class="form-group">
                    <label>Tipo de Tension</label>
                    <select class="js-example-basic-single custom-select" name="tensionTablero" id="tensionTablero">
                        <option value="#" selected>Seleccione</option>
                        @foreach($tipoTension as $tipoTension)
                        <option value="{{$tipoTension->id}}" @if(isset($tablero->id_tipo_tension) and $tablero->id_tipo_tension === $tipoTension->id) selected="true" @endif>{{$tipoTension->tipo_tension_tablero}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

        <div name="tuberia" id="tuberia" style="display:none;">

        <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
            <h3 class="card-title" style="color: white;">Diseño de Fabricante</h3>
        </div>
        <div class="row">
            <div class="col-3">
                {{ Form::label('diametro') }}
                <input type="text" class="form-control required" name="diametro" id="diametro" @if(isset($tuberia->diametro)) value="{{ $tuberia->diametro }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('norma') }}
                <input type="text" class="form-control required" name="norma" id="norma" @if(isset($tuberia->norma)) value="{{ $tuberia->norma }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('grado') }}
                <input type="text" class="form-control required" name="grado" id="grado" @if(isset($tuberia->grado)) value="{{ $tuberia->grado }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('espesor') }}
                <input type="text" class="form-control required" name="espesor" id="espesor" @if(isset($tuberia->espesor)) value="{{ $tuberia->espesor }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('longitud') }}
                <input type="text" class="form-control required" name="longitud" id="longitud" @if(isset($tuberia->longitud)) value="{{ $tuberia->longitud }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('sdr') }}
                <input type="text" class="form-control required" name="sdr" id="sdr" @if(isset($tuberia->sdr)) value="{{ $tuberia->sdr }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('pn') }}
                <input type="text" class="form-control required" name="pn" id="pn" @if(isset($tuberia->pn)) value="{{ $tuberia->pn }}" @endif>
            </div>
            <div class="col-3">
                {{ Form::label('rde') }}
                <input type="text" class="form-control required" name="rde" id="rde" @if(isset($tuberia->rde)) value="{{ $tuberia->rde }}" @endif>
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
                <select class="js-example-basic-single custom-select" name="tuberia" id="tuberia">
                    <option value="#" selected>Seleccione</option>
                    @foreach($tipoTuberia as $tipoTuberia)
                    <option value="{{$tipoTuberia->id}}" @if(isset($tuberia->id_tipo_tuberia) and $tuberia->id_tipo_tuberia === $tipoTuberia->id) selected="true" @endif>{{$tipoTuberia->tipo_tuberia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo Material</label>
                <select class="js-example-basic-single custom-select" name="material" id="material">
                    <option value="#" selected>Seleccione</option>
                    @foreach($material as $tipoMaterial)
                    <option value="{{$tipoMaterial->id}}" @if(isset($tuberia->id_tipo_material) and $tipoMaterial->id) selected="true" @endif>{{$tipoMaterial->tipo_material}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div name="valvula" id="valvula" style="display:none;">
    <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
        <h3 class="card-title" style="color: white;">Diseño de Fabricante</h3>
    </div>
    <div class="row">
        <div class="col-3">
            {{ Form::label('diametro') }}
            <input type="text" class="form-control required" name="diametroValvula" id="diametroValvula" @if(isset($valvula->diametro)) value="{{ $valvula->diametro }}" @endif>
        </div>
        <div class="col-3">
            {{ Form::label('presion_nominal') }}
            <input type="text" class="form-control required" name="presion_nominal" id="presion_nominal" @if(isset($valvula->presion_nominal)) value="{{ $valvula->presion_nominal }}" @endif>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Tipo Valvula</label>
                <select class="js-example-basic-single custom-select" name="tipoValvula" id="tipoValvula">
                    <option value="#" selected>Seleccione</option>
                    @foreach($tipoValvula as $tvalvula)
                    <option value="{{$tvalvula->id}}" @if(isset($valvula->id_tipo_valvula) and $tvalvula->id) selected="true" @endif>{{$tvalvula->tipo_valvula}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Accionamiento</label>
                <select class="js-example-basic-single custom-select" name="accionamiento" id="accionamiento">
                    <option value="#" selected>Seleccione</option>
                    @foreach($accionamiento as $accionamientos)
                    <option value="{{$accionamientos->id}}" @if(isset($valvula->accionamiento) and $accionamientos->id) selected="true" @endif>{{$accionamientos->tipo_accionamiento}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            {{ Form::label('fc') }}
            <input type="text" class="form-control required" name="fc" id="fc" @if(isset($valvula->fc)) value="{{ $valvula->fc }}" @endif>
        </div>
    </div>
</div>


</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</div>
</div>

@section('js')
<script type="text/javascript">
    $(document).ready(function(){

            var equipoSelect = $("#tipo_equipo").val()
            if(equipoSelect == 1){
                $("#bomba").show();
                $("#tablero").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(equipoSelect == 2){
                $("#manifold").show();
                $("#bomba").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(equipoSelect == 3){
                $("#motor").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(equipoSelect == 4){
                $("#tablero").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(equipoSelect == 5){
                $("#tuberia").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#valvula").hide();
            }
            if(equipoSelect == 6){
                $("#valvula").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
            }
        })

    function mostrarDisenoEquipo(id){
            if(id == ''){
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(id == 1){
                $("#bomba").show();
                $("#tablero").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(id == 2){
                $("#manifold").show();
                $("#bomba").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(id == 3){
                $("#motor").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(id == 4){
                $("#tablero").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tuberia").hide();
                $("#valvula").hide();
            }
            if(id == 5){
                $("#tuberia").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#valvula").hide();
            }
            if(id == 6){
                $("#valvula").show();
                $("#bomba").hide();
                $("#manifold").hide();
                $("#motor").hide();
                $("#tablero").hide();
                $("#tuberia").hide();
            }
        }

    </script>
    @endsection