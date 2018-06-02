@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Secciones</h3>
                    <p class="animated fadeInDown">
                        Secciones <span class="fa-angle-right fa"></span> Editar/Borrar
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
                    <div class="panel-heading"><h3>Secciones</h3></div>
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
                                                    style="width: 126px;">Cod. Sec. de Rayuela
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 200px;">Nombre
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 132px;">Código del Colegio
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Tutor
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 123px;">Curso
                                                </th>
                                                <th class="sorting text-center" tabindex="0"
                                                    aria-controls="datatables-example"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 150px;">Opciones
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <div class="hidden">{{$i=1}}</div>
                                            @foreach($secciones as $s)
                                                <tr role="row" class="odd" id="{{$i}}" >
                                                    <td class="sorting_1 text-center"
                                                        style="vertical-align: middle">{{$s->idSeccion}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">{{$s->nombre}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">
                                                        @if($s->idSeccionColegio==null)
                                                            <span class="hidden">a </span>Sin código
                                                        @else
                                                            {{$s->idSeccionColegio}}
                                                        @endif

                                                    </td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">
                                                        @if($s->tutor==null)
                                                            <span class="hidden">a </span>Sin asignar
                                                        @else
                                                            {{$s->Tutor->nombre}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">
                                                        @if($s->idCurso==null)
                                                            <span class="hidden">a </span>Sin asignar
                                                        @else
                                                            {{$s->Curso->nombre}}
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        <div>
                                                            <a href="{{route('secciones.editar',[$s->idSeccion])}}" class="btn btn-round btn-primary">
                                                                <div>
                                                                    Editar

                                                                </div>
                                                            </a>
                                                            <button onclick="borrar('{{$s->idSeccion}}','{{$s->nombre}}',{{$i}});" class="btn btn-round btn-danger">
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
                    url: '{{route('secciones.delete')}}',
                    method: "post",
                    data: {
                        "id": id,
                        "_token": "{{Session::token()}}"
                    },
                    success: function(data) {
                        if(data!='al'){
                            $("#"+i).remove();
                            swal(
                                'Borrado!',
                                'Has borrado '+nombre,
                                'success'
                            )
                        }else {
                            swal(
                                'No se ha podido borrar '+nombre+'!',
                                'Esta sección esta asignada a algún alumno',
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

