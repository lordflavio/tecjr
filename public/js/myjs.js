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






