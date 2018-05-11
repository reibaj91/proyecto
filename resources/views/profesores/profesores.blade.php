@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Data Tables</h3>
                    <p class="animated fadeInDown">
                        Table <span class="fa-angle-right fa"></span> Data Tables
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Data Tables</h3></div>
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
                                                    style="width: 123px;">Opciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($profesores as $p)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center"
                                                        style="vertical-align: middle">{{$p->nombre}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$p->email}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$p->baja_temporal}}</td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <button class="btn btn-round btn-primary">
                                                                <div>
                                                                    <span style="padding: 0 7px">Editar</span>
                                                                    <span class="ink animate"
                                                                          style="height: 86px; width: 86px; top: -28px; left: 34px;"></span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <div style="margin-top: 7px;">
                                                            <button class="btn btn-round btn-danger">
                                                                <div>
                                                                    <span>Eliminar</span>
                                                                    <span class="ink animate"
                                                                          style="height: 86px; width: 86px; top: -28px; left: 34px;"></span>
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
@endsection

