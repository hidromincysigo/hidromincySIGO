@extends('layouts.app')
@section('title', 'Tuberías')
@section('template_title')
Tuberia
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="background-color: #000066;">
                    <div style="display: flex; justify-content: space-between; align-items: center; color: white;">

                        <span id="card_title">
                            {{ __('Tuberia') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tuberias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tuberias as $tuberia)
                            <tr>
                                <td>{{ ++$i }}</td>

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
                                {{-- <td>{{$tuberia->en_uso}}</td> --}}
                                {{-- <td>{{$tuberia->deleted_at}}</td>
                                <td>{{$tuberia->created_at}}</td>
                                <td>{{$tuberia->updated_at}}</td> --}}

                                {{-- <td>{{ $tuberia->diametro }}</td>
                                <td>{{ $tuberia->norma }}</td>
                                <td>{{ $tuberia->grado }}</td>
                                <td>{{ $tuberia->espesor }}</td>
                                <td>{{ $tuberia->longitud }}</td>
                                <td>{{ $tuberia->sdr }}</td>
                                <td>{{ $tuberia->pn }}</td>
                                <td>{{ $tuberia->rde }}</td>
                                <td>{{ $tuberia->id_tipo_tuberia }}</td>
                                <td>{{ $tuberia->id_tipo_material }}</td>
                                <td>{{ $tuberia->id_estacion_bombeo }}</td>
                                <td>{{ $tuberia->id_fabricante }}</td>
                                <td>{{ $tuberia->id_manifold }}</td>
                                <td>{{ $tuberia->operatividad }}</td>
                                <td>{{ $tuberia->en_uso }}</td> --}}

                                <td>
                                    <form action="{{ route('tuberias.destroy',$tuberia->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('tuberias.show',$tuberia->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('tuberias.edit',$tuberia->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $tuberias->links() !!}
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