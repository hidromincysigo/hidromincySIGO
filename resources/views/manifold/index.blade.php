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
                                {{ __('Manifold') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('manifold.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Tipo Manifold</th>
										<th>Cantidad Bridas</th>
										<th>Cantidad Monometro</th>
										<th>Cantidad Valvulas</th>
										<th>Cantidad Tuberias</th>
										<th>Operatividad</th>
										<th>Estacion Bombeo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manifolds as $manifold)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $manifold->nombre_manifold }}</td>
											<td>{{ $manifold->tipo_manifold }}</td>
											<td>{{ $manifold->cant_bridas }}</td>
											<td>{{ $manifold->cant_monometro }}</td>
											<td>{{ $manifold->cant_valvulas }}</td>
											<td>{{ $manifold->cant_tuberias }}</td>
											<td>{{ $manifold->operatividad }}</td>
											<td>{{ $manifold->nombre_infraestructura }}</td>

                                            <td>
                                                <form action="{{ route('manifold.destroy',$manifold->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('manifold.show',$manifold->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('manifold.edit',$manifold->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $manifolds->links() !!}
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