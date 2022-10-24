@extends('layouts.app')
@section('title', 'Válvula')
@section('template_title')
Valvula
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                        <span id="card_title">
                            {{ __('Valvula') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('valvulas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                                <th>Diametro</th>
                                <th>Presion Nominal</th>
                                <th>Tipo Valvula</th>
                                <th>Accionamiento</th>
                                <th>Fc</th>
                                {{-- <th>Fabricante</th> --}}
                                <th>Estacion Bombeo</th>
                                <th>Operatividad</th>

                                <th>En Uso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($valvulas as $valvula)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$valvula->diametro}}</td>
                                <td>{{$valvula->presion_nominal}}</td>
                                <td>{{$valvula->tipo_valvula}}</td>
                                {{-- <td>{{$valvula->accionamiento}}</td> --}}
                                <td>{{$valvula->tipo_accionamiento}}</td>
                                <td>{{$valvula->fc}}</td>
                                <td>{{$valvula->nombre_infraestructura}}</td>
                                <td>{{$valvula->operatividad}}</td>
                                {{-- <td>{{$valvula->en_uso}}</td> --}}
                                @if($valvula->en_uso === true)
                                <td>SI</td>
                                @else
                                <td>NO</td>
                                @endif
                                {{-- <td>{{$valvula->deleted_at}}</td>
                                <td>{{$valvula->created_at}}</td>
                                <td>{{$valvula->updated_at}}</td> --}}

											{{-- <td>{{ $valvula->diametro }}</td>
											<td>{{ $valvula->presion_nominal }}</td>
											<td>{{ $valvula->tipo_valvula }}</td>
											<td>{{ $valvula->accionamiento }}</td>
											<td>{{ $valvula->fc }}</td>
											<td>{{ $valvula->id_estacion_bombeo }}</td>
											<td>{{ $valvula->id_fabricante }}</td>
											<td>{{ $valvula->operatividad }}</td> --}}

                                            <td>
                                                <form action="{{ route('valvulas.destroy',$valvula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('valvulas.show',$valvula->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('valvulas.edit',$valvula->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                    {!! $valvulas->links() !!}
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