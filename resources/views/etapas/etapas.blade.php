@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Etapas</h3>
                    <p class="animated fadeInDown">
                        Etapas <span class="fa-angle-right fa"></span> Editar/Borrar
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Etapas</h3></div>
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
                                                    style="width: 162px;">Nombre
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 264px;">Coordinador
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Etapa a la que pertenece
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
                                            @foreach($etapas as $e)
                                                <tr role="row" class="odd" id="{{$e->codEtapa}}">
                                                    <td class="sorting_1 text-center"
                                                        style="vertical-align: middle">{{$e->nombre}}</td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        @if($e->coordinador==null)
                                                            No tiene coordinador
                                                        @else
                                                            {{$e->nombreCoordinador->nombre}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        @if($e->etapapp==null)
                                                            No pertenece a ninguna etapa
                                                        @else
                                                            {{$e->etapaPrincipal->nombre}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <a href="{{route('etapas.editar',[$e->codEtapa])}}" class="btn btn-round btn-primary">
                                                                <div>
                                                                    <span style="padding: 0 7px">Editar</span>

                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div style="margin-top: 7px;">
                                                            <button onclick="borrar({{$e->codEtapa}},'{{$e->nombre}}');" class="btn btn-round btn-danger">
                                                                <div>
                                                                    <span>Eliminar</span>
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
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value) {

                $.ajax({
                    url: '{{route('etapas.delete')}}',
                    method: "post",
                    data: {
                        "codEtapa": id,
                        "_token": "{{Session::token()}}"
                    },
                    success: function (data) {
                        $("#"+id).remove();
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

