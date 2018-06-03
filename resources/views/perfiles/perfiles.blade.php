@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Perfiles</h3>
                    <p class="animated fadeInDown">
                        Perfiles <span class="fa-angle-right fa"></span> Editar/Borrar
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 style="display:inline-block;">
                            Perfiles
                        </h3>
                        <a href="{{route('perfiles.nuevo')}}" style="display:inline; margin-left: 10px;">
                            <button class=" btn btn-circle btn-mn btn-success" value="primary">
                                <span class="fa fa-plus" title="Nuevo Perfil"></span>
                            </button>
                        </a>
                    </div>
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
                                                    style="width: 264px;">Número Identificación del Perfil
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
                                                    style="width: 123px;">Opciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($perfiles as $p)
                                                <tr role="row" class="odd" id="{{$p->idPerfil}}">
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$p->idPerfil}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$p->nombre}}</td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <a href="{{route('perfiles.editar',[$p->idPerfil])}}"
                                                               class="btn btn-round btn-primary">
                                                                <div>
                                                                    Editar

                                                                </div>
                                                            </a>

                                                            <button onclick="borrar({{$p->idPerfil}},'{{$p->nombre}}');"
                                                                    class="btn btn-round btn-danger">
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
        function borrar(id, nombre) {
            if(id==1 || id==2 || id==3 || id==4 || id==5 || id==6){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Este perfil no se puede borrar!',
                })
                return;
            }
            swal({
                title: '¿Estás seguro?',
                text: "Vas a borrar a " + nombre,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if(result.value) {

                $.ajax({
                    url: '{{route('perfiles.delete')}}',
                    method: "post",
                    data: {
                        "id": id,
                        "_token": "{{Session::token()}}"
                    },
                    success: function (data) {
                        if(data!='pp' && data!='pa' && data!='ppa'){
                            $("#" + id).remove();
                            swal(
                                'Borrado!',
                                'Has borrado a ' + nombre,
                                'success'
                            )
                        } else {
                            switch (data){
                                case 'ppa':
                                    texto="Este perfil lo tiene asignado algún profesor y alguna aplicación"
                                    break;
                                case 'pp':
                                    texto="Este perfil lo tiene asignado algún profesor";
                                    break;
                                case 'pa':
                                    texto="Este perfil lo tiene asignado alguna aplicación"
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

