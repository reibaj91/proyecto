<div class="col-md-12 panel-body" style="padding-bottom:30px;">
    <div class="responsive-table">
        <div id="datatables-example_wrapper"
             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="listado"
                           class="table table-striped table-bordered dataTable no-footer "
                           width="100%" cellspacing="0" role="grid"
                           aria-describedby="datatables-example_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc text-center" tabindex="0"
                                aria-controls="datatables-example"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending"
                                style="width: 126px;">Perfil
                            </th>
                            <th class="sorting text-center" tabindex="0"
                                aria-controls="datatables-example"
                                rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending"
                                style="width: 200px;">Usuario
                            </th>
                            <th class="sorting text-center" tabindex="0"
                                aria-controls="datatables-example"
                                rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending"
                                style="width: 132px;">Borrar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <div class="hidden">{{$i=1}}</div>
                        @foreach($profesorPerfil as $p)
                            <tr role="row" class="odd" id="{{$i}}">
                                <td class="sorting_1 text-center"
                                    style="vertical-align: middle">{{$p->perfiles->nombre}}</td>
                                <td class="text-center"
                                    style="vertical-align: middle">{{$p->profesores->nombre}}</td>
                                <td class="text-center" style="vertical-align: middle">
                                    <div>
                                        <button onclick="borrar({{$p->idUsuario}},{{$p->idPerfil}},{{$i}});" class="btn btn-round btn-danger">
                                            <div>
                                                Eliminar
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