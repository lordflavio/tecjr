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

    // Carousel da equipe
    $("#owl-demo").owlCarousel({

        autoPlay: true, //Set AutoPlay to 3 seconds

        items : 3,
        slideSpeed : 800,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

    var owl3 = $("#owl-demo").data('owlCarousel');
    $('#b-equipe-left').on("click", function () {
        owl3.prev();
    })
    $('#b-equipe-right').on("click", function () {
        owl3.next();
    })
    // FIM do Carousel de noticias



    // Carousel de noticias
    $("#owl-demo-2").owlCarousel({

        autoPlay: true, //Set AutoPlay to 3 seconds

        items : 3,
        slideSpeed : 800,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

    var owl2 = $("#owl-demo-2").data('owlCarousel');
    $('#b-noticias-left').on("click", function () {
        owl2.prev();
    })
    $('#b-noticias-right').on("click", function () {
        owl2.next();
    })
    // Fim do Carousel de noticias



    // Carousel de Cursos
    $("#owl-demo-3").owlCarousel({

        autoPlay: true, //Set AutoPlay to 3 seconds

        items : 4,
        slideSpeed : 800,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

    var owl4 = $("#owl-demo-3").data('owlCarousel');
    $('#b-cursos-left').on("click", function () {
        owl4.prev();
    })
    $('#b-cursos-right').on("click", function () {
        owl4.next();
    })
    // Fim do Carousel de Cursos


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







