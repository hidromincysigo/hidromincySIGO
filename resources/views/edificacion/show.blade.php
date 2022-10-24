@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header col-12" style="background-color: #000066;margin-top: 20px;">
                    <h3 class="card-title" style="color: white;">Diseño Edificación</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>Proceso:</th>
                            <th>Tipo de Proceso:</th>
                            <th>Acueducto Responsable:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $infraestructura->nombre_infraestructura }}</td>
                            <td>{{ $tipoin->descripcion_proceso }}</td>
                            <td>{{ $sistemas->sistemas }}</td>
                            <td>{{ $acueducto->nombre_acueducto }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ubicación Geográfica</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Estado:</th>
                            <th>Municipio:</th>
                            <th>Parroquia:</th>
                            <th>Sector:</th>
                            <th>UTM-A:</th>
                            <th>UTM-B:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $estados->estado }}</td>
                        <td>{{ $municipios->municipio }}</td>
                        <td>{{ $parroquias->parroquia }}</td>
                        <td>{{ $sectores->sector }}</td>
                        <td>{{ $ubicacionGeografica->coordenadas_utm_a }}</td>
                        <td>{{ $ubicacionGeografica->coordenadas_utm_b }}</td>
                    </tbody>
                </table>
                {{-- <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Datos Fabricante</h3>
                </div> --}}
                {{-- <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fabricante:</th>
                            <th>Modelo:</th>
                            <th>Serial:</th>
                            <th>Origen:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fabricante->nombre_fabricante }}</td>
                            <td>{{ $fabricante->modelo }}</td>
                            <td>{{ $fabricante->serial }}</td>
                            <td>{{ $fabricante->origen }}</td>
                        </tr>
                    </tbody>
                </table> --}}
                @if($infraestructura->id_sistema === 9)
                @if(isset($bomba))
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Bombas</h3>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Grupo Asignado:</th>
                        <th>Nº de Etapas:</th>
                        <th>Rotacion:</th>
                        <th>Caudal:</th>
                        <th>Presion:</th>
                        <th>RPM:</th>
                        <th>Peso:</th>
                        <th>Diametro de Succion:</th>
                        <th>Diametro de Descarga:</th>
                        <th>Tipo Sello:</th>
                        <th>Operatividad:</th>
                        <th>En Uso:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bomba as $bombas)
                    <tr>
                        <td>{{ $bombas->grupo }}</td>
                        <td>{{ $bombas->nro_etapas }}</td>
                        <td>{{ $bombas->rotacion }}</td>
                        <td>{{ $bombas->caudal }}</td>
                        <td>{{ $bombas->presion }}</td>
                        <td>{{ $bombas->rpm }}</td>
                        <td>{{ $bombas->peso }}</td>
                        <td>{{ $bombas->diametro_succion }}</td>
                        <td>{{ $bombas->diametro_descarga }}</td>
                        <td>{{ $bombas->tipo_sello }}</td>
                        <td>{{ $bombas->operatividad }}</td>
                        <td>{{ $bombas->en_uso }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if(isset($manifold))
            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Manifold</h3>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Manifold:</th>
                        <th>Cantidad de Bridas:</th>
                        <th>Cantidad Monometro:</th>
                        <th>Cantidad Válvulas:</th>
                        <th>Cantidad Tuberías:</th>
                        <th>Operatividad:</th>
                        <th>Tipo de Manifold:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manifold as $manifolds)
                    <tr>
                      <td>{{ $manifolds->nombre_manifold }}</td>
                      <td>{{ $manifolds->cant_bridas }}</td>
                      <td>{{ $manifolds->cant_monometro }}</td>
                      <td>{{ $manifolds->cant_valvulas }}</td>
                      <td>{{ $manifolds->cant_tuberias }}</td>
                      <td>{{ $manifolds->operatividad }}</td>
                      <td>{{ $manifolds->tipo_manifold }}</td>
                  </tr>  
                  @endforeach
              </tbody>
          </table>
          @endif
          @if(isset($motores))
          <div class="card-header col-12" style="background-color: #000066;">
            <h3 class="card-title" style="color: white;">Motores</h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Potencia:</th>
                    <th>Amperaje:</th>
                    <th>Tension:</th>
                    <th>RPM:</th>
                    <th>Capacidad Amperios:</th>
                    <th>Contactor:</th>
                    <th>Rele Termico:</th>
                    <th>Temperatura:</th>
                    <th>Tipo Interruptor:</th>
                    <th>Tipo Arranque:</th>
                    <th>Supervisor de Fase:</th>
                    <th>Operatividad:</th>
                    <th>En Uso:</th>
                    <th>Grupo:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motores as $motor)
                <tr>
                    <td>{{ $motor->potencia }}</td>
                    <td>{{ $motor->amperaje }}</td>
                    <td>{{ $motor->tension }}</td>
                    <td>{{ $motor->rpm }}</td>
                    <td>{{ $motor->capacidad_amperio }}</td>
                    <td>{{ $motor->contactor }}</td>
                    <td>{{ $motor->rele_termico }}</td>
                    <td>{{ $motor->temperatura }}</td>
                    <td>{{ $motor->tipo_interruptor }}</td>
                    <td>{{ $motor->tipo_arranque }}</td>
                    <td>{{ $motor->supervisor_fase }}</td>
                    <td>{{ $motor->operatividad }}</td>
                    <td>{{ $motor->en_uso }}</td>
                    <td>{{ $motor->grupo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        @if(isset($tablero))
        <div class="card-header col-12" style="background-color: #000066;">
            <h3 class="card-title" style="color: white;">Tableros</h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ancho:</th>
                    <th>Alto:</th>
                    <th>Profundida:</th>
                    <th>Aislante:</th>
                    <th>Capacidad:</th>
                    <th>Tension Tablero:</th>
                    <th>En Uso:</th>
                    <th>Grupo:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tablero as $tableros)
                <tr>
                    <td>{{ $tableros->ancho }}</td>
                    <td>{{ $tableros->alto }}</td>
                    <td>{{ $tableros->profundidad }}</td>
                    <td>{{ $tableros->aislante }}</td>
                    <td>{{ $tableros->capacidad }}</td>
                    <td>{{ $tableros->tipo_tension_tablero }}</td>
                    <td>{{ $tableros->en_uso }}</td>
                    <td>{{ $tableros->grupo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @if(isset($tuberia))
        <div class="card-header col-12" style="background-color: #000066;">
            <h3 class="card-title" style="color: white;">Tuberías</h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Diametro:</th>
                    <th>Norma:</th>
                    <th>Grado:</th>
                    <th>Espesor:</th>
                    <th>Longitud:</th>
                    <th>Sdr:</th>
                    <th>Pn:</th>
                    <th>Rde:</th>
                    <th>Tipo Tuberia:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tuberia as $tuberias)
                <tr>
                    <td>{{ $tuberias->diametro }}</td>
                    <td>{{ $tuberias->norma }}</td>
                    <td>{{ $tuberias->grado }}</td>
                    <td>{{ $tuberias->espesor }}</td>
                    <td>{{ $tuberias->longitud }}</td>
                    <td>{{ $tuberias->sdr }}</td>
                    <td>{{ $tuberias->pn }}</td>
                    <td>{{ $tuberias->rde }}</td>
                    <td>{{ $tuberias->tipo_tuberia }}</td>
                    <td>{{ $tuberias->tipo_material }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @if(isset($valvula))
        <div class="card-header col-12" style="background-color: #000066;">
            <h3 class="card-title" style="color: white;">Valvula</h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Diametro:</th>
                    <th>Presion Nominal:</th>
                    <th>Tipo Valvula:</th>
                    <th>Accionamiento:</th>
                    <th>Fc:</th>
                    <th>Operatividad:</th>
                    <th>En Uso:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($valvula as $i => $valvulas)
                <tr>
                    <td>{{ $valvulas->diametro }}</td>
                    <td>{{ $valvulas->presion_nominal }}</td>
                    <td>{{ $valvulas->tipo_valvula }}</td>
                    <td>{{ $valvulas->accionamiento }}</td>
                    <td>{{ $valvulas->fc }}</td>
                    <td>{{ $valvulas->operatividad }}</td>
                    <td>{{ $valvulas->en_uso }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @endif

{{-- 
        <div class="card-body">
            <div class="col-6">

                <div class="col-6">
                    <strong>Nombre:</strong>
                    {{ $infraestructura->nombre_infraestructura }}
                </div>

                <div class="col-6">
                    <strong>Proceso:</strong>
                    {{ $tipoin->descripcion_proceso }}
                </div>

                <div class="col-6">
                    <strong>Tipo de Proceso:</strong>
                    yo lo habia ponido aqui :(
                    
                </div>

                <div class="col-6">
                    <strong>Acueducto Responsable:</strong>
                    {{ $acueducto->nombre_acueducto }}
                </div>

                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ubicación Geográfica</h3>
                </div>
            </div>
            <div class="form-group">
                <strong>Estado:</strong>
                {{ $estados->estado }}
            </div>
            <div class="form-group">
                <strong>Municipio:</strong>
                {{ $municipios->municipio }}
            </div>
            <div class="form-group">
                <strong>Parroquia:</strong>
                {{ $parroquias->parroquia }}
            </div>
            <div class="form-group">
                <strong>Sector:</strong>
                {{ $sectores->sector }}
            </div>
            <div class="form-group">
                <strong>UTM-A:</strong>
                {{ $ubicacionGeografica->coordenadas_utm_a }}
            </div>
            <div class="form-group">
                <strong>UTM-B:</strong>
                {{ $ubicacionGeografica->coordenadas_utm_b }}
            </div>

            <div class="card-header col-12" style="background-color: #000066;">
                <h3 class="card-title" style="color: white;">Datos Fabricante</h3>
            </div>
        </div>
        <div class="form-group">
            <strong>Fabricante:</strong>
            {{ $fabricante->nombre_fabricante }}
        </div>
        <div class="form-group">
            <strong>Modelo:</strong>
            {{ $fabricante->modelo }}
        </div>
        <div class="form-group">
            <strong>Serial:</strong>
            {{ $fabricante->serial }}
        </div>
        <div class="form-group">
            <strong>Origen:</strong>
            {{ $fabricante->origen }}
        </div>
        @if($infraestructura->id_sistema === 9)
        <div class="card-header col-12" style="background-color: #000066;">
            <h3 class="card-title" style="color: white;">Bombas</h3>
        </div>
    </div>
    @if(isset($bomba))
    @foreach($bomba as $bombas)
    <div class="form-group">
        <strong>Grupo Asignado:</strong>
        {{ $bombas->grupo }}
    </div>
    <div class="form-group">
        <strong>Nº de Etapas:</strong>
        {{ $bombas->nro_etapas }}
    </div>
    <div class="form-group">
        <strong>Rotacion:</strong>
        {{ $bombas->rotacion }}
    </div>
    <div class="form-group">
        <strong>Caudal:</strong>
        {{ $bombas->caudal }}
    </div>
    <div class="form-group">
        <strong>Presion:</strong>
        {{ $bombas->presion }}
    </div>
    <div class="form-group">
        <strong>RPM:</strong>
        {{ $bombas->rpm }}
    </div>
    <div class="form-group">
        <strong>Peso:</strong>
        {{ $bombas->peso }}
    </div>
    <div class="form-group">
        <strong>Diametro de Succion:</strong>
        {{ $bombas->diametro_succion }}
    </div>
    <div class="form-group">
        <strong>Diametro de Descarga:</strong>
        {{ $bombas->diametro_descarga }}
    </div>
    <div class="form-group">
        <strong>Tipo Sello:</strong>
        {{ $bombas->tipo_sello }}
    </div>
    <div class="form-group">
        <strong>Operatividad:</strong>
        {{ $bombas->operatividad }}
    </div>
    <div class="form-group">
        <strong>En Uso:</strong>
        {{ $bombas->en_uso }}
    </div>
    @endforeach
    @endif
    @if(isset($manifold))
    <div class="card-header col-12" style="background-color: #000066;">
        <h3 class="card-title" style="color: white;">Manifold</h3>
    </div>
</div>
@foreach($manifold as $manifolds)
<div class="form-group">
    <strong>Nombre Manifold:</strong>
    {{ $manifolds->nombre_manifold }}
</div>
<div class="form-group">
    <strong>Cantidad de Bridas:</strong>
    {{ $manifolds->cant_bridas }}
</div>
<div class="form-group">
    <strong>Cantidad Monometro:</strong>
    {{ $manifolds->cant_monometro }}
</div>
<div class="form-group">
    <strong>Cantidad Válvulas:</strong>
    {{ $manifolds->cant_valvulas }}
</div>
<div class="form-group">
    <strong>Cantidad Tuberías:</strong>
    {{ $manifolds->cant_tuberias }}
</div>
<div class="form-group">
    <strong>Operatividad:</strong>
    {{ $manifolds->operatividad }}
</div>
<div class="form-group">
    <strong>Tipo de Manifold:</strong>
    {{ $manifolds->tipo_manifold }}
</div>
@endforeach
@endif
@if(isset($motores))
<div class="card-header col-12" style="background-color: #000066;">
    <h3 class="card-title" style="color: white;">Motores</h3>
</div>
</div>
@foreach($motores as $motor)
<div class="form-group">
    <strong>Potencia:</strong>
    {{ $motor->potencia }}
</div>
<div class="form-group">
    <strong>Amperaje:</strong>
    {{ $motor->amperaje }}
</div>
<div class="form-group">
    <strong>Tension:</strong>
    {{ $motor->tension }}
</div>
<div class="form-group">
    <strong>RPM:</strong>
    {{ $motor->rpm }}
</div>
<div class="form-group">
    <strong>Capacidad Amperios:</strong>
    {{ $motor->capacidad_amperio }}
</div>
<div class="form-group">
    <strong>Contactor:</strong>
    {{ $motor->contactor }}
</div>
<div class="form-group">
    <strong>Rele Termico:</strong>
    {{ $motor->rele_termico }}
</div>
<div class="form-group">
    <strong>Temperatura:</strong>
    {{ $motor->temperatura }}
</div>
<div class="form-group">
    <strong>Tipo Interruptor:</strong>
    {{ $motor->tipo_interruptor }}
</div>
<div class="form-group">
    <strong>Tipo Arranque:</strong>
    {{ $motor->tipo_arranque }}
</div>
<div class="form-group">
    <strong>Supervisor de Fase:</strong>
    {{ $motor->supervisor_fase }}
</div>
<div class="form-group">
    <strong>Operatividad:</strong>
    {{ $motor->operatividad }}
</div>
<div class="form-group">
    <strong>En Uso:</strong>
    {{ $motor->en_uso }}
</div>
<div class="form-group">
    <strong>Grupo:</strong>
    {{ $motor->grupo }}
</div>

@endforeach
@endif
@if(isset($tablero))
<div class="card-header col-12" style="background-color: #000066;">
    <h3 class="card-title" style="color: white;">Tableros</h3>
</div>
</div>
@foreach($tablero as $tableros)
<div class="form-group">
    <strong>Ancho:</strong>
    {{ $tableros->ancho }}
</div>
<div class="form-group">
    <strong>Alto:</strong>
    {{ $tableros->alto }}
</div>
<div class="form-group">
    <strong>Profundida:</strong>
    {{ $tableros->profundidad }}
</div>
<div class="form-group">
    <strong>Aislante:</strong>
    {{ $tableros->aislante }}
</div>
<div class="form-group">
    <strong>Capacidad:</strong>
    {{ $tableros->capacidad }}
</div>
<div class="form-group">
    <strong>Tension Tablero:</strong>
    {{ $tableros->tipo_tension_tablero }}
</div>
<div class="form-group">
    <strong>En Uso:</strong>
    {{ $tableros->en_uso }}
</div>
<div class="form-group">
    <strong>Grupo:</strong>
    {{ $tableros->grupo }}
</div>
@endforeach
@endif
@if(isset($tuberia))
<div class="card-header col-12" style="background-color: #000066;">
    <h3 class="card-title" style="color: white;">Tuberías</h3>
</div>
</div>
@foreach($tuberia as $tuberias)
<div class="form-group">
    <strong>Diametro:</strong>
    {{ $tuberias->diametro }}
</div>
<div class="form-group">
    <strong>Norma:</strong>
    {{ $tuberias->norma }}
</div>
<div class="form-group">
    <strong>Grado:</strong>
    {{ $tuberias->grado }}
</div>
<div class="form-group">
    <strong>Espesor:</strong>
    {{ $tuberias->espesor }}
</div>
<div class="form-group">
    <strong>Longitud:</strong>
    {{ $tuberias->longitud }}
</div>
<div class="form-group">
    <strong>Sdr:</strong>
    {{ $tuberias->sdr }}
</div>
<div class="form-group">
    <strong>Pn:</strong>
    {{ $tuberias->pn }}
</div>
<div class="form-group">
    <strong>Rde:</strong>
    {{ $tuberias->rde }}
</div>
<div class="form-group">
    <strong>Tipo Tuberia:</strong>
    {{ $tuberias->tipo_tuberia }}
</div>
<div class="form-group">
    <strong>Tipo Material:</strong>
    {{ $tuberias->tipo_material }}
</div>
@endforeach
@endif
@if(isset($valvula))
<div class="card-header col-12" style="background-color: #000066;">
    <h3 class="card-title" style="color: white;">Valvula</h3>
</div>
</div>
@foreach($valvula as $i => $valvulas)
<div class="col-1" style="background-color: #000066;">
    <strong style="color: white;">Valvula Nº</strong>
    {{ $i++ }}
</div>
<div class="form-group">
    <strong>Diametro:</strong>
    {{ $valvulas->diametro }}
</div>
<div class="form-group">
    <strong>Presion Nominal:</strong>
    {{ $valvulas->presion_nominal }}
</div>
<div class="form-group">
    <strong>Tipo Valvula:</strong>
    {{ $valvulas->tipo_valvula }}
</div>
<div class="form-group">
    <strong>Accionamiento:</strong>
    {{ $valvulas->accionamiento }}
</div>
<div class="form-group">
    <strong>Fc:</strong>
    {{ $valvulas->fc }}
</div>
<div class="form-group">
    <strong>Operatividad:</strong>
    {{ $valvulas->operatividad }}
</div>
<div class="form-group">
    <strong>En Uso:</strong>
    {{ $valvulas->en_uso }}
</div>
@endforeach
@endif
@endif --}}
<div class="float-right">
    <a class="btn btn-primary" href="{{ route('infraestructura.index') }}"> Volver</a>
</div>
</div>
</div>
</section>
@endsection
