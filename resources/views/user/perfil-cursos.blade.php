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
                            <button type="submit" class="btn btn-success center-block"> Mudar Imgaem  </button>
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
                                <a href="#">
                                    <i class="fa fa-archive"></i>
                                    Eventos </a>
                            </li>
                            <li>
                                <a href="" >
                                    <i class="fa fa-graduation-cap"></i>
                                    Certificados </a>
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
                                    @for($i = 0; $i < 5; $i++) 
                                    <div class="col-sm-10 col-lg-10 col-md-offset-1" > 
                                        <!-- Begin Listing: 609 W GRAVERS LN-->
                                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                                            <div class="media">
                                                <a class="pull-left" href="#" target="_parent">
                                                    <img alt="image" class="img-responsive" src="{{($participant->img == "") ? '/imagens/user.jpg' : $participant->img }}"></a>

                                                <div class="clearfix visible-sm"></div>

                                                <div class="media-body fnt-smaller">
                                                    <a href="#" target="_parent"></a>

                                                    <h4 style="color: black; font-weight: 700;" class="media-heading"> Titulo </h4>

                                                    <p class="hidden-xs text-justify"> Descrição </p>

                                                    <small style="margin-top: 8px;" class="pull-right"> 12/11/2018 <i class="fa fa-calendar-check-o" aria-hidden="true"></i> </small>
                                                   
                                                    <p> Situação: </p>
                                                    <p>
                                                        <span href="#" class="label label-primary">Aguardando Pagamento</span> 
                                                        <span href="#" class="label label-success">Em andamento</span> 
                                                        <a style="text-decoration: none"> 
                                                            <button class="btn btn-success p-buuton" disabled > Gerar Certificado </button> 
                                                        </a> 
                                                    </p>
                                                    <p><small class="alert-info"> A função gerar cetificado é habilitada depois da finalização do curso </small></p>
                                                </div>
                                            </div>
                                        </div><!-- End Listing-->
                                    </div><!-- End Col -->
                                    @endfor
                                </div><!-- End row -->
                            </div><!-- End container -->
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
