<!DOCTYPE html>

<html lang="es">

<head>
    @include('layouts.head')

</head>

<body id="mimin" class="dashboard">

@include('layouts.header')

<div  class="container-fluid mimin-wrapper">

    @include('layouts.navigation')
    @yield('cuerpo')
    @include('layouts.right-side')
</div>

@include('layouts.scripts')

</body>

</html>