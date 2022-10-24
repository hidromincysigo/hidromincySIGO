@extends ('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header col-12" style="background-color: #000066;padding-top: 10px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="color:white;">
                                {{ __('Mantenimiento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mantenimiento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover" name="EquipoTable" id="EquipoTable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tipo Equipo</th>
										<th>Nombre Equipo</th>
										<th>Marca</th>
										<th>Modelo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($equipos as $equipo)
                                        <tr>
                                            <td>{{ $equipo->id }}</td>
                                            
											<td>{{ $equipo->tipo_equipo }}</td>
											<td>{{ $equipo->nombre_equipo }}</td>
											<td>{{ $equipo->marca }}</td>
											<td>{{ $equipo->modelo }}</td>

                                            <td>
                                                <form action="{{ route('equipos.destroy',$equipo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('equipos.show',$equipo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('equipos.edit',$equipo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $equipos->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#EquipoTable').DataTable({
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