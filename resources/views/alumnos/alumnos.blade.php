@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alumnos</h3>
                    <p class="animated fadeInDown">
                        Alumnos <span class="fa-angle-right fa"></span> Editar/Borrar
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Alumnos</h3></div>
                    <div class="panel-body">
                        <div class="responsive-table">
                            <div id="datatables-example_wrapper"
                                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatables-example"
                                               class="table table-striped table-bordered dataTable no-footer"
                                               width="100%" cellspacing="0" role="grid"
                                               aria-describedby="datatables-example_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 162px;">NIA
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 264px;">Nombre
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Fecha de Nacimiento
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Email
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Clase
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Opciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <div class="hidden">{{$i=1}}</div>
                                            @foreach($alumnos as $a)
                                                <tr role="row" class="odd" id="{{$i}}">
                                                    <td class="sorting_1 text-center"
                                                        style="vertical-align: middle">{{$a->nia}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$a->nombreCompleto}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$a->fechaNacimiento}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$a->email}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">
                                                        @if($a->idSeccion==null)
                                                            <span class="hidden">a </span>No tiene clase asignada
                                                        @else
                                                            {{$a->idSeccion}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <a href="{{route('alumnos.editar',[$a->nia])}}" class="btn btn-round btn-primary">
                                                                <div>
                                                                    <span style="padding: 0 7px">Editar</span>

                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div style="margin-top: 7px;">
                                                            <button onclick="borrar('{{$a->nia}}','{{$a->nombreCompleto}}',{{$i}});" class="btn btn-round btn-danger">
                                                                <div>
                                                                    <span>Eliminar</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="hidden">{{$i++}}</div>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        function borrar(id,nombre,i) {
            swal({
                title: '¿Estás seguro?',
                text: "Vas a borrar a "+nombre,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value) {

                $.ajax({
                    url: '{{route('alumnos.delete')}}',
                    method: "post",
                    data: {
                        "id": id,
                        "_token": "{{Session::token()}}"
                    },
                    success: function (data) {
                        $("#"+i).remove();
                        swal(
                            'Borrado!',
                            'Has borrado a '+nombre,
                            'success'
                        )
                    }
                });
            }
        })
        }
    </script>
@endsection

