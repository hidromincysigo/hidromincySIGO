@extends('layouts.app')

@section('template_title')
    {{ $tuberia->name ?? 'Show Tuberia' }}
@endsection

@section('content')
<section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ver Tuberia</h3>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tuberias.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead class="thead">
                            <tr>
                                {{-- <th>No</th> --}}

                                <th>Diametro</th>
                                <th>Norma</th>
                                <th>Grado</th>
                                <th>Espesor</th>
                                <th>Longitud</th>
                                <th>Sdr</th>
                                <th>Pn</th>
                                <th>Rde</th>
                                <th>Tipo Tuberia</th>
                                <th>Tipo Material</th>
                                <th>Fabricante</th>
                                <th>Manifold</th>
                                <th>Estacion Bombeo</th>
                                <th>Operatividad</th>
                                <th>En Uso</th>
                                {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($tuberias as $tuberia) --}}
                            <tr>
                                {{-- <td>{{ ++$i }}</td> --}}

                                {{-- <td>{{$tuberia->id}}</td> --}}
                                <td>{{$tuberia->diametro}}</td>
                                <td>{{$tuberia->norma}}</td>
                                <td>{{$tuberia->grado}}</td>
                                <td>{{$tuberia->espesor}}</td>
                                <td>{{$tuberia->longitud}}</td>
                                <td>{{$tuberia->sdr}}</td>
                                <td>{{$tuberia->pn}}</td>
                                <td>{{$tuberia->rde}}</td>
                                <td>{{$tuberia->tipo_tuberia}}</td>
                                <td>{{$tuberia->tipo_material}}</td>
                                <td>{{$tuberia->nombre_manifold}}</td>
                                <td>{{$tuberia->tipo_manifold}}</td>
                                <td>{{$tuberia->nombre_infraestructura}}</td>
                                <td>{{$tuberia->operatividad}}</td>
                                @if($tuberia->en_uso === true)
                                <td>SI</td>
                                @else
                                <td>NO</td>
                                @endif
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                        {{-- <div class="form-group">
                            <strong>Diametro:</strong>
                            {{ $tuberia->diametro }}
                        </div>
                        <div class="form-group">
                            <strong>Norma:</strong>
                            {{ $tuberia->norma }}
                        </div>
                        <div class="form-group">
                            <strong>Grado:</strong>
                            {{ $tuberia->grado }}
                        </div>
                        <div class="form-group">
                            <strong>Espesor:</strong>
                            {{ $tuberia->espesor }}
                        </div>
                        <div class="form-group">
                            <strong>Longitud:</strong>
                            {{ $tuberia->longitud }}
                        </div>
                        <div class="form-group">
                            <strong>Sdr:</strong>
                            {{ $tuberia->sdr }}
                        </div>
                        <div class="form-group">
                            <strong>Pn:</strong>
                            {{ $tuberia->pn }}
                        </div>
                        <div class="form-group">
                            <strong>Rde:</strong>
                            {{ $tuberia->rde }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Tuberia:</strong>
                            {{ $tuberia->id_tipo_tuberia }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo Material:</strong>
                            {{ $tuberia->id_tipo_material }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estacion Bombeo:</strong>
                            {{ $tuberia->id_estacion_bombeo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Fabricante:</strong>
                            {{ $tuberia->id_fabricante }}
                        </div>
                        <div class="form-group">
                            <strong>Id Manifold:</strong>
                            {{ $tuberia->id_manifold }}
                        </div>
                        <div class="form-group">
                            <strong>Operatividad:</strong>
                            {{ $tuberia->operatividad }}
                        </div>
                        <div class="form-group">
                            <strong>En Uso:</strong>
                            {{ $tuberia->en_uso }}
                        </div>
 --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
