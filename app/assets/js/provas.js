$(document).ready(function () {
    var base_url = 'http://localhost/admin_benurse/'




    $('#text-area-questao').val('');

    $('.box-alert-close-btn.success').on('click', function(){
        document.location.reload(); 
    });

    $('#materias-select').on('click', function(){
        $(this).removeClass('input-error');
        $('.msg-error.materias').text('');
    });

    $('#text-area-questao').on('focus', function(){
        $(this).removeClass('input-error');
        $('.msg-error.questao').text('');
    });

    $('input[type=radio]').change(function() {
        $('input[type=radio]:checked').not(this).prop('checked', false);
    });

    $('.box-alert-close-btn').on('click', function(){
        $('.background-alert.error').fadeOut('fast');
    });

    $('#add-new-materia').on('click', function(){
        $('.background-alert.error').css('display', 'flex');
        $('.background-alert.error').show();
    });

    $('#text-area-questao').on('blur', function(){
        
    });

    $('#form-questao').on('submit', function(event){
        event.preventDefault();
        var materia = $('#materias-select').val();
        var questao = $('#text-area-questao').val();
        var alt1 = $('#alt1').val();
        var alt2 = $('#alt2').val();
        var alt3 = $('#alt3').val();
        var alt4 = $('#alt4').val();
        var alt5 = $('#alt5').val();
        var right_alt = $('input[name=radio-alternativa-correta]:checked', '#form-questao').val()
        if(materia === '0'){
            $('#materias-select').addClass('input-error');
            $('.msg-error.materias').text('Escolha uma materia')
        }else if(questao === '' || questao.length < 20){
            $('#text-area-questao').addClass('input-error');
            $('.msg-error.questao').text('Você precisa digitar uma questão')
        }else if(alt1 === '' || alt2 === '' || alt3 === '' || alt4 === '' || alt5 === ''){
            $('.background-alert.error').css('display', 'flex');
            $('.background-alert.error').fadeIn('fast');
            $('.box-alert-text').text('Você deve preencher todas as alternativas!');
        }else if(right_alt === undefined){
            $('.background-alert.error').css('display', 'flex');
            $('.background-alert.error').fadeIn('fast');
            $('.box-alert-text').text('Você deve definir uma alternativa correta!');
        }else{
            $.ajax({
                method: 'POST',
                url: base_url+'ajax/provas',
                dataType: 'json',
                data: {
                    materia: materia,
                    questao: questao, 
                    alt1: alt1,
                    alt2: alt2,
                    alt3: alt3,
                    alt4: alt4,
                    alt5: alt5,
                    right_alt: right_alt
                },
                success: function(json){
                    if(json.msg === "success"){
                        $('.background-alert.success').css('display', 'flex');
                        $('.background-alert.success').fadeIn('fast');
                        $('.box-alert-text').text('Questão criada com sucesso!');
                    }else{
                        alert('ops');
                    }
                }
            });
        }
    });
});