/**
 * Created by Flavio on 24/07/2017.
 */
$(document).ready(function() {
    var panels = $('.vote-results');
    var panelsButton = $('.dropdown-results');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('Hide Results');
            }
            else
            {
                currentButton.html('View Results');
            }
        })
    });
});
$(document).ready(function() {


    // INICIO - APOIADORES
    $("#owl-demo-apoio").owlCarousel({
        autoPlay: true,        //Set AutoPlay to 3 seconds
        items : 3,
        slideSpeed : 800,
        pagination : false,      //Pagination off, bolinhas de marcação
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
    });

    var owl = $("#owl-demo-apoio").data('owlCarousel');
    $('#b-left').on("click", function () {
        owl.prev();
    })
    $('#b-right').on("click", function () {
        owl.next();
    })
    // FIM - APOIADORES

});

// CURSO

$(document).ready(function(){
    $('#fone').mask('(00)0000-0000');
    $('#whatsapp').mask('(00)00000-0000');
    $('#telefone2').mask('(00)00000-0000');
    $('#data').mask('00/00/0000');
    // $('#horario').mask('00:00');
    $('#duracao').mask('00');
    // $('.date_time').mask('00/00/0000 00:00:00');
    $('#cep').mask('00000-000');
    // $('.phone').mask('0000-0000');
    // $('.phone_with_ddd').mask('(00) 0000-0000');
    // $('.phone_us').mask('(000) 000-0000');
    // $('.mixed').mask('AAA 000-S0S');
    // $('.cpf').mask('000.000.000-00', {reverse: true});
    // $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    // $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('#valorInscricao').mask("#.##0,00", {reverse: true});
    // $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    //     translation: {
    //         'Z': {
    //             pattern: /[0-9]/, optional: true
    //         }
    //     }
    // });
    // $('.ip_address').mask('099.099.099.099');
    // $('.percent').mask('##0,00%', {reverse: true});
    // $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    // $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    // $('.fallback').mask("00r00r0000", {
    //     translation: {
    //         'r': {
    //             pattern: /[\/]/,
    //             fallback: '/'
    //         },
    //         placeholder: "__/__/____"
    //     }
    // });
    // $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

function somenteNumeros(num) {
    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

// CLOSE MODALS
$('.float-banner-close').click(function(){
    $("#float-banner-close").hide();
    $("#float-banner").hide();
});
//--------------------------------------------

//  Banner Flutuante - MODAL
jQuery(document).ready(function() {
    $(window).scroll(function () {
        set = $(document).scrollTop()+"px";
        jQuery('#float-banner, #float-banner-close').animate(
            {top:set},
            {duration:1000, queue:false}
        );
    });

});


$(document).ready(function(){
    $("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

    $("[data-toggle=tooltip]").tooltip();
});


/*
 * webservice
 --------------*/

function limpa_formulario_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('end').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('estado').value=("");
    // document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('end').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('estado').value=(conteudo.uf);
        // document.getElementById('ibge').value=(conteudo.ibge);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulario_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('end').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('estado').value="...";
            // document.getElementById('ibge').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulario_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulario_cep();
    }
}

/*
 * Maskaras
 --------------*/

$(document).ready(function(){

    $('#cpf').mask('999.999.999-99');
    $('#cep').mask('99999-999');
    $('#telefone').mask('(99)9999-9999');
    $('#telefone-whats').mask('(99) 9 9999-9999');

    // $('.date').mask('00/00/0000');
    // $('.time').mask('00:00:00');
    // $('.date_time').mask('00/00/0000 00:00:00');
    // $('.cep').mask('00000-000');
    // $('.phone').mask('0000-0000');
    // $('.phone_with_ddd').mask('(00) 0000-0000');
    // $('.phone_us').mask('(000) 000-0000');
    // $('.mixed').mask('AAA 000-S0S');
    // $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    // $('.money').mask('000.000.000.000.000,00', {reverse: true});
    // $('.money2').mask("#.##0,00", {reverse: true});
    // $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    //     translation: {
    //         'Z': {
    //             pattern: /[0-9]/, optional: true
    //         }
    //     }
    // });
    // $('.ip_address').mask('099.099.099.099');
    // $('.percent').mask('##0,00%', {reverse: true});
    // $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    // $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    // $('.fallback').mask("00r00r0000", {
    //     translation: {
    //         'r': {
    //             pattern: /[\/]/,
    //             fallback: '/'
    //         },
    //         placeholder: "__/__/____"
    //     }
    // });
    // $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

function somenteNumeros(num) {
    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}


/*
 * combobox
 --------------*/
function combobox() {
    var e = document.getElementById("area");
    var item = e.options[e.selectedIndex].value;

   if(item != '- Selecione -'){
       var com = document.getElementById("subarea");
       while (com.length) {
           com.remove(0);
       }

   }
    var comboCidades = document.getElementById("subarea");
   /*
    * CIÊNCIAS EXATAS E DA TERRA
    -----------------------------*/
    if(item == 'CIÊNCIAS EXATAS E DA TERRA'){
        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Matemática";
        opt1.text = "Matemática";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Probabilidade e Estatística";
        opt2.text = "Probabilidade e Estatística";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Ciência da Computação";
        opt4.text = "Ciência da Computação";
        comboCidades.add(opt4, comboCidades.options[4]);
        var opt5 = document.createElement("option");
        opt5.value = "Astronomia";
        opt5.text = "Astronomia";
        comboCidades.add(opt5, comboCidades.options[5]);
        var opt6 = document.createElement("option");
        opt6.value = "Física";
        opt6.text = "Física";
        comboCidades.add(opt6, comboCidades.options[6]);
        var opt7 = document.createElement("option");
        opt7.value = "Química";
        opt7.text = "Química";
        comboCidades.add(opt7, comboCidades.options[7]);
        var opt8 = document.createElement("option");
        opt8.value = "Geociências";
        opt8.text = "Geociências";
        comboCidades.add(opt8, comboCidades.options[8]);
        var opt9= document.createElement("option");
        opt9.value = "Oceanografia";
        opt9.text = "Oceanografia";
        comboCidades.add(opt9, comboCidades.options[9]);

    }

    /*
     * CIÊNCIAS BIOLÓGICAS
     -----------------------------*/
    if(item == 'CIÊNCIAS BIOLÓGICAS') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Biologia Geral";
        opt1.text = "Biologia Geral";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Botânica";
        opt2.text = "Botânica";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Zoologia";
        opt4.text = "Zoologia";
        comboCidades.add(opt4, comboCidades.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "Astronomia";
        opt5.text = "Astronomia";
        comboCidades.add(opt5, comboCidades.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "Ecologia";
        opt6.text = "Ecologia";
        comboCidades.add(opt6, comboCidades.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "Morfologia";
        opt7.text = "Morfologia";
        comboCidades.add(opt7, comboCidades.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "Fisiologia";
        opt8.text = "Fisiologia";
        comboCidades.add(opt8, comboCidades.options[8]);

        var opt9 = document.createElement("option");
        opt9.value = "Bioquímica";
        opt9.text = "Bioquímica";
        comboCidades.add(opt9, comboCidades.options[9]);

        var opt10 = document.createElement("option");
        opt10.value = "Biofísica";
        opt10.text = "Biofísica";
        comboCidades.add(opt10, comboCidades.options[10]);

        var opt11 = document.createElement("option");
        opt11.value = "Imunologia";
        opt11.text = "Imunologia";
        comboCidades.add(opt11, comboCidades.options[11]);

        var opt12 = document.createElement("option");
        opt12.value = "Farmacologia";
        opt12.text = "Farmacologia";
        comboCidades.add(opt12, comboCidades.options[12]);

        var opt13 = document.createElement("option");
        opt13.value = "Microbiologia";
        opt13.text = "Microbiologia";
        comboCidades.add(opt13, comboCidades.options[13]);

        var opt14 = document.createElement("option");
        opt14.value = "Parasitologia";
        opt14.text = "Parasitologia";
        comboCidades.add(opt14, comboCidades.options[14]);
    }

    /*
     * ENGENHARIAS
     -----------------------------*/

    if(item == 'ENGENHARIAS') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Engenharia Civil";
        opt1.text = "Engenharia Civil";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Engenharia de Minas";
        opt2.text = "Engenharia de Minas";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Engenharia de Materiais e Metalúrgica";
        opt4.text = "Engenharia de Materiais e Metalúrgica";
        comboCidades.add(opt4, comboCidades.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "Astronomia";
        opt5.text = "Astronomia";
        comboCidades.add(opt5, comboCidades.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "Engenharia Elétrica";
        opt6.text = "Engenharia Elétrica";
        comboCidades.add(opt6, comboCidades.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "Engenharia Mecânica";
        opt7.text = "Engenharia Mecânica";
        comboCidades.add(opt7, comboCidades.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "Engenharia Química";
        opt8.text = "Engenharia Química";
        comboCidades.add(opt8, comboCidades.options[8]);

        var opt9 = document.createElement("option");
        opt9.value = "Engenharia de Produção";
        opt9.text = "Engenharia de Produção";
        comboCidades.add(opt9, comboCidades.options[9]);

        var opt10 = document.createElement("option");
        opt10.value = "Engenharia Nuclear";
        opt10.text = "Engenharia Nuclear";
        comboCidades.add(opt10, comboCidades.options[10]);

        var opt11 = document.createElement("option");
        opt11.value = "Engenharia Sanitária";
        opt11.text = "Engenharia Sanitária";
        comboCidades.add(opt11, comboCidades.options[11]);

        var opt12 = document.createElement("option");
        opt12.value = "Engenharia de Transportes";
        opt12.text = "Engenharia de Transportes";
        comboCidades.add(opt12, comboCidades.options[12]);

        var opt13 = document.createElement("option");
        opt13.value = "Engenharia Naval e Oceânica";
        opt13.text = "Engenharia Naval e Oceânica";
        comboCidades.add(opt13, comboCidades.options[13]);

        var opt14 = document.createElement("option");
        opt14.value = "Engenharia de Produção";
        opt14.text = "Engenharia de Produção";
        comboCidades.add(opt14, comboCidades.options[14]);

        var opt14 = document.createElement("option");
        opt14.value = "Engenharia Aeroespacial";
        opt14.text = "Engenharia Aeroespacial";
        comboCidades.add(opt14, comboCidades.options[15]);

        var opt14 = document.createElement("option");
        opt14.value = "Engenharia Biomédica";
        opt14.text = "Engenharia Biomédica";
        comboCidades.add(opt14, comboCidades.options[16]);
    }

    /*
     * CIÊNCIAS DA SAÚDE
     -----------------------------*/

    if(item == 'CIÊNCIAS DA SAÚDE') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Medicina";
        opt1.text = "Medicina";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Odontologia";
        opt2.text = "Odontologia";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Farmácia";
        opt4.text = "Farmácia";
        comboCidades.add(opt4, comboCidades.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "Enfermagem";
        opt5.text = "Enfermagem";
        comboCidades.add(opt5, comboCidades.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "Nutrição";
        opt6.text = "Nutrição";
        comboCidades.add(opt6, comboCidades.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "Saúde Coletiva";
        opt7.text = "Saúde Coletiva";
        comboCidades.add(opt7, comboCidades.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "Fonoaudiologia";
        opt8.text = "Fonoaudiologia";
        comboCidades.add(opt8, comboCidades.options[8]);

        var opt9 = document.createElement("option");
        opt9.value = "Fisioterapia e Terapia Ocupacional";
        opt9.text = "Fisioterapia e Terapia Ocupacional";
        comboCidades.add(opt9, comboCidades.options[9]);

        var opt10 = document.createElement("option");
        opt10.value = "Educação Física";
        opt10.text = "Educação Física";
        comboCidades.add(opt10, comboCidades.options[10]);
    }

    /*
     * CIÊNCIAS AGRÁRIAS
     -----------------------------*/

    if(item == 'CIÊNCIAS AGRÁRIAS') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Agronomia";
        opt1.text = "Agronomia";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Recursos Florestais e Engenharia Florestal ";
        opt2.text = "Recursos Florestais e Engenharia Florestal ";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Engenharia Agrícola";
        opt4.text = "Engenharia Agrícola";
        comboCidades.add(opt4, comboCidades.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "Zootecnia";
        opt5.text = "Zootecnia";
        comboCidades.add(opt5, comboCidades.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "Medicina Veterinária";
        opt6.text = "Medicina Veterinária";
        comboCidades.add(opt6, comboCidades.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "Recursos Pesqueiros e Engenharia de Pesca";
        opt7.text = "Recursos Pesqueiros e Engenharia de Pesca";
        comboCidades.add(opt7, comboCidades.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "Ciência e Tecnologia de Alimentos";
        opt8.text = "Ciência e Tecnologia de Alimentos";
        comboCidades.add(opt8, comboCidades.options[8]);
    }

    /*
     * CIÊNCIAS SOCIAIS APLICADAS
     -----------------------------*/

    if(item == 'CIÊNCIAS SOCIAIS APLICADAS') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Direito";
        opt1.text = "Direito";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Administração";
        opt2.text = "Administração";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Economia";
        opt4.text = "Economia";
        comboCidades.add(opt4, comboCidades.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "Astronomia";
        opt5.text = "Astronomia";
        comboCidades.add(opt5, comboCidades.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "Arquitetura e Urbanismo";
        opt6.text = "Arquitetura e Urbanismo";
        comboCidades.add(opt6, comboCidades.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "Planejamento Urbano e Regional";
        opt7.text = "Planejamento Urbano e Regional";
        comboCidades.add(opt7, comboCidades.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "Demografia";
        opt8.text = "Demografia";
        comboCidades.add(opt8, comboCidades.options[8]);

        var opt9 = document.createElement("option");
        opt9.value = "Ciência da Informação";
        opt9.text = "Ciência da Informação";
        comboCidades.add(opt9, comboCidades.options[9]);

        var opt10 = document.createElement("option");
        opt10.value = "Museologia";
        opt10.text = "Museologia";
        comboCidades.add(opt10, comboCidades.options[10]);

        var opt11 = document.createElement("option");
        opt11.value = "Comunicação";
        opt11.text = "Comunicação";
        comboCidades.add(opt11, comboCidades.options[11]);

        var opt12 = document.createElement("option");
        opt12.value = "Serviço Social";
        opt12.text = "Serviço Social";
        comboCidades.add(opt12, comboCidades.options[12]);

        var opt13 = document.createElement("option");
        opt13.value = "Economia Doméstica";
        opt13.text = "Economia Doméstica";
        comboCidades.add(opt13, comboCidades.options[13]);

        var opt14 = document.createElement("option");
        opt14.value = "Desenho Industrial";
        opt14.text = "Desenho Industrial";
        comboCidades.add(opt14, comboCidades.options[14]);

        var opt14 = document.createElement("option");
        opt14.value = "Turismo";
        opt14.text = "Turismo";
        comboCidades.add(opt14, comboCidades.options[15]);
    }

    /*
     * CIÊNCIAS HUMANAS
     -----------------------------*/

    if(item == 'CIÊNCIAS HUMANAS') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Filosofia";
        opt1.text = "Filosofia";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Sociologia";
        opt2.text = "Sociologia";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Antropologia";
        opt4.text = "Antropologia";
        comboCidades.add(opt4, comboCidades.options[4]);

        var opt5 = document.createElement("option");
        opt5.value = "Arqueologia";
        opt5.text = "Arqueologia";
        comboCidades.add(opt5, comboCidades.options[5]);

        var opt6 = document.createElement("option");
        opt6.value = "História";
        opt6.text = "História";
        comboCidades.add(opt6, comboCidades.options[6]);

        var opt7 = document.createElement("option");
        opt7.value = "Geografia";
        opt7.text = "Geografia";
        comboCidades.add(opt7, comboCidades.options[7]);

        var opt8 = document.createElement("option");
        opt8.value = "Psicologia";
        opt8.text = "Psicologia";
        comboCidades.add(opt8, comboCidades.options[8]);

        var opt9 = document.createElement("option");
        opt9.value = "Educação";
        opt9.text = "Educação";
        comboCidades.add(opt9, comboCidades.options[9]);

        var opt10 = document.createElement("option");
        opt10.value = "Ciência Política";
        opt10.text = "Ciência Política";
        comboCidades.add(opt10, comboCidades.options[10]);

        var opt11 = document.createElement("option");
        opt11.value = "Teologia";
        opt11.text = "Teologia";
        comboCidades.add(opt11, comboCidades.options[11]);
    }

    /*
     * LINGÜÍSTICA, LETRAS E ARTES
     -----------------------------*/

    if(item == 'LINGÜÍSTICA, LETRAS E ARTES') {

        var opt0 = document.createElement("option");
        opt0.value = "0";
        opt0.text = "- Selecione -";
        comboCidades.add(opt0, comboCidades.options[0]);


        var opt1 = document.createElement("option");
        opt1.value = "Lingüística";
        opt1.text = "Lingüística";
        comboCidades.add(opt1, comboCidades.options[1]);

        var opt2 = document.createElement("option");
        opt2.value = "Letras";
        opt2.text = "Letras";
        comboCidades.add(opt2, comboCidades.options[2]);

        var opt4 = document.createElement("option");
        opt4.value = "Artes";
        opt4.text = "Artes";
        comboCidades.add(opt4, comboCidades.options[4]);
    }
}







