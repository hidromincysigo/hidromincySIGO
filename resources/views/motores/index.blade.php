@extends ('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                        <span id="card_title">
                            {{ __('Motores') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('motores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Crear Nuevo') }}
                          </a>
                      </div>
                  </div>
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="InfraestructuraTable" name="InfraestructuraTable">
                        <thead class="thead">
                            <tr>
                                <th>No</th>
                                
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
                                {{-- <th>Id Fabricante</th> --}}
                                <th>Supervisor Fase</th>
                                <th>Operatividad</th>
                                <th>En Uso</th>
                                <th>Grupo</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($motores as $motore)
                            <tr>
                                <td>{{ ++$i }}</td>
                                
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

                                <td>
                                    <form action="{{ route('motores.destroy',$motore->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('motores.show',$motore->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('motores.edit',$motore->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $motores->links() !!}
    </div>
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#InfraestructuraTable').DataTable({
            "language": {
                "search":   "Buscar",
                "lengthMenu":   "Mostrar _MENU_ registros por página",
                "info":         "Mostrando página _PAGE_ de _PAGES_",
                "paginate":     {
                                    "previous": "Anterior",
                                    "next":     "Siguiente",
                                    "first":    "Primero",
                                    "last":     "Último"
                }
            }
        });
    });
</script>
@endsection