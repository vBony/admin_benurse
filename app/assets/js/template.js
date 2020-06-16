$( document ).ready(function(){
    var base_url = 'http://localhost/admin_benurse/';

    $('#logo-area').on('click', function(){
        document.location.href = base_url;
    });

    $('#user-stats-area').on('click', function(){
        if($('#arrow').hasClass('down')){
            $('#arrow').removeClass('down');
            $('#arrow').addClass('up');
        }else{
            $('#arrow').addClass('down');
            $('#arrow').removeClass('up');
        }
        $('#window-user').slideToggle('fast');
    });

    $('#sair_header_menu').on('click', function(){
        document.location.href = base_url+'logout';
    });

    $('#BN-token-menu').on('click', function(){
        $('.background-window.bn-token').css('display', 'flex');
    });

    $('#fechar-btn').on('click', function(){
        $('.background-window.bn-token').fadeOut('fast');
    });
});