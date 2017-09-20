@extends('layouts.tamplate-principal')

@section('content')
    <section id="inicial">
        <div id="bootstrap-touch-slider" class="carousel bs-slider control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="https://images.pexels.com/photos/48726/pexels-photo-48726.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <h1 data-animation="animated zoomInRight">Bootstrap Carousel</h1>
                                <p data-animation="animated fadeInLeft">Bootstrap carousel now touch enable slide.</p>
                                <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">select one</a>
                                <a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">select two</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="https://images.pexels.com/photos/207990/pexels-photo-207990.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">Bootstrap touch slider</h1>
                        <p data-animation="animated lightSpeedIn">Make Bootstrap Better together.</p>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInUp">select one</a>
                        <a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">select two</a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="imagens/3.png" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInLeft">Beautiful Animations</h1>
                        <p data-animation="animated fadeInRight">Lots of css3 Animations to make slide beautiful .</p>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">select one</a>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-primary" data-animation="animated fadeInRight">select two</a>
                    </div>
                </div>
                <!-- End of Slide -->


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->
    </section>

    <section id="noticias">
        <div class="container">

            <div class="row topo_noticias">
                <h1>Noticias sobre a UPE</h1>
                <p id="subtitulo">If you are going to use a passage of Lorem Ipsum, you need to be </p>
            </div>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="http://placehold.it/760x400/cccccc/ffffff">
                        <div class="carousel-caption">
                            <h4><a href="#">Lorem ipsum dolor sit amet consetetur sadipscing</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/999999/cccccc">
                        <div class="carousel-caption">
                            <h4><a href="#">consetetur sadipscing elitr, sed diam nonumy eirmod</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/dddddd/333333">
                        <div class="carousel-caption">
                            <h4><a href="#">tempor invidunt ut labore et dolore</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/999999/cccccc">
                        <div class="carousel-caption">
                            <h4><a href="#">magna aliquyam erat, sed diam voluptua</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/dddddd/333333">
                        <div class="carousel-caption">
                            <h4><a href="#">tempor invidunt ut labore et dolore magna aliquyam erat</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                </div><!-- End Carousel Inner -->


                <ul class="list-group col-sm-4">
                    <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h4>consetetur sadipscing elitr, sed diam nonumy eirmod</h4></li>
                    <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h4>tempor invidunt ut labore et dolore</h4></li>
                    <li data-target="#myCarousel" data-slide-to="3" class="list-group-item"><h4>magna aliquyam erat, sed diam voluptua</h4></li>
                    <li data-target="#myCarousel" data-slide-to="4" class="list-group-item"><h4>tempor invidunt ut labore et dolore magna aliquyam erat</h4></li>
                </ul>

                <!-- Controls -->
                <div class="carousel-controls">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

            </div><!-- End Carousel -->
        </div>

        </div>
    </section><!-- OK -->

    <section id="equipe">
        <div class="container">
            <div class="row cabecalho_secao">
                <h1>Nossa equipe</h1>
                <p>Pessoas por trás dessa empresa</p>
            </div>

            {{--<button  type="button" id="b-equipe-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-equipe-right"><i class="fa fa-chevron-right"></i></button>--}}

            <div id="owl-demo" class="espacamento">

                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Jose Carlos Felix </h4>
                        <span class="funcao"> - Diretor da Empresa - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Arianne Sarmento Torquate </h4>
                        <span class="funcao"> - Diretor de Recursos Humanos - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Denis de Gois Marques </h4>
                        <span class="funcao"> - Diretor de Projetos - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> José Flavio Vieira Melo </h4>
                        <span class="funcao"> - Diretor de Projetos - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Ramon Marques </h4>
                        <span class="funcao"> - Diretor de Finanças - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Nicollas Ivanno </h4>
                        <span class="funcao"> - Diretor Administrativo - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Ailson Telles </h4>
                        <span class="funcao"> - Diretor de Marketing - </span>
                        <h4 class="widget-title">Siga-me nas redes sociais</h4>
                        <ul class="social-nav">
                            <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </section>  <!-- OK -->

    <section id="cursos">
        <div class="container">

            <div class="row cabecalho_secao">
                <h1>Cursos e Eventos</h1>
                <p>Entre em contato conosco para saber mais.</p>
            </div>

            {{--<button  type="button" id="b-cursos-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-cursos-right"><i class="fa fa-chevron-right"></i></button>--}}

            <div id="owl-demo-3" class="espacamento">

                <div class="item  center-block">
                    <div class="contorno">
                        <img src="http://1.bp.blogspot.com/-LBPMhqvvas4/VXYmKRqGTRI/AAAAAAAAG0A/98RuYbdVfoE/s1600/logo%2Bevento.jpg" alt="pessoa1" class="img-responsive center-block">
                        <h4> COMBINATIVIDADE </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br><div class="center-block buttom-custom-1 "><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://s-media-cache-ak0.pinimg.com/originals/d4/26/9c/d4269cb720d3e94bf55a62f0c35faaf7.jpg" alt="pessoa1" class="img-responsive center-block">
                        <h4> JAVA - MODULO 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://www.sololearn.com/Icons/Courses/1073.png" alt="pessoa1" class="img-responsive center-block">
                        <h4> PYTHON - MODULO 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block ">
                    <div class="contorno">
                        <img src="https://yata.ostr.locaweb.com.br/9740eb07a0b7733a522b435e9b25789a5a7992345727fcb9ae6a205620e89aba" alt="pessoa1" class="img-responsive center-block">
                        <h4> INFORMATICA BÁSICA 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the trut,</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://camo.githubusercontent.com/62043de0c3dec54f8a7fcc46e515dc7574a62ef7/68747470733a2f2f73332d75732d776573742d322e616d617a6f6e6177732e636f6d2f7465737464726976656e6c6561726e696e676275636b65742f68746d6c6373732e6a7067" alt="pessoa1" class="img-responsive center-block">
                        <h4> HTML / CSS MODULO 1 </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth</span>
                        </br><div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://d2tycqyw09ngo1.cloudfront.net/be-content/uploads/2015/11/10115301/curso-online-de-logica-de-programacao-BECODE-new-1-460x281.png" alt="pessoa1" class="img-responsive">
                        <h4> LÓGICA DE PROGRAMAÇÃO </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth</span>
                        </br> <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block">
                    <div class="contorno">
                        <img src="https://static1.scirra.net/avatars/256/166daea6244fd93c4a74fd819c8e5235.png?dateline=1419330007" alt="pessoa1" class="img-responsive">
                        <h4> DESENVOLVIMENTO DE JOGOS </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        <div class="buttom-custom-1"><p class="texto-button"> - SAIBA MAIS - </p></div>
                    </div>
                </div>
                <div class="item center-block ">
                    <div class="contorno">
                        <img src="imagens/logo.png" alt="pessoa1" class="img-responsive">
                        <h4> VEJA MAIS </h4>
                        <span class="descricao">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth,</span>
                        <div class="buttom-custom-2 center-block"><p class="texto-button-2"> - SAIBA MAIS - </p></div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- OK -->

    <section id="colaboradores">
        <div class="container">

            {{--<button  type="button" id="b-left"><i class="fa fa-chevron-left"></i></button>--}}
            {{--<button  type="button" id="b-right"><i class="fa fa-chevron-right"></i></button>--}}

            <div class="row texto-ini">
                <h1 id="texto1">NOSSOS</h1>
                <h1 id="texto2">APOIADORES</h1>
            </div>

            <div class="col-md-4"></div>

            <div class="col-md-8">
                <div id="owl-demo-apoio" class="espacamento">

                    <div class="item center-block item-custom"><img src="imagens/logo.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/upe-logo.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/img_lc.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="https://sites.google.com/site/imagensdositedatecjr/home/logotipo_thr3ap.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/upe-logo.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/logo.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/upe-logo.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/logo.png" alt="Owl Image"></div>
                    <div class="item center-block item-custom"><img src="imagens/upe-logo.png" alt="Owl Image"></div>

                </div>
            </div>
        </div>
    </section>

@endsection