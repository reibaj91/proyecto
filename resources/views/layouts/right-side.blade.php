<!-- start: right menu -->
<?php
$aplicaciones = \App\PerfilApp::aplicacionesUsuario()->with('aplicaciones')->get();
?>
<!-- start: right menu -->
<div id="right-menu">
    <ul class="nav text-center">

        <li  style="background-color: #F9F9F9">
            <h4 data-toggle="tab" href="#right-menu-config" style="padding-top: 13px;">
                <span>APLICACIONES</span>
                <hr>
            </h4>
        </li>

    </ul>

    <div class="tab-content">
        <div id="right-menu-user" class="tab-pane fade in active">

            <div class="user col-md-12">
                <ul class="nav nav-list">
                    @foreach($aplicaciones as $a)
                        <li class="online text-center">
                        <span class="ruta" onclick="enlace('{{$a->aplicaciones->URL}}')">
                        <img src="/images/aplicaciones/{{$a->aplicaciones->icono}}" style="cursor: pointer;"><br>
                        <span style="cursor: pointer;"><strong>{{$a->aplicaciones->nombre}}</strong></span>
                        </span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- end: right menu -->