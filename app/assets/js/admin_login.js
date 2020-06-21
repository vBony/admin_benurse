$( document ).ready(function(){
      function onClick(e) {
        e.preventDefault();
        
      }

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
        var captcha = grecaptcha.getResponse();

        if(captcha === ''){
            $('.error-msg.captcha').text("Faça o desafio do reCaptcha");
        }else{
            $('.error-msg.captcha').text("");

            if(email.indexOf('@') === -1 || email.indexOf('.') === -1 || email.length < 13){
                return;
            }else if(password.length < 6){
                return;
            }else{
                $.ajax({
                    method: 'POST',
                    url: base_url+'ajax/login',
                    data: {email: email, password: password, captcha: captcha},
                    beforeSend: function () {
                        $('#spinner').show();
                        $('#btn-text').text('Validando');
                    },
                    success: function(json){
                        if(json === 'wronglogin'){
                            $('#email, #password').removeClass('default-input');
                            $('#email, #password').addClass('error-input');
    
                            $('.error-msg.email').html('Email e/ou senha incorreto(s)!');
                            $('#btn-text').text('Entrar');
                            $('#spinner').hide();
                            grecaptcha.reset();
                            
                        }else if(json === 'done'){
                            $('#email, #password').removeClass('default-input');
                            $('#email, #password').addClass('success-input');
                            $('#btn-text').text('Login efetuado! Aguarde...');
                            $('#spinner').show();
                            $( "#submit-btn" ).prop( "disabled", true );
                            setInterval(function(){
                                window.location.href = base_url;
                            }, 3000);
                        }
                    }
                });
            }
        } 

    });
});