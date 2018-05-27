<!DOCTYPE html>

<html lang="es">

<head>
    @include('layouts.head')
</head>

<body id="mimin" class="dashboard">

@include('layouts.header')

<div  class="container-fluid mimin-wrapper">

    @if(App\user::perfiles()->first())
        @include('layouts.navigation')
    @else
        <style>
            #content{
                padding-left: 0;
            }
        </style>
    @endif

    @yield('cuerpo')

    @include('layouts.right-side')


</div>

@include('layouts.scripts')

</body>

</html>