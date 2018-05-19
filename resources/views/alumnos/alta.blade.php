@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Alta de Alumnos</h3>
                    <p class="animated fadeInDown">
                        Alumnos <span class="fa-angle-right fa"></span> Alta
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
                <h4>Añadir Alumno</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('alumnos.store')}}" novalidate="novalidate">
                        @csrf
                       <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="nia" name="nia" required aria-required="true">
                                <span class="bar"></span>
                                <label for="nia">NIA</label>
                            </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="name" name="name" required aria-required="true">
                               <span class="bar"></span>
                               <label for="name">Nombre</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="dni" name="dni" required aria-required="true">
                               <span class="bar"></span>
                               <label for="dni">DNI</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="fecha" name="fecha" required aria-required="true">
                               <span class="bar"></span>
                               <label for="fecha">Fecha Nacimiento</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="sexo" name="sexo" required aria-required="true">
                               <span class="bar"></span>
                               <label for="sexo">Sexo</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="telefono" name="telefono" required aria-required="true">
                               <span class="bar"></span>
                               <label for="telefono">Telefono</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="telefono_urgencia" name="telefono_urgencia" required aria-required="true">
                               <span class="bar"></span>
                               <label for="telefono_urgencia">Telefono Urgencias</label>
                           </div>
                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                               <input type="text" class="form-text" id="email" name="email" required aria-required="true">
                               <span class="bar"></span>
                               <label for="email">Email</label>
                           </div>
                           <div class="form-group">
                               <label for="seccion">Sección</label>
                               <select class="form-control " id="seccion" name="seccion" required aria-required="true">
                                   @foreach($secciones as $s)
                                       <option>{{$s->nombre}}</option>
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
                url: '{{ route('alumnos.pre-validar') }}',
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

