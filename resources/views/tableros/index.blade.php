@extends('layouts.app')

@section('title', 'Tableros')
@section('template_title')
Tablero
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                        <span id="card_title">
                            {{ __('Tablero') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tableros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                                <th>Ancho</th>
                                <th>Alto</th>
                                <th>Profundidad</th>
                                <th>Aislante</th>
                                <th>Capacidad</th>
                                <th>Estacion Bombeo</th>
                                {{-- <th>Id Fabricante</th> --}}
                                <th>Tipo Tension</th>
                                <th>Operatividad</th>
                                <th>En Uso</th>
                                <th>Grupo</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tableros as $tablero)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $tablero->ancho }}</td>
                                <td>{{ $tablero->alto }}</td>
                                <td>{{ $tablero->profundidad }}</td>
                                <td>{{ $tablero->aislante }}</td>
                                <td>{{ $tablero->capacidad }}</td>
                                <td>{{ $tablero->nombre_infraestructura }}</td>
                                {{-- <td>{{ $tablero->id_fabricante }}</td> --}}
                                <td>{{ $tablero->tipo_tension_tablero }}</td>
                                <td>{{ $tablero->operatividad }}</td>
                                @if($tablero->en_uso === true)
                                <td>SI</td>
                                @else
                                <td>NO</td>
                                @endif
                                <td>{{ $tablero->grupo }}</td>

                                <td>
                                    <form action="{{ route('tableros.destroy',$tablero->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('tableros.show',$tablero->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('tableros.edit',$tablero->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
        {!! $tableros->links() !!}
    </div>
</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
@endsection
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
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