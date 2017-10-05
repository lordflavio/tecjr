@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <img class="col-md-6 col-md-offset-3 img-responsive " src="{{'/imagens/logo1.png'}}" width="320"  alt="LOGO">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3 input-group">
                                <div class="input-group-addon"><i class="fa fa-user " aria-hidden="true"></i></div>
                                <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ 'Login ou senha incorretos' }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3 input-group">
                                <div class="input-group-addon"><i class="fa fa-lock " aria-hidden="true"></i></div>
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                        {{--<div class="col-md-6 col-md-offset-5">--}}
                        {{--<div class="checkbox">--}}
                        {{--<label>--}}
                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                        {{--</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueci minha senha?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="from-group">
                        <hr class="hr-custom col-lg-offset-3 ">
                    </div>

                    <div class="form-group">
                        {{--<p class="text-center"> <a  href="{{route('register')}}"> Registra-se  </a> </p>--}}
                    </div>
                    <div class="form-group">
                        <p class="text-center"> ©2017 TecJr</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
