@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')

{{-- {{dd($motore)}} --}}
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ver Motor</h3>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('motores.index') }}">Volver</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Potencia</th>
                                <th>Amperaje</th>
                                <th>Tension</th>
                                <th>Rpm</th>
                                <th>Capacidad Amperio</th>
                                <th>Contactor</th>
                                <th>Rele Termico</th>
                                <th>Temperatura</th>
                                <th>Tipo Interruptor</th>
                                <th>Tipo Arranque</th>
                                <th>Estacion Bombeo</th>
                                <th>Supervisor Fase</th>
                                <th>Operatividad</th>
                                <th>En Uso</th>
                                <th>Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $motore->potencia }}</td>
                                <td>{{ $motore->amperaje }}</td>
                                <td>{{ $motore->tension }}</td>
                                <td>{{ $motore->rpm }}</td>
                                <td>{{ $motore->capacidad_amperio }}</td>
                                <td>{{ $motore->contactor }}</td>
                                <td>{{ $motore->rele_termico }}</td>
                                <td>{{ $motore->temperatura }}</td>
                                <td>{{ $motore->tipo_interruptor }}</td>
                                <td>{{ $motore->tipo_arranque }}</td>
                                <td>{{ $motore->nombre_infraestructura }}</td>
                                {{-- <td>{{ $motore->fabricante }}</td> --}}
                                <td>{{ $motore->supervisor_fase }}</td>
                                <td>{{ $motore->operatividad }}</td>
                                @if($motore->en_uso === true)
                                <td>SI</td>
                                @else
                                <td>NO</td>
                                @endif
                                <td>{{ $motore->grupo }}</td>
                            </tr>
                        </tbody>
                    </table>

                        {{-- <div class="form-group">
                            <strong>Potencia:</strong>
                            {{ $motore->potencia }}
                        </div>
                        <div class="form-group">
                            <strong>Amperaje:</strong>
                            {{ $motore->amperaje }}
                        </div>
                        <div class="form-group">
                            <strong>Tension:</strong>
                            {{ $motore->tension }}
                        </div>
                        <div class="form-group">
                            <strong>Rpm:</strong>
                            {{ $motore->rpm }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad Amperio:</strong>
                            {{ $motore->capacidad_amperio }}
                        </div>
                        <div class="form-group">
                            <strong>Contactor:</strong>
                            {{ $motore->contactor }}
                        </div>
                        <div class="form-group">
                            <strong>Rele Termico:</strong>
                            {{ $motore->rele_termico }}
                        </div>
                        <div class="form-group">
                            <strong>Temperatura:</strong>
                            {{ $motore->temperatura }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Interruptor:</strong>
                            {{ $motore->tipo_interruptor }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Arranque:</strong>
                            {{ $motore->tipo_arranque }}
                        </div>
                        <div class="form-group">
                            <strong>Estacion Bombeo:</strong>
                            {{ $motore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fabricante:</strong>
                            {{ $motore->nombre_fabricante }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $motore->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Serial:</strong>
                            {{ $motore->serial }}
                        </div>
                        <div class="form-group">
                            <strong>Origen:</strong>
                            {{ $motore->origen }}
                        </div>
                        <div class="form-group">
                            <strong>Supervisor Fase:</strong>
                            {{ $motore->supervisor_fase }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $motore->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>En Uso:</strong>
                            {{ $motore->en_uso }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $motore->grupo }}
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
