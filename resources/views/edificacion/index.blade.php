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
                            {{ __('Edificación') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('infraestructura.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Crear Edificación') }}
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

                                <th>Nombre</th>
                                <th>Ubicación</th>
                                <th>Coordenadas</th>
                                <th>Proceso</th>
                                <th>Tipo de Proceso</th>
                                <th>Acueducto</th>
                                {{-- <th>Fabricante</th> --}}
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        {{-- {{dd($infraestructuras)}} --}}
                        <tbody>
                            @foreach ($infraestructuras as $infraestructura)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $infraestructura->nombre_infraestructura }}</td>
                                <td>{{ $infraestructura->estado }} - {{ $infraestructura->municipio }} - {{ $infraestructura->parroquia }} - {{ $infraestructura->sector }}</td>
                                <td>A {{ $infraestructura->coordenadas_utm_a }} - B {{ $infraestructura->coordenadas_utm_b }} </td>

                                <td>{{ $infraestructura->descripcion_proceso }}</td>
                                <td>{{ $infraestructura->sistemas }}</td>
                                <td>{{ $infraestructura->nombre_acueducto }}</td>

                                <td>
                                    <form action="{{ route('infraestructura.destroy',$infraestructura->id) }}" method="POST">
                                        {{-- <a class="btn btn-sm btn-primary " href="{{ route('infraestructura.show',$infraestructura->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a> --}}
                                        <a class="btn btn-sm btn-success" href="{{ route('infraestructura.edit',$infraestructura->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
        {!! $infraestructuras->links() !!}
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


