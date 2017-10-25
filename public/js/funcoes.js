(function (window) {
    document.getElementById("defaultOpen").click();//ABRI AUTOMATICO A TABS




})(window);

//RELOGIO DA INDEX
function makeTimer() {

    var jdate = JSON.parse($('#inicio').html());

    var endTime = (Date.parse(jdate)) / 1000;

    var now = new Date();
    var now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") { hours = "0" + hours; }
    if (minutes < "10") { minutes = "0" + minutes; }
    if (seconds < "10") { seconds = "0" + seconds; }

    $("#days").html(days + "<span>Dias</span>");
    $("#hours").html(hours + "<span>Horas</span>");
    $("#minutes").html(minutes + "<span>Minutos</span>");
    $("#seconds").html(seconds + "<span>Segundos</span>");

}
setInterval(function() { makeTimer(); }, 1000);


// ABRIR TABS DE PROGRAMAÇÃO
function openTab(evt, dia) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(dia).style.display = "block";
    evt.currentTarget.className += " active";
}

// $('.nav li').click(function() {
//     $('li.active').removeClass("active");
//     $(this).addClass("active");
// });




// LINKANDO PARA O INICIO DA PAGINA
$('#back-to-top').click(function () {
    $('#back-to-top').tooltip('hide');
    $('body,html').animate({
        scrollTop: 0
    }, 800);
    return false;
});
// $('#back-to-top').tooltip('show');
//-----------------------------------------

//TOOTIPE PARA A HOME
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});



