<!-- start: Header -->
<nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
        <div class="navbar-header" style="width:100%;">
            <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
            <a href="{{route('home')}}" class="navbar-brand">
                <b>EVG</b>
            </a>

            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>{{Auth::user()->nombre}}</span></li>
                <li class="dropdown avatar-dropdown">
                    {{--<img src="/asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>--}}
                   <img src="{{Avatar::create(Auth::user()->nombre)->toBase64()}}" class="m--img-rounded m--marginless" style="width:38px;height:38px;margin-top:7px; cursor: pointer;" alt="iniciales de usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <ul class="dropdown-menu user-dropdown">
                        <li><a href="{{route('logout')}}"><span class="fa fa-power-off "> Cerrar sesión</span></a></li>
                    </ul>
                </li>
                <li ><a href="#" class="opener-right-menu"><span class="fa fa-th"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- end: Header -->