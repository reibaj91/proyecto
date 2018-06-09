@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Asignar Perfiles</h3>
                    <p class="animated fadeInDown">
                        Perfiles <span class="fa-angle-right fa"></span> Asignar
                    </p>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;"
                 class="alert  {{ Session::get('alert-class', 'alert-success') }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Asignar Perfiles</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perfil">Perfiles</label>
                                <select onchange="comprobar()" class="form-control" id="perfil" name="perfil">
                                    <option value="{{null}}" disabled selected>Seleccione un Perfil</option>
                                    @foreach($perfiles as $perfil)
                                        <option value="{{$perfil->idPerfil}}">{{$perfil->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usuarios">Usuarios</label>
                                <select onchange="comprobar()" class="form-control" id="usuarios" name="usuarios">
                                    <option value="{{null}}" disabled selected>Seleccione un Usuario</option>
                                    @foreach($profesores as $p)
                                        <option value="{{$p->idUsuario}}">{{$p->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-5">
                        <button id="asignar" class="btn btn-danger" onclick="asignar()" disabled>Asignar</button>
                    </div>
                </div>
            </div>
            <div id="contenedor"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#usuarios').select2();
            $('#perfil').select2();
            cargarListado();
        });

        function cargarListado() {
            contenedor = $('#contenedor');

            contenedor.empty();


            $.ajax({
                url: '{{route('perfiles.lista')}}',
                method: "post",
                data: {
                    "_token": "{{Session::token()}}"
                },
                success: function (data) {
                    contenedor.empty();
                    contenedor.append(data);
                    tabla();
                }
            });
        }


        function tabla() {
            $('#listado').DataTable();
        }

        function  comprobar() {
            perfil = $('#perfil').val();
            usuarios = $('#usuarios').val();
            var boton = document.getElementById('asignar');


            if (perfil!=null && usuarios!=null){
                boton.disabled = false;
            }else{
                boton.disabled = true;
            }
        }

        function asignar() {
            perfil = $('#perfil').val();
            usuarios = $('#usuarios').val();

            $.ajax({
                url: '{{route('perfiles.asignar-usuario')}}',
                method: "post",
                data: {
                    "perfil": perfil,
                    "usuario": usuarios,
                    "_token": "{{Session::token()}}"
                },
                success: function (data) {
                    if(data=='existe') {
                        swal(
                            'ATENCIÓN!!',
                            'Ese usuario ya tiene asignado ese perfil',
                            'warning'
                        )
                    }else{
                        cargarListado();
                    }

                }
            });

        }

        function borrar(idUsuario,idPerfil,id) {

            swal({
                title: '¿Estás seguro?',
                text: "Este usuario dejará de tener este perfil",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url: '{{route('perfiles.borrarPefil')}}',
                    method: "post",
                    data: {
                        "idUsuario": idUsuario,
                        "idPerfil": idPerfil,
                        "_token": "{{Session::token()}}"
                    },
                    success: function(data) {
                        $("#"+id).remove();
                        swal(
                            'Borrado!',
                            'Se ha borrado correctamente',
                            'success'
                        )
                    }
                });
            }
        })
        }

    </script>
@endsection

