<!-- start:Left Menu -->
<div id="left-menu">
    <div class="sub-left-menu scroll">
        <ul class="nav nav-list">
            <li>
                <div class="left-bg"></div>
            </li>
            <li class="time">
                <h1 class="animated fadeInLeft"></h1>
                <p class="animated fadeInRight"></p>
            </li>
            <li class="active ripple">
                <a onclick="inicio()" class="tree-toggle nav-header"><span class="fa-undo fa"></span> Inicio Curso</a>
            </li>
            <li class="active ripple">
                <a class="tree-toggle nav-header"><span class="fa-user fa"></span> Profesores
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('profesores.importar')}}">Importar</a></li>
                    <li><a href="{{route('profesores.alta')}}">Alta</a></li>
                    <li><a href="{{route('profesores')}}">Listado de Profesores</a></li>
                </ul>
            </li>
            <li class="ripple">
                <a class="tree-toggle nav-header">
                    <span class="fa-graduation-cap fa"></span> Etapas
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('etapas.create')}}">Nueva</a></li>
                    <li><a href="{{route('etapas')}}">Listado Etapas</a></li>
                </ul>
            </li>
            <li class="ripple">
                <a class="tree-toggle nav-header">
                    <span class="fa-contao fa"></span> Cursos
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('cursos.importar')}}">Importar</a></li>
                    <li><a href="{{route('cursos.crear')}}">Crear</a></li>
                    <li><a href="{{route('cursos')}}">Listado de Cursos</a></li>
                </ul>
            </li>
            <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-book"></span> Secciones<span
                            class="fa-angle-right fa right-arrow text-right"></span> </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('secciones.importar')}}">Importar</a></li>
                    <li><a href="{{route('secciones.crear')}}">Alta</a></li>
                    <li><a href="{{route('secciones')}}">Listado Secciones</a></li>
                </ul>
            </li>
            <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-child"></span> Alumnos <span
                            class="fa-angle-right fa right-arrow text-right"></span> </a>
                <ul class="nav nav-list tree">
                    <li><a href="{{route('alumnos.importar')}}">Importar</a></li>
                    <li><a href="{{route('alumnos.importarparcial')}}">Importación Parcial</a></li>
                    <li><a href="{{route('alumnos.nuevo')}}">Alta</a></li>
                    <li><a href="{{route('alumnos')}}">Listado Alumnos</a></li>
                </ul>
            </li>
            @unless(App\user::gestor()->first())
                <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-users"></span> Perfiles <span
                                class="fa-angle-right fa right-arrow text-right"></span> </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('perfiles.asignar')}}">Asignar Perfiles</a></li>
                        <li><a href="{{route('perfiles')}}">Listado de Perfiles</a></li>
                    </ul>
                </li>
                <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-adn"></span> Aplicaciones <span
                                class="fa-angle-right fa right-arrow text-right"></span> </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('aplicaciones.nueva')}}">Nuevo</a></li>
                        <li><a href="{{route('aplicaciones')}}">Listado de Aplicaciones</a></li>
                    </ul>
                </li>
            @endunless
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
                    <a onclick="inicio()" class="tree-toggle nav-header"><span class="fa-undo fa"></span> Inicio
                        Curso</a>
                </li>
                <li class="active ripple">
                    <a class="tree-toggle nav-header"><span class="fa-user fa"></span> Profesores
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('profesores.importar')}}">Importar</a></li>
                        <li><a href="{{route('profesores.alta')}}">Alta</a></li>
                        <li><a href="{{route('profesores')}}">Listado de Profesores</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-graduation-cap fa"></span> Etapas
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('etapas.create')}}">Nueva</a></li>
                        <li><a href="{{route('etapas')}}">Listado Etapas</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-contao fa"></span> Cursos
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('cursos.importar')}}">Importar</a></li>
                        <li><a href="{{route('cursos.crear')}}">Crear</a></li>
                        <li><a href="{{route('cursos')}}">Listado de Cursos</a></li>
                    </ul>
                </li>
                <li class="ripple"><a class="tree-toggle nav-header">
                        <span class="fa fa-book"></span> Secciones<span
                                class="fa-angle-right fa right-arrow text-right"></span> </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('secciones.importar')}}">Importar</a></li>
                        <li><a href="{{route('secciones.crear')}}">Alta</a></li>
                        <li><a href="{{route('secciones')}}">Listado Secciones</a></li>
                    </ul>
                </li>
                <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-child"></span> Alumnos <span
                                class="fa-angle-right fa right-arrow text-right"></span> </a>
                    <ul class="nav nav-list tree">
                        <li><a href="{{route('alumnos.importar')}}">Importar</a></li>
                        <li><a href="{{route('alumnos.importarparcial')}}">Importación Parcial</a></li>
                        <li><a href="{{route('alumnos.nuevo')}}">Alta</a></li>
                        <li><a href="{{route('alumnos')}}">Listado Alumnos</a></li>
                    </ul>
                </li>
                @unless(App\user::gestor()->first())
                    <li class="ripple"><a href="{{route('perfiles')}}"><span class="fa fa-users"></span>Perfiles</a>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-adn"></span> Gestor <span
                                    class="fa-angle-right fa right-arrow text-right"></span> </a>
                        <ul class="nav nav-list tree">
                            @unless(App\ProfesoresPerfiles::where('idPerfil',4)->first())
                                <li><a href="{{route('gestor.asignar')}}">Asignar Gestor</a></li>
                            @endunless
                            @if(App\ProfesoresPerfiles::where('idPerfil',4)->first())
                                <li><a href="#" onclick="eliGestor()">Eliminar Gestor</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-adn"></span> Aplicaciones
                            <span
                                    class="fa-angle-right fa right-arrow text-right"></span> </a>
                        <ul class="nav nav-list tree">
                            <li><a href="{{route('aplicaciones.nueva')}}">Nuevo</a></li>
                            <li><a href="{{route('aplicaciones')}}">Listado de Aplicaciones</a></li>
                        </ul>
                    </li>
                @endunless
            </ul>
        </div>
    </div>
</div>
<button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
    <span class="fa fa-bars"></span>
</button>
<!-- end: Mobile -->