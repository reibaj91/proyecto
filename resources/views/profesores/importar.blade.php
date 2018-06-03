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
                        </div>
                    </form>
                    <div class="col-md-12">
                        <button class="btn btn-danger" onclick="continuar(event)">Importar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function continuar() {
            swal({
                title: '¿Estás seguro?',
                text: "Este proceso borrará todos los profesores",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value) {

                document.getElementById("signupForm").submit();

            }
        })
        }
    </script>
@endsection

