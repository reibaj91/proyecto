@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Aplicaciones</h3>
                    <p class="animated fadeInDown">
                        Aplicaciones <span class="fa-angle-right fa"></span> Alta
                    </p>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            <div style="width: 250px; margin: 1em auto;" class="alert  {{ Session::get('alert-class', 'alert-success') }}"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Añadir Aplicación</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('aplicaciones.store')}}" novalidate="novalidate">
                        @csrf
                       <div class="col-md-12">
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="name" name="name" required aria-required="true">
                               <span class="bar"></span>
                               <label for="name">Nombre</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="icono" name="icono" required aria-required="true">
                               <span class="bar"></span>
                               <label for="icono">Icono</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="url" name="url" required aria-required="true">
                               <span class="bar"></span>
                               <label for="url">URL</label>
                           </div>
                           <div class="form-group">
                               <label for="seccion">Perfiles</label>
                               <select class="form-control" multiple="multiple" id="perfil" name="perfil" required aria-required="true">
                                   @foreach($perfiles as $p)
                                       <option>{{$p->nombre}}</option>
                                   @endforeach
                               </select>
                           </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-danger" onclick="continuar(event)">Crear</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var mandar = false;

        function continuar(e){
            if(!mandar){
                e.preventDefault();
                validarDatos();
            }
        }

        function validarDatos(){

            var form = $('#signupForm');
            var data = form.serializeArray();
            data.push({name: '_token', value: "{{Session::token()}}"});
            $.ajax({
                url: '{{ route('aplicaciones.pre-validar') }}',
                data: data,
                type: 'post',
                success: function (data) {
                    mandar = true;
                    $("button").add;
                    $("#signupForm").submit();
                },
                error: function (result) {
                    displayFieldErrors(result.responseJSON.errors);
                }
            });
        }
    </script>
@endsection

