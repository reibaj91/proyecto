@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Aplicaciones</h3>
                    <p class="animated fadeInDown">
                        Aplicaciones <span class="fa-angle-right fa"></span> Editar/Borrar
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Aplicaciones</h3></div>
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
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 264px;">Nombre
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 264px;">Icono
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 264px;">URL
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
                                            @foreach($aplicaciones as $a)
                                                <tr role="row" class="odd" id="{{$a->idaplicacion}}">
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$a->nombre}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">
                                                        <div><img src='/images/aplicaciones/{{$a->icono}}'></div></td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$a->URL}}</td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <a href="{{route('aplicaciones.editar',[$a->idaplicacion])}}" class="btn btn-round btn-primary">
                                                                <div>
                                                                    Editar

                                                                </div>
                                                            </a>
                                                            <button onclick="borrar('{{$a->idaplicacion}}','{{$a->nombre}}');" class="btn btn-round btn-danger">
                                                                <div>
                                                                    Eliminar
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
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
        function borrar(id,nombre) {
            swal({
                title: '¿Estás seguro?',
                text: "Vas a borrar a "+nombre,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value) {

                $.ajax({
                    url: '{{route('aplicaciones.delete')}}',
                    method: "post",
                    data: {
                        "id": id,
                        "_token": "{{Session::token()}}"
                    },
                    success: function (data) {
                        if(data!='pa'){
                            $("#"+id).remove();
                            swal(
                                'Borrado!',
                                'Has borrado a '+nombre,
                                'success'
                            )
                        } else {
                            swal(
                                'No se ha podido borrar '+nombre+'!',
                                'Esta aplicación la tiene asignada algún perfil',
                                'warning'
                            )
                        }

                    }
                });
            }
        })
        }
    </script>
@endsection

