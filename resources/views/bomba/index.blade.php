@extends ('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                        <span id="card_title">
                            {{ __('Bomba') }}
                        </span>
                        <div class="float-right">
                            {{-- <a href="{{ route('bombas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left"> --}}
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
                                <th>Grupo</th>
                                <th>Nro Etapas</th>
                                <th>Rotacion</th>
                                <th>Caudal</th>
                                <th>Presion</th>
                                <th>Rpm</th>
                                <th>Peso</th>
                                <th>Diametro Succion</th>
                                <th>Diametro Descarga</th>
                                <th>Tipo Sello</th>
                                <th>Operatividad</th>
                                <th>En Uso</th>
                                <th>Estacion Bombeo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($bombas as $bomba)
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
                                <td>{{ $bomba->nombre_infraestructura }}</td>
                                <td>
                                    <form action="{{ route('bombas.destroy',$bomba->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('bombas.show',$bomba->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('bombas.edit',$bomba->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
        {{-- {!! $bombas->links() !!} --}}
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
