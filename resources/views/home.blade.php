@extends('layouts.tamplate-user')

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

    <section id="apresentacaoEmp">

    </section>

    <section id="equipe">
        <div class="container">
            <div class="row cabecalho_secao">
                <h1>Nossa equipe</h1>
                <p>Pessoas por trás dessa empresa</p>
            </div>

            <div id="owl-demo" class="espacamento">

                <div class="item center-block">
                    <img src="imagens/pessoa.jpg" alt="pessoa1" class="img-responsive">
                    <div class="descricao-membros">
                        <h4> Jose Carlos Felix </h4>
                        <span class="funcao"> - Diretor da Empresa - </span>
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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
                        <h4 class="widget-title">Siga-nos nas redes sociais</h4>
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

    </section>

    <section id="cursos">

    </section>


    <section id="colaboradores">

    </section>
@endsection