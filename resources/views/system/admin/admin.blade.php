@extends('layouts.tamplate-system')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <form action="{{route('perfil.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <div class="hast">
                    <h1 class="text-left"> Perfil </h1>
                    <img style="margin-top: -12%" class=" img-responsive img-polaroid center-block" src="{{($admin->img == "") ? '/imagens/admin.png' : $admin->img }}" width="150" alt="FOTO">
                </div>
                <hr>
                <section class="hast">
                    <div class="col-md-10">
                        <h3 class="dark-grey">Informações</h3><br>
                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Nome Completo: </label>
                            <input type="text" name="nome" class="form-control" value="{{$admin->nome}}"   id="nome" placeholder="Nome Completo ">
                            <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                        </div>
                        <div class="form-group col-lg-6 has-feedback">
                            <label>Área:</label>
                            <select id="area" name="cargo" onclick="combobox()" class="form-control">
                                <option value="{{($admin->cargo == "") ? '- Selecione -' : $admin->cargo}}">{{($admin->cargo == "") ? '- Selecione -' : $admin->cargo}}</option>
                                <option value="PRESIDENTE">PRESIDENTE</option>
                                <option value="DIRETOR DE PROJETOS">DIRETOR DE PROJETOS</option>
                                <option value="DIRETOR FINANCEIRO">DIRETOR FINANCEIRO</option>
                                <option value="DIRETOR ADMINISTRATIVO">DIRETOR ADMINISTRATIVO</option>
                                <option value="DIRETOR DE MARKETING">DIRETOR DE MARKETING</option>
                                <option value="GESTÃO DE PESSOAS">GESTÃO DE PESSOAS</option>
                                <option value="OUTRAS">OUTRAS</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >facebook:</label>
                            <input type="text" name="face" class="form-control" value="{{$admin->face}}"    id="face" placeholder="link">
                            <span class="fa fa-facebook-square form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Twitter:</label>
                            <input type="text" name="twitter" class="form-control" value="{{$admin->twitter}}"  placeholder="link" id="twitter">
                            <span class="fa fa-twitter form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback ">
                            <label >Gmail:</label>
                            <input type="text" name="gmail" class="form-control" value="{{$admin->gmail}}"  id="gmail" placeholder='jose@gmail.com'>
                            <span class="fa fa-google-plus form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Whatsapp:</label>
                            <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{$admin->whatsapp}}">
                            <span class="fa fa-whatsapp form-control-feedback form-control-feedback-custom"></span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="img">Upload Imagem</label>
                            <input id="img" name="img" class="input-file" type="file">
                        </div>
                    </div>
                </section>
                <div class="col-md-10">
                   <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom"> <b style="width: 150px; height: 20px"> Salva </b> </button> </p>
                </div>
            </form>
            <p class="text-left"><button type="submit" data-toggle="modal" data-target="#senha" class="btn btn-success btn-success-custom"> <b style="width: 150px; height: 20px"> Alterar Senha </b> </button> </p>
        </div>
    </div></br>

    <div class="modal fade" id="senha" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Modificar Senha</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" method="POST" action="{{ route('password.update-admin') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="text" name="type" style="display: none;" class="form-control" id="type" value="user">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-group">
                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha: Min 6 caracteres" required="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="input-group-addon"><i class="fa fa-expeditedssl " aria-hidden="true"></i></div>
                        </div>

                        <div class="form-group input-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Senha" required="">
                            <div class="input-group-addon"><i class="fa fa-expeditedssl " aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection