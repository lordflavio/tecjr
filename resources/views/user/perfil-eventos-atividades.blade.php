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
                                <li>
                                    <a href="/perfil-user/cursos">
                                        <i class="fa fa-cubes"></i>
                                        Cursos </a>
                                </li>
                                <li class="active">
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
                                <h4 class="text-center"> Atividades </h4>
                                <div class="container-pad" id="property-listings">
                                    <div class="row">
                                        @if(count($ativ) > 0)
                                            @for($i = 0; $i < count($ativ); $i++)
                                                <div class="col-sm-6 col-lg-6" >
                                                    <!-- Begin Listing: 609 W GRAVERS LN-->
                                                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                                                        <div class="media">
                                                            {{--<a class="pull-left" href="#" target="_parent">--}}
                                                            {{--<img alt="image" class="img-responsive" src="{{ $ins['evento'][$i]->img }}"></a>--}}

                                                            <div class="clearfix visible-sm"></div>

                                                            <div class="media-body fnt-smaller">
                                                                <a href="#" target="_parent"></a>

                                                                <h5 style="color: black; font-weight: 700;" class="media-heading"> <b>Tema :</b> {{($ativ[$i]->titulo. '-' . $ativ[$i]->modalidade)}} </h5>

                                                                <p class="hidden-xs text-justify">
                                                                    <b>Horario: {{$ativ[$i]->horario}}
                                                                        <small style="margin-top: 8px;" class="pull-right"> {{date("d/m/Y", strtotime($ativ[$i]->data))}} <i class="fa fa-calendar-check-o" aria-hidden="true"></i> </small>
                                                                    </b><br>
                                                                    <b>Area :</b> {{($ativ[$i]->area)}} <br>
                                                                    <b>Palestrante :</b> {{($ativ[$i]->palestrante)}} <br>
                                                                    <b>Coordenação :</b> {{($ativ[$i]->cordenacao)}}  <br>
                                                                    <b>Local:</b>{{$ativ[$i]->local}}<br>
                                                                </p>

                                                                <hr>
                                                                @if($ativ[$i]->vagas > $ativ[$i]->check($ativ[$i]->id, $ativ[$i]->eventoId))
                                                                <p class="text-center">
                                                                    @php( $v = $p->verifica($ativ[$i]->id))
                                                                    <a href="{{$v['link'] == '#' ? '#' : '/perfil-user/eventos-minhas-atividades/'.$ativ[$i]->id.'/'.$ativ[$i]->eventoId }}" style="text-decoration: none">
                                                                        <button class="btn {{$v['btn'] == "disabled" ? 'btn-info' : 'btn-success'}} p-buuton-custom" {{$v['btn']}}  > {{$v['btn'] == "disabled" ? 'Já Inscrito' : 'Participar desta Atividade'}} </button>
                                                                    </a>
                                                                    <b>Vagas: </b>{{$ativ[$i]->vagas}} <b>Dísponivel: </b> {{ $ativ[$i]->vagas - $ativ[$i]->check($ativ[$i]->id, $ativ[$i]->eventoId) }}
                                                                </p>
                                                                @else
                                                                    <div class = "alert alert-info text-center"> Lotado </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div><!-- End Listing-->
                                                </div><!-- End Col -->
                                            @endfor
                                        @else
                                            <h5 class="text-center"> Não há atividades registradas para este evento no momento  </h5>
                                        @endif
                                            <br>
                                            <div class="col-md-12">
                                                <a href="/perfil-user/eventos" type="button" class="btn btn-success pull-left"> Voltar </a>
                                            </div>
                                    </div><!-- End row -->
                                </div><!-- End container -->
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>

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
@endsection
