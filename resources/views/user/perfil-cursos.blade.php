@extends('layouts.tamplate-principal')

@section('content')
<section id="perfil">
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{($participant->img == "") ? '/imagens/user.jpg' : $participant->img }}" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            Foto de perfil
                        </div>
                        <div class="profile-usertitle-job" style="padding-bottom: 20px">
                            <button type="submit" class="btn btn-success " data-toggle="modal" data-target="#img" class="btn btn-success center-block"> Mudar Imgaem  </button>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->

                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul id="myTab" class="nav nav-tab">
                            <li>
                                <a href="/perfil-user">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Perfil </a>
                            </li>
                            <li class="active">
                                <a href="/perfil-user/cursos">
                                    <i class="fa fa-cubes"></i>
                                    Cursos </a>
                            </li>
                            <li>
                                <a href="/perfil-user/eventos">
                                    <i class="fa fa-archive"></i>
                                    Eventos </a>
                            </li>
                            <li>
                                <a  href="/contato">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    Contato </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <section id="agenda">
                        <div class="container-fluid">
                            <h4 class="text-center">Meus Cursos</h4>
                            <div class="container-pad" id="property-listings">
                                <div class="row">
                                    @if(count($ins) > 0)
                                    @for($i = 0; $i < count($ins['curso']); $i++)
                                    <div class="col-sm-10 col-lg-10 col-md-offset-1" > 
                                        <!-- Begin Listing: 609 W GRAVERS LN-->
                                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                                            <div class="media">
                                                <a class="pull-left" href="#" target="_parent">
                                                    <img alt="image" class="img-responsive" src="{{ $ins['curso'][$i]->img }}"></a>

                                                <div class="clearfix visible-sm"></div>

                                                <div class="media-body fnt-smaller">
                                                    <a href="#" target="_parent"></a>

                                                    <h4 style="color: black; font-weight: 700;" class="media-heading"> {{ $ins['curso'][$i]->titulo }} </h4>

                                                    <p class="hidden-xs text-justify"> {{ $ins['curso'][$i]->descricao }} </p>

                                                    <small style="margin-top: 8px;" class="pull-right"> {{date("d/m/Y", strtotime($ins['curso'][$i]->data))}} <i class="fa fa-calendar-check-o" aria-hidden="true"></i> </small>


                                                    <p> Situação: </p>
                                                    <p>
                                                        <span href="#" class="label {{ $ins['transacao'][$i]->getLabel($ins['transacao'][$i]->status) }}">
                                                            {{ $ins['transacao'][$i]->getStatus($ins['transacao'][$i]->status) }}
                                                            </span>
                                                            <span href="#" class="label {{ $ins['curso'][$i]->situacao == 'Em andamento' ? 'label-primary' : 'label-success' }}" >

                                                            {{ $ins['curso'][$i]->situacao }}

                                                            </span>
                                                        <a href=" {{ $ins['csf'][$i]->certificado == 1 ? '/perfil-user/certificado-curso/'.$ins['curso'][$i]->nome : '#' }}" style="text-decoration: none" target="_blank" >
                                                          <button class="btn  {{ $ins['csf'][$i]->certificado == 2 ? 'btn-danger' : 'btn-success' }} p-buuton"  {{ $ins['curso'][$i]->situacao == 'Finalizado' ? '' : 'disabled' }}
                                                                  {{ $ins['csf'][$i]->certificado == 1 ? '' : 'disabled' }}>
                                                                Gerar Certificado {{$ins['csf'][$i]->getCertificado($ins['csf'][$i]->certificado)}}
                                                          </button>

                                                        </a>
                                                    </p>

                                                    @if($ins['curso'][$i]->situacao == "Em andamento")
                                                    <p><small class="alert-info"> A função gerar cetificado é habilitada depois da finalização do curso </small></p>
                                                    @endif

                                                </div>
                                            </div>
                                        </div><!-- End Listing-->
                                    </div><!-- End Col -->
                                    @endfor
                                    @else
                                        <h5 class="text-center"> Você não possui cursos </h5>
                                    @endif
                                </div><!-- End row -->
                            </div><!-- End container -->
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="img" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Atualizar imagem de Perfil</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('perfil-user-mudar-imagem')}}" method="post" enctype="multipart/form-data">

                    {{ method_field('POST')}}
                    {{ csrf_field() }}
                    <section>
                        <div class="col-md-10">
                            <div class="form-group col-md-offset-1 col-lg-12 ">
                                <label class="col-md-6 control-label" for="img">Upload Imagem </label>
                                <input id="img" name="img" class="input-file" type="file">
                            </div>
                        </div>
                    </section>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
