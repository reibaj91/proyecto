<!DOCTYPE html>
<!--[if IE 8]>
<html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    @include('layouts.head')
    <style>
        body{
            background-image: url("/asset/img/fondo.jpg");
            background-repeat: no-repeat;
            width: 100%;
            height: auto;
            background-size:cover;
        }
    </style>
</head>
<!-- END HEAD -->

<body>
@yield('content')
@include('layouts.scripts')
</body>

</html>