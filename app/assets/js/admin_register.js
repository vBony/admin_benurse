$( document ).ready(function(){
    var base_url = 'http://localhost/admin_benurse/';

    $('#nome').on('keyup', function(){
        this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g,'');
    });

    $('#nome').on('blur', function(){
        var nome = $( this ).val();
        
        if(nome.length < 6 || nome.indexOf(' ') === -1){
            $(this).removeClass('default-input');
            $(this).addClass('error-input');
            $('.error-msg.name').html('Por favor, digite um nome válido!');
            return;
        }else{
            $(this).removeClass('error-input');
            $(this).addClass('default-input');
            $('.error-msg.name').html('');
            
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

    $('#password').on('blur', function(){
        var password = $(this).val();

        if(password.length < 6){
            $(this).removeClass('default-input');
            $(this).addClass('error-input');
            $('.error-msg.password').html('Por favor, uma senha com, no mínimo, <strong>6 caracteres</strong>!');
            return;
        }else{
            $(this).removeClass('error-input');
            $(this).addClass('default-input');
            $('.error-msg.password').html('');
        }
    })

    $('#se-token').on('blur', function(){
        var setoken = $(this).val();

        if(setoken.length != 32){
            $('#SEinform').hide();
            $(this).removeClass('default-input');
            $(this).addClass('error-input');
            $('.error-msg.setoken').html('Token inválido! Verifique se foi digitado corretamente. Caso contrário, entre em contato com um Super Administrador');
            return;
        }else{
            $('#SEinform').show();
            $(this).removeClass('error-input');
            $(this).addClass('default-input');
            $('.error-msg.setoken').html('');
        }
    });

    $('#form-register').on('submit', function(event){
        event.preventDefault();
        var name = $('#nome').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var setoken = $('#se-token').val();


        //Fazer Validação no front-end
        if(name.length < 6 || name.indexOf(' ') === -1){
            return;
        }else if(email.indexOf('@') === -1 || email.indexOf('.') === -1 || email.length < 13){
            return;
        }else if(password.length < 6){
            return;
        }else if(setoken.length != 32){
            return;
        }else{

            $.ajax({
                method: 'POST',
                url: base_url+'ajax/register',
                data: {name: name, email: email, password: password, setoken: setoken},
                success: function(json){
                    if(json === 'inputerror'){
                        return;
                    }else if(json === 'wrongtoken'){
                        $('#SEinform').hide();
                        $(this).removeClass('default-input');
                        $(this).addClass('error-input');
                        $('.error-msg.setoken').html('Token inválido! Verifique se foi digitado corretamente. Caso contrário, entre em contato com um Super Administrador.');
                        return;
                    }else if(json === 'done'){
                        $('#nome, #email, #password, #se-token').removeClass('default-input');
                        $('#nome, #email, #password, #se-token').addClass('success-input');
                        $('#submit-btn').val('Conta criada, aguarde...');
                        $( "#submit-btn" ).prop( "disabled", true );
                        setInterval(function(){
                            window.location.href = base_url+'admin/login';
                        }, 3000);
                    }else if(json == 'emailexists'){
                        $('#email').removeClass('default-input');
                        $('#email').addClass('error-input');
                        $('.error-msg.email').html('Já existe uma conta registrada com esse email!');
                    }
                }
            })

        }   
    });
});