<!DOCTYPE html>

<html lang="es">

<head>
    @include('layouts.head2')
    <style>
        html{
            background-color: white;!important;
            height: 100%;!important;
        }

        body{
            background-color: white;!important;
        }
    </style>
</head>

<body id="mimin" class="dashboard">

@include('layouts.cabecera')

<div  class="container-fluid mimin-wrapper">


    @yield('cuerpo')

    @include('layouts.right-side')


</div>

@include('layouts.scripts')

</body>

</html>