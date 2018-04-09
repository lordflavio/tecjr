@extends('layouts.app')

@section('content')
 <div class="container">
        <img class="col-md-offset-4 img-responsive" src="{{'/imagens/logo1.png'}}" width="380"  alt="LOGO">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4" >
                <legend><a href="#"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
                <form role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <input type="text" name="type" style="display: none;" class="form-control" id="type" value="user">

                    <div class="form-group input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name: ex: Carlos " required="" autofocus>
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
                    <br />
                    <br />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
