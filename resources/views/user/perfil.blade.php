@php
    $paises = array(



               "Afghanistan",

               "Albania",

               "Algeria",

               "Andorra",

               "Angola",

               "Antigua and Barbuda",

               "Argentina",

               "Armenia",

               "Australia",

               "Austria",

               "Azerbaijan",

               "Bahamas",

               "Bahrain",

               "Bangladesh",

               "Barbados",

               "Belarus",

               "Belgium",

               "Belize",

               "Benin",

               "Bhutan",

               "Bolivia",

               "Bosnia and Herzegovina",

               "Botswana",

               "Brazil",

               "Brunei",

               "Bulgaria",

               "Burkina Faso",

               "Burundi",

               "Cambodia",

               "Cameroon",

               "Canada",

               "Cape Verde",

               "Central African Republic",

               "Chad",

               "Chile",

               "China",

               "Colombia",

               "Comoros",

               "Congo (Brazzaville)",

               "Congo",

               "Costa Rica",

               "Cote d'Ivoire",

               "Croatia",

               "Cuba",

               "Cyprus",

               "Czech Republic",

               "Denmark",

               "Djibouti",

               "Dominica",

               "Dominican Republic",

               "East Timor (Timor Timur)",

               "Ecuador",

               "Egypt",

               "El Salvador",

               "Equatorial Guinea",

               "Eritrea",

               "Estonia",

               "Ethiopia",

               "Fiji",

               "Finland",

               "France",

               "Gabon",

               "Gambia, The",

               "Georgia",

               "Germany",

               "Ghana",

               "Greece",

               "Grenada",

               "Guatemala",

               "Guinea",

               "Guinea-Bissau",

               "Guyana",

               "Haiti",

               "Honduras",

               "Hungary",

               "Iceland",

               "India",

               "Indonesia",

               "Iran",

               "Iraq",

               "Ireland",

               "Israel",

               "Italy",

               "Jamaica",

               "Japan",

               "Jordan",

               "Kazakhstan",

               "Kenya",

               "Kiribati",

               "Korea, North",

               "Korea, South",

               "Kuwait",

               "Kyrgyzstan",

               "Laos",

               "Latvia",

               "Lebanon",

               "Lesotho",

               "Liberia",

               "Libya",

               "Liechtenstein",

               "Lithuania",

               "Luxembourg",

               "Macedonia",

               "Madagascar",

               "Malawi",

               "Malaysia",

               "Maldives",

               "Mali",

               "Malta",

               "Marshall Islands",

               "Mauritania",

               "Mauritius",

               "Mexico",

               "Micronesia",

               "Moldova",

               "Monaco",

               "Mongolia",

               "Morocco",

               "Mozambique",

               "Myanmar",

               "Namibia",

               "Nauru",

               "Nepa",

               "Netherlands",

               "New Zealand",

               "Nicaragua",

               "Niger",

               "Nigeria",

               "Norway",

               "Oman",

               "Pakistan",

               "Palau",

               "Panama",

               "Papua New Guinea",

               "Paraguay",

               "Peru",

               "Philippines",

               "Poland",

               "Portugal",

               "Qatar",

               "Romania",

               "Russia",

               "Rwanda",

               "Saint Kitts and Nevis",

               "Saint Lucia",

               "Saint Vincent",

               "Samoa",

               "San Marino",

               "Sao Tome and Principe",

               "Saudi Arabia",

               "Senegal",

               "Serbia and Montenegro",

               "Seychelles",

               "Sierra Leone",

               "Singapore",

               "Slovakia",

               "Slovenia",

               "Solomon Islands",

               "Somalia",

               "South Africa",

               "Spain",

               "Sri Lanka",

               "Sudan",

               "Suriname",

               "Swaziland",

               "Sweden",

               "Switzerland",

               "Syria",

               "Taiwan",

               "Tajikistan",

               "Tanzania",

               "Thailand",

               "Togo",

               "Tonga",

               "Trinidad and Tobago",

               "Tunisia",

               "Turkey",

               "Turkmenistan",

               "Tuvalu",

               "Uganda",

               "Ukraine",

               "United Arab Emirates",

               "United Kingdom",

               "United States",

               "Uruguay",

               "Uzbekistan",

               "Vanuatu",

               "Vatican City",

               "Venezuela",

               "Vietnam",

               "Yemen",

               "Zambia",

               "Zimbabwe"

           );
@endphp
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
                            <li class="active" >
                                <a href="/perfil-user">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Perfil </a>
                            </li>
                            <li>
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
                    <div class="container-fluid">
                        @if($st == 1)
                        <div class = "alert alert-info text-center">Por favor complete o seu cadastro, você só pderar se inscrever nos cursos/eventos com o cadastro completo! </div>
                        @endif
                        @if ($errors->has('password'))
                         <div class = "alert alert-danger text-center">{{ $errors->first('password') }} </div>
                       @endif
                        <section>
                            <div class="container-page">
                                <div class="col-md-12">
                                    <h3 class="dark-grey">Conta</h3><br>
                                    <div class="form-group col-lg-8 has-feedback ">
                                        <label >E-mail</label>
                                        <input type="email" name="email" class="form-control"  disabled="disabled" id="email" value="{{ Auth::user()->email }}">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback form-control-feedback-custom"></span>
                                    </div>
                                    
                                    <div class=" form-group col-md-12 ">
                                        <button type="submit" class="btn btn-success " data-toggle="modal" data-target="#senha"><i class="fa fa-check-square-o pull-left" aria-hidden="true"></i> Atualizar senha </button>
                                    </div>
                                    <h3 class="dark-grey"></h3>
                                    <div class="form-group">
                                        <div class="conta col-lg-12"></div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('perfil-user.update',Auth::user()->id)}}" method="post">
                                {{ method_field('POST')}}
                                {{ csrf_field() }}
                                <div class="container-page">
                                    <div class="col-md-12">
                                        <h3 class="dark-grey">Dados Pessoais</h3><br>

                                        <div class="form-group col-lg-8 has-feedback">
                                            <label>Nome Completo</label>
                                            <input type="text" name="nome" class="form-control" id="nome" value="{{$participant->nome}}" required="">
                                            <span class="glyphicon glyphicon-user form-control-feedback form-control-feedback-custom"></span>
                                        </div>

                                        <div class="form-group col-lg-4 has-feedback">
                                            <label>CPF</label>
                                            <input type="text" name="cpf"  class="form-control cpf" maxlength="15" id="cpf" value="{{$participant->cpf}}" required="">
                                            <span class="fa fa-id-card-o form-control-feedback form-control-feedback-custom"></span>
                                        </div>
                                        <div class="form-group col-lg-4 has-feedback">
                                            <label>Pais</label>
                                            <select id="pais" name="pais" class="form-control">
                                                <option value="{{($participant->pais == "") ? '- Selecione -' : $participant->pais}}">{{($participant->pais == "") ? '- Selecione -' : $participant->pais}}</option>
                                                @foreach($paises as $p)
                                                <option value="{{$p}}">{{$p}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 has-feedback">
                                            <label>Sexo</label>
                                            <select id="sexo" name="sexo" class="form-control" required="">
                                                <option value="{{($participant->sexo == "") ? '- Selecione -' : $participant->sexo}}">{{($participant->sexo == "") ? '- Selecione -' : $participant->sexo}}</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 has-feedback">
                                            <label>Telefone(Whatsapp)</label>
                                            <input type="text" name="celular" class="form-control" id="telefone-whats" value="{{$participant->celular}}" required="">
                                            <span class="fa fa-mobile form-control-feedback form-control-feedback-custom"></span>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Telefone Fisico</label>
                                            <input type="text" name="telefone" class="form-control" id="telefone" value="{{$participant->telefone}}" required="">
                                            {{--<span class="fa fa-phone-square form-control-feedback form-control-feedback-custom"></span>--}}
                                        </div>
                                        <div class="form-group">
                                            <div class="conta col-lg-12"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-page">
                                    <div class="col-md-12">
                                        <h3 class="dark-grey">Endereço</h3><br>

                                        <div class="form-group col-lg-4 has-feedback ">
                                            <label > CEP </label>
                                            <input type="text" name="cep" class="form-control" onblur="pesquisacep(this.value);"  id="cep"  value="{{$participant->cep}}" required="">
                                            <span class="fa fa-thumb-tack form-control-feedback form-control-feedback-custom"></span>
                                        </div>

                                        <div class="form-group col-lg-6 has-feedback">
                                            <label>Endereço</label>
                                            <input type="text" name="endereco" class="form-control" id="end" value="{{$participant->endereco}}" required="">
                                        </div>
                                        <div class="form-group col-lg-2 has-feedback">
                                            <label>Número</label>
                                            <input type="text" name="numero" onkeyup="somenteNumeros(this);" maxlength="8" class="form-control" id="numero" value="{{$participant->numero}}" required="">
                                        </div>
                                        <div class="form-group col-lg-4 ">
                                            <label>Bairro</label>
                                            <input type="text" name="bairro" class="form-control" id="bairro" value="{{$participant->bairro}}" required="">
                                        </div>

                                        <div class="form-group col-lg-6 has-feedback">
                                            <label>Cidade</label>
                                            <input type="text" name="cidade" class="form-control" id="cidade" value="{{$participant->cidade}}">
                                        </div>


                                        <div class="form-group col-lg-2 has-feedback">
                                            <label>Estado</label>
                                            <input type="text" name="estado" class="form-control" id="estado" value="{{$participant->estado}}">
                                        </div>
                                        <div class="form-group">
                                            <div class="conta col-lg-12"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-page">
                                    <div class="col-md-12">
                                        <h3 class="dark-grey">Formação Proficional</h3><br>

                                        <div class="form-group col-lg-4">
                                            <label>Formação</label>
                                            <select id="formacao" name="formacao" class="form-control" required="">
                                                <option value="{{($participant->formacao == "") ? '- Selecione -' : $participant->formacao}}">{{($participant->formacao == "") ? '- Selecione -' : $participant->formacao}} </option>
                                                <option value="Doutorado">Doutorado</option>
                                                <option value="Especialista/Pós-Graduado">Especialista/Pós-Graduado</option>
                                                <option value="Mestrado">Mestrado</option>
                                                <option value="Graduação">Graduação</option>
                                                <option value="Técnico">Técnico</option>
                                                <option value="Ensino Médio (2º grau)">Ensino Médio (2º grau)</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-8 has-feedback ">
                                            <label >Instituição </label>
                                            <input type="text" name="instituicao" class="form-control"   id="instituicao" value="{{$participant->instituicao}}" required="">
                                            <span class="fa fa-university form-control-feedback form-control-feedback-custom"></span>
                                        </div>

                                        <div class="form-group col-lg-6 has-feedback">
                                            <label>Área</label>
                                            <select id="area" name="area_formacao" onclick="combobox()" class="form-control" required="">
                                                <option value="{{($participant->area_formacao == "") ? '- Selecione -' : $participant->area_formacao}}">{{($participant->area_formacao == "") ? '- Selecione -' : $participant->area_formacao}}</option>
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
                                        <div class="form-group col-lg-6 has-feedback">
                                            <label>Subárea</label>
                                            <select id="subarea" name="subarea"  class="form-control" required="">
                                                <option value="{{($participant->subarea == "") ? '- Selecione -' : $participant->subarea}}">{{($participant->subarea == "") ? '- Selecione -' : $participant->subarea}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-11 center-block">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o pull-left" aria-hidden="true"></i> Salvar  </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                        
                        <div class="modal fade" id="senha" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center">Modificar Senha</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form role="form" method="POST" action="{{ route('password.update') }}">
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