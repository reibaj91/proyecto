@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Profesores</h3>
                    <p class="animated fadeInDown">
                        Profesores <span class="fa-angle-right fa"></span> Editar/Borrar
                    </p>
                </div>
            </div>
        </div>
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;"
                 class="alert  {{ Session::get('alert-class', 'alert-success') }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Profesores (usuarios)</h3></div>
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
                                                    style="width: 264px;">email
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Baja
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Acciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($profesores as $p)
                                                <tr role="row" class="odd" id="{{$p->idUsuario}}">
                                                    <td class="sorting_1 text-center"
                                                        style="vertical-align: middle">{{$p->nombre}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$p->email}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">
                                                        @if($p->baja_temporal=='N')
                                                            No
                                                        @else
                                                            Si
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <a href="{{route('profesores.editar',[$p->idUsuario])}}" class="btn btn-round btn-primary">
                                                                <div>
                                                                    Editar

                                                                </div>
                                                            </a>
                                                            <button onclick="borrar({{$p->idUsuario}},'{{$p->nombre}}');" class="btn btn-round btn-danger">
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
                    url: '{{route('profesores.delete')}}',
                    method: "post",
                    data: {
                        "id": id,
                        "_token": "{{Session::token()}}"
                    },
                    success: function (data) {
                        if(data!='sep' && data!='sp' && data!='pe' && data!='se' && data!='s' &&
                            data!='p' && data!='e'){
                            $("#"+id).remove();
                            swal(
                                'Borrado!',
                                'Has borrado a '+nombre,
                                'success'
                            )
                        }else {
                            switch (data) {
                                case 'sep':
                                    texto="Este profesor lo tiene asignado alguna sección, etapa y perfil";
                                    break;
                                case 'sp':
                                    texto="Este profesor lo tiene asignado alguna sección y algún perfil";
                                    break;
                                case 'pe':
                                    texto="Este profesor lo tiene asignado algún perfil y alguna etapa";
                                    break;
                                case 'se':
                                    texto="Este profesor lo tiene asignado alguna sección y etapa";
                                    break;
                                case 's':
                                    texto="Este profesor lo tiene asignado alguna sección";
                                    break;
                                case 'p':
                                    texto="Este profesor lo tiene asignado perfil";
                                    break;
                                case 'e':
                                    texto="Este profesor tiene asignado alguna etapa";
                                    break;
                            }
                            swal(
                                'No se ha podido borrar '+nombre+'!',
                                texto,
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
