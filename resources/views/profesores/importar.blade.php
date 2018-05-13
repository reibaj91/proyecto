@extends('layouts.app')
@section('cuerpo')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Importación de Profesores</h3>
                    <p class="animated fadeInDown">
                        Profesores <span class="fa-angle-right fa"></span> Importar
                    </p>
                </div>
            </div>
        </div>
        @if(Session::has('message'))
            <div class="alert  {{ Session::get('alert-class', 'alert-danger') }}"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>{{ Session::get('message') }}</div>
        @endif
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
        <div class="col-md-10 col-md-offset-1 panel">
            <div class="col-md-12 panel-heading">
                <h4>Importar Profesores</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="post" action="{{route('profesores.import')}}"
                          novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input id="file" type="file" class="form-control" name="file" required>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-danger" onclick="continuar(event)">Importar</button>
                            </div>
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

        function continuar(e) {
            if (!mandar) {
                e.preventDefault();
                validarDatos();
            }
        }

        function validarDatos() {
            var form = $('#signupForm');
            var data = form.serializeArray();
            data.push({name: '_token', value: "{{Session::token()}}"});
            $.ajax({
                url: '{{ route('profesores.pre-validar') }}',
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

