<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or 'Tecjr' }}</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{asset('/imagens/ico.png')}}" />

    <!-- Styles -->
    <link href="{{asset('css/system-css.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    {{--<link href="{{asset('assets/myCss/toastr.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('bootstrap-3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="body-background">
<div id="wrapper">
    <div id="sidebar-wrapper">
        <a href="#"><img class="logo" src="{{'/imagens/logo1.png'}}" width="200" height="70" alt="TECJR"></a>
        <aside id="sidebar">
            <ul id="sidemenu" class="sidebar-nav">
                <li>
                    <a href="{{route('home.index')}}">
                        <span class="sidebar-icon"><i class="fa fa-home"></i></span>
                        <span class="sidebar-title">Home</span>
                    </a>
                </li>
                <li>
                    <a style="cursor: pointer;" data-toggle="modal" data-target="#admin">
                        <span class="sidebar-icon"><i class="fa fa-user"></i></span>
                        <span class="sidebar-title">Novo Admin</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar-icon"><i class="fa fa-usd"></i></span>
                        <span class="sidebar-title">Ganhos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('curso.index')}}">
                        <span class="sidebar-icon"><i class="fa fa-cubes"></i></span>
                        <span class="sidebar-title">Cursos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar-icon"><i class="fa fa-address-book"></i></span>
                        <span class="sidebar-title">Inscritos</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('evento.index')}}">
                        <span class="sidebar-icon"><i class="fa fa-archive"></i></span>
                        <span class="sidebar-title">Eventos</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="sidebar-icon"><i class="fa fa-graduation-cap"></i></span>
                        <span class="sidebar-title">Certificados</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar-icon"><i class="fa fa-pie-chart"></i></span>
                        <span class="sidebar-title">Extenção</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
    <main id="page-content-wrapper" role="main">
        <div id="navbar-wrapper">
            <header>
                <nav class="navbar navbar-default navbar-inverse navbar-inverse-custom" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav  navbar-right ">
                                <li class="dropdown"><a id="user-profile" href="{{route('evento.create')}}" > <span class="glyphicon glyphicon-plus-sign pull-left"></span><p> Novo Evento </p> </a></li>
                                <li class="dropdown"><a id="user-profile" href="{{route('curso.create')}}" > <span class="glyphicon glyphicon-plus-sign pull-left"></span><p> Novo Curso </p> </a></li>
                                <li class="dropdown">
                                    <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{($admin->img == "") ? '/imagens/admin.png' : $admin->img }}" class="img-responsive img-thumbnail img-circle"> <p> {{ Auth::user()->name }} <b class="caret pull-right"></b> </p>  </a>
                                    <ul class="dropdown-menu dropdown-menu-custom" role="menu">
                                        <li><a style="cursor: pointer" href="{{route('admin.index')}}">Perfil <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                                Logout <span class="glyphicon glyphicon-log-out pull-right"></span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <div class="login-magin"></div>
        @yield('content')
        <footer>
            <div class="col-md-12">
                <p class="text-center">Copyright © 2017  <a href="#">Flávio Freelancer.</a> All rights reserved </p>
            </div>
        </footer>
    </main>

    {{--Novo Administrador--}}
    <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Novo Adiministrador</h4>
                </div>
                <form action="{{ route('admin.store')}}" method="post">
                    {{ method_field('POST')}}
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <section class="hast">
                        <input type="text" name="type" style="display: none;" class="form-control" id="type" value="admin">

                            <div class="form-group input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group-addon"><i class="fa fa-user " aria-hidden="true"></i></div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-group">
                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required="">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group-addon"><i class="fa fa-envelope " aria-hidden="true"></i></div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-group">
                                <div>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group-addon"><i class="fa fa-expeditedssl " aria-hidden="true"></i></div>
                            </div>

                            <div class="form-group input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="">
                                <div class="input-group-addon"><i class="fa fa-expeditedssl " aria-hidden="true"></i></div>
                            </div>
                        </section>
                    </div>
                    <div class="panel-footer" style="margin-bottom:-14px;">
                        <input type="submit" class="btn btn-success" value="Salvar"/>
                        <!--<span class="glyphicon glyphicon-remove"></span>-->
                        <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="{{asset('js/toastr.min.js' )}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>--}}
<script src="{{asset('bootstrap-3/js/bootstrap.min.js' )}}"></script>
<script src="{{asset('js/jquery.mask.js' )}}"></script>
<script src="{{asset('js/myjs.js' )}}"></script>


<script>
    $(document).ready(function () {

        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 5000
            };
            @if(Session::has('success')) //store
            toastr.success('{{ Session::get("success") }}');

            @elseif(Session::has('update')) //Edit
            toastr.warning('{{ Session::get("update") }}');

            @elseif(Session::has('info')) //Edit
            toastr.info('{{ Session::get("info") }}');

            @elseif(Session::has('warning'))// Delete
            toastr.error('{{ Session::get("warning") }}');
            @endif
        }, 1000);
    });
</script>

</body>
</html>