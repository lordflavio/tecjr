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
                                <option value="CIÊNCIAS EXATAS E DA TERRA">CIÊNCIAS EXATAS E DA TERRA</option>
                                <option value="CIÊNCIAS BIOLÓGICAS">CIÊNCIAS BIOLÓGICAS</option>
                                <option value="ENGENHARIAS">ENGENHARIAS</option>
                                <option value="CIÊNCIAS DA SAÚDE">CIÊNCIAS DA SAÚDE</option>
                                <option value="CIÊNCIAS AGRÁRIAS">CIÊNCIAS AGRÁRIAS</option>
                                <option value="CIÊNCIAS SOCIAIS APLICADAS">CIÊNCIAS SOCIAIS APLICADAS</option>
                                <option value="CIÊNCIAS HUMANAS">CIÊNCIAS HUMANAS</option>
                                <option value="LINGÜÍSTICA, LETRAS E ARTES">LINGÜÍSTICA, LETRAS E ARTES</option>
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
                            <input type="text" name="whatsapp" class="form-control" value="{{$admin->whatsapp}}" id="whatsapp" placeholder="(xx)xxxxx-xxxx" value="">
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
        </div>
    </div></br>

@endsection