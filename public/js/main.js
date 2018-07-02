$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//effet de scroll vertical
$(window).scroll(function () {
    if ($('.navbar').offset().top > 90)
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    else
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
});

$(function () {
    $('.page-scroll a').bind('click', function () {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    })
});

//fin

//effet de rotation du formulaire de connexion et d'inscription
$("#sign").on('click', function (e){
    e.preventDefault();
    $(".groupe_form").css("transform", "rotateY(180deg)")
});

$("#retour").on('click', function (e){
    e.preventDefault();
    $(".groupe_form").css("transform", "rotateY(360deg)")
});

//fin

//fonction ajax des differents formulaires


$('#post_form').on('submit', function (e){
    e.preventDefault();
    var form = $(this);

    $.post(form.attr('action'), form.serializeArray())
        .done(function(data, text, jqXHR) {
            var tr = $(jqXHR.responseText);
            if ( typeof(tr) !== 'undefined'){
                $('#commantaire').prepend(tr);
                form.find('textarea').val('');
                tr.hide().fadeIn();
            }
            else
                alert("Erreur lors de l'insertion");
        })
        .fail(function(jqxhr){
            alert("Erreur lors de l'evoi du formulaire");
            console.log(jqxhr.responseText);
        })
        .always(function(){
            var $con = form.find('input').attr('type');
            if ($con === 'submit'){
                $con.val('Envoyer');
            }
        })
});

$('#register').on('submit', function (e){

    e.preventDefault();
    $('input+small').text('');
    $('input').parent().removeClass('has-error');
    var form = $(this);
    $.post({
        url: form.attr('action'),
        data : form.serializeArray(),
        dataType: "json"
    })
        .done(function(data) {
            $('#myModal').modal('hide');
        })
        .fail(function(data){
            $.each(data.responseJSON, function (key, value) {
                var input = '#register input[name=' + key + ']';
                $(input + '+small').text(value);
                $(input).parent().addClass('has-error');
            });
        })
});

//fin

