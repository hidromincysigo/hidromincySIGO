@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header col-12" style="background-color: #000066;">
                    <h3 class="card-title" style="color: white;">Ver Bomba</h3>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bombas.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
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
                    <tr>
                        <td>{{ $bomba->grupo }}</td>
                        <td>{{ $bomba->nro_etapas }}</td>
                        <td>{{ $bomba->rotacion }}</td>
                        <td>{{ $bomba->caudal }}</td>
                        <td>{{ $bomba->presion }}</td>
                        <td>{{ $bomba->rpm }}</td>
                        <td>{{ $bomba->peso }}</td>
                        <td>{{ $bomba->diametro_succion }}</td>
                        <td>{{ $bomba->diametro_descarga }}</td>
                        <td>{{ $bomba->tipo_sello }}</td>
                        <td>{{ $bomba->operatividad }}</td>
                        @if($bomba->en_uso === true)
                        <td>SI</td>
                        @else
                        <td>NO</td>
                        @endif
                    </tr>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
