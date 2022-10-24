@extends('layouts.app')

@section('template_title')
{{ $tablero->name ?? 'Show Tablero' }}
@endsection

@section('content')
<section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ver Tablero</h3>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tableros.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ancho</th>
                                <th>Alto</th>
                                <th>Profundidad</th>
                                <th>Aislante</th>
                                <th>Capacidad</th>
                                <th>Operatividad</th>
                                <th>En Uso</th>
                                <th>Grupo</th>
                                <th>Tipo de Tension</th>
                                <th>Estacion de Bombeo</th>
                                {{-- <th></th>
                                <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$tablero->ancho}}</td>
                                <td>{{$tablero->alto}}</td>
                                <td>{{$tablero->profundidad}}</td>
                                <td>{{$tablero->aislante}}</td>
                                <td>{{$tablero->capacidad}}</td>
                                <td>{{$tablero->operatividad}}</td>
                                @if($tablero->en_uso === true)
                                <td>SI</td>
                                @else
                                <td>NO</td>
                                @endif
{{--                                 <td>{{$tablero->en_uso}}</td> --}}
                                <td>{{$tablero->grupo}}</td>
                                <td>{{$tablero->tipo_tension_tablero}}</td>
                                <td>{{$tablero->nombre_infraestructura}}</td>
                                {{-- <td>{{$tablero->nombre_fabricante}}</td>
                                <td>{{$tablero->modelo}}</td>
                                <td>{{$tablero->serial}}</td>
                                <td>{{$tablero->origen}}</td> --}}
                            </tr>
                        </tbody>
                    </table>

                   {{--  <div class="form-group">
                        <strong>Ancho:</strong>
                        {{ $tablero->ancho }}
                    </div>
                    <div class="form-group">
                        <strong>Alto:</strong>
                        {{ $tablero->alto }}
                    </div>
                    <div class="form-group">
                        <strong>Profundidad:</strong>
                        {{ $tablero->profundidad }}
                    </div>
                    <div class="form-group">
                        <strong>Aislante:</strong>
                        {{ $tablero->aislante }}
                    </div>
                    <div class="form-group">
                        <strong>Capacidad:</strong>
                        {{ $tablero->capacidad }}
                    </div>
                    <div class="form-group">
                        <strong>Id Estacion Bombeo:</strong>
                        {{ $tablero->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Fabricante:</strong>
                        {{ $tablero->nombre_fabricante }}
                    </div>
                    <div class="form-group">
                        <strong>Modelo:</strong>
                        {{ $tablero->modelo }}
                    </div>
                    <div class="form-group">
                        <strong>Serial:</strong>
                        {{ $tablero->serial }}
                    </div>
                    <div class="form-group">
                        <strong>Origen:</strong>
                        {{ $tablero->origen }}
                    </div>
                    <div class="form-group">
                        <strong>Tipo Tension:</strong>
                        {{ $tablero->tipo_tension_tablero }}
                    </div>
                    <div class="form-group">
                        <strong>Operatividad:</strong>
                        {{ $tablero->operatividad }}
                    </div>
                    <div class="form-group">
                        <strong>En Uso:</strong>
                        {{ $tablero->en_uso }}
                    </div>
                    <div class="form-group">
                        <strong>Grupo:</strong>
                        {{ $tablero->grupo }}
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
