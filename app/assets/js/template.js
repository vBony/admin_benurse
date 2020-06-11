$( document ).ready(function(){
    var base_url = 'http://localhost/adminsouenfermagem/';

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
});