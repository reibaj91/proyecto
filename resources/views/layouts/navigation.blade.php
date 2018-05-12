<!-- start:Left Menu -->
<div id="left-menu">
    <div class="sub-left-menu scroll">
        <ul class="nav nav-list">
            <li><div class="left-bg"></div></li>
            <li class="time">
                <h1 class="animated fadeInLeft"></h1>
                <p class="animated fadeInRight"></p>
            </li>
            <li class="active ripple">
                <a class="tree-toggle nav-header"><span class="fa-user fa"></span> Profesores
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('profesores.importar')}}">Importar</a></li>
                    <li><a href="{{route('profesores.alta')}}">Alta</a></li>
                    <li><a href="{{route('profesores')}}">Editar</a></li>
                    <li><a href="dashboard-v2.blade.php">Baja</a></li>
                </ul>
            </li>
            <li class="ripple">
                <a class="tree-toggle nav-header">
                    <span class="fa-graduation-cap fa"></span> Etapas
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('etapas.create')}}">Nueva</a></li>
                    <li><a href="boxed.blade.php">Editar</a></li>
                    <li><a href="boxed.blade.php">Eliminar</a></li>
                    <li><a href="boxed.blade.php">Asignar coordinador</a></li>
                </ul>
            </li>
            <li class="ripple">
                <a class="tree-toggle nav-header">
                    <span class="fa-contao fa"></span> Cursos
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('cursos.crear')}}">Nuevo</a></li>
                    <li><a href="morris.blade.php">Editar</a></li>
                    <li><a href="flot.blade.php">Eliminar</a></li>
                    <li><a href="sparkline.blade.php">Asignar etapa</a></li>
                </ul>
            </li>
            <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-book"></span> Secciones<span class="fa-angle-right fa right-arrow text-right"></span> </a>
                <ul class="nav nav-list tree">
                    <li><a href="#">Importar</a></li>
                    <li><a href="{{route('secciones.create')}}">Alta</a></li>
                    <li><a href="typography.blade.php">Editar</a></li>
                    <li><a href="icons.blade.php">Baja</a></li>
                    <li><a href="buttons.blade.php">Asignar curso</a></li>
                    <li><a href="media.blade.php">Asignar tutor</a></li>
                </ul>
            </li>
            <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-child"></span> Alumnos  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                <ul class="nav nav-list tree">
                    <li><a href="formelement.blade.php">Importar</a></li>
                    <li><a href="{{route('alumnos.nuevo')}}">Alta</a></li>
                    <li><a href="#">Editar</a></li>
                    <li><a href="#">Baja</a></li>
                </ul>
            </li>
            <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-users"></span> Perfiles  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('perfiles.nuevo')}}">Nuevo</a></li>
                    <li><a href="handsontable.blade.php">Editar</a></li>
                    <li><a href="tablestatic.blade.php">Eliminar</a></li>
                </ul>
            </li>
            <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-adn"></span> Aplicaciones <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('aplicaciones.nueva')}}">Nuevo</a></li>
                    <li><a href="handsontable.blade.php">Editar</a></li>
                    <li><a href="tablestatic.blade.php">Eliminar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end: Left Menu -->


<!-- start: Mobile -->
<div id="mimin-mobile" class="reverse">
    <div class="mimin-mobile-menu-list">
        <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
            <ul class="nav nav-list">
                <li class="active ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-user fa"></span> Profesores
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="dashboard-v1.blade.php">Importar</a></li>
                        <li><a href="dashboard-v2.blade.php">Alta</a></li>
                        <li><a href="dashboard-v2.blade.php">Editar</a></li>
                        <li><a href="dashboard-v2.blade.php">Baja</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-graduation-cap fa"></span> Etapas
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="topnav.blade.php">Nueva</a></li>
                        <li><a href="boxed.blade.php">Editar</a></li>
                        <li><a href="boxed.blade.php">Eliminar</a></li>
                        <li><a href="boxed.blade.php">Asignar coordinador</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-contao fa"></span> Cursos
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="chartjs.blade.php">Nuevo</a></li>
                        <li><a href="morris.blade.php">Editar</a></li>
                        <li><a href="flot.blade.php">Eliminar</a></li>
                        <li><a href="sparkline.blade.php">Asignar etapa</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-book"></span> Secciones
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="color.blade.php">Importar</a></li>
                        <li><a href="weather.blade.php">Alta</a></li>
                        <li><a href="typography.blade.php">Editar</a></li>
                        <li><a href="icons.blade.php">Baja</a></li>
                        <li><a href="buttons.blade.php">Asignar curso</a></li>
                        <li><a href="media.blade.php">Asignar tutor</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-child"></span> Alumnos
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="formelement.blade.php">Importar</a></li>
                        <li><a href="#">Alta</a></li>
                        <li><a href="#">Editar</a></li>
                        <li><a href="#">Baja</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-users"></span> Perfiles
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="datatables.blade.php">W</a></li>
                        <li><a href="handsontable.blade.php">T</a></li>
                        <li><a href="tablestatic.blade.php">F</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
    <span class="fa fa-bars"></span>
</button>
<!-- end: Mobile -->