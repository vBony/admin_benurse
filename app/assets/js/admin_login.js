$( document ).ready(function(){
    var base_url = 'http://localhost/admin_benurse/';

    $('#email').on('keyup', function(){
        var email = $( this ).val();

        if(email.indexOf('@') === -1 || email.indexOf('.') === -1 || email.length < 13){
            $(this).removeClass('default-input');
            $(this).addClass('error-input');
            $('.error-msg.email').html('Por favor, digite um email válido!');
            return;
        }else{
            $(this).removeClass('error-input');
            $(this).addClass('default-input');
            $('.error-msg.email').html('');
        }
    });

    $('#email').on('blur', function(){
        var email = $( this ).val();

        if(email.indexOf('@') === -1 || email.indexOf('.') === -1 || email.length < 13){
            $(this).removeClass('default-input');
            $(this).addClass('error-input');
            $('.error-msg.email').html('Por favor, digite um email válido!');
            return;
        }else{
            $(this).removeClass('error-input');
            $(this).addClass('default-input');
            $('.error-msg.email').html('');

        }
    });

    $('#form-login').on('submit', function(event){
        event.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        if(email.indexOf('@') === -1 || email.indexOf('.') === -1 || email.length < 13){
            return;
        }else if(password.length < 6){
            return;
        }else{
            $.ajax({
                method: 'POST',
                url: base_url+'ajax/login',
                data: {email: email, password: password},
                success: function(json){
                    if(json === 'wronglogin'){
                        $('#email, #password').removeClass('default-input');
                        $('#email, #password').addClass('error-input');

                        $('.error-msg.email').html('Email e/ou senha incorreto(s)!')
                    }else if(json === 'done'){
                        $('#email, #password').removeClass('default-input');
                        $('#email, #password').addClass('success-input');
                        $('#submit-btn').val('Login efetuado! Aguarde...');
                        $( "#submit-btn" ).prop( "disabled", true );
                        setInterval(function(){
                            window.location.href = base_url;
                        }, 3000);
                    }
                }
            });
        }

    });
});