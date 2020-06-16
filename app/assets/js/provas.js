$(document).ready(function () {
    var base_url = 'http://localhost/admin_benurse/'



    // LIMPANDO OS CAMPOS
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

    $('#input-criar-materia').on('focus', function(){
        $(this).removeClass('input-error');
        $('.msg-error.nomeprova').text('');
    });





    // LISTA DOS ULTIMAS QUESTÕES ADICIONADAS
    $('.btn.btn-danger').on('click', function(){
        var id_question = $(this).attr('data-id');

        $('.background-alert.delete').css('display', 'flex');
        $('.box-alert-delete-btn').attr('data-id', id_question);
    });

    $('.box-alert-nodelete-btn').on('click', function(){
        $('.background-alert.delete').fadeOut('fast');
    });

    $('.box-alert-delete-btn').on('click', function(){
        var id_question = $(this).attr('data-id');
        if(id_question === ''){
            $('.background-alert.delete').fadeOut('fast');
            $('.background-alert.error').fadeOut('fast');
        }else{
            $.ajax({
                method: 'POST',
                url: base_url+'ajax/provas',
                dataType: 'json',
                data: {action: 'delete_question', id_question: id_question},
                success: function(json){
                    if(json.msg === 'success'){
                        $('.background-alert.delete').fadeOut('fast');
                        document.location.reload();
                    }
                }
            })
        }
    });

    $('.close-btn-header-box.vereditar').on('click', function(){
        $('.background-alert.vereditar').fadeOut('fast');
    });

    $('.btn.btn-primary').on('click', function(){
        var id_question = $(this).attr('data-id');
        
        if(id_question === ''){
            $('.background-alert.vereditar').fadeOut('fast');
        }else{
            $.ajax({
                method: 'POST',
                url: base_url+'ajax/provas',
                dataType: 'json',
                data: {action: 'get_question', id_question: id_question},
                success: function(json){
                    var first_name = json.first_name;
                    var prova_name = json.prova_name;
                    var questao = json.question_text;
                    var right_option = json.right_option;
                    var options = [json.o1, json.o2, json.o3, json.o4];
                    var date = json.date;
                    

                    $('.background-alert.vereditar').css('display', 'flex');
                    $('.data-vereditar.first-name').text(first_name);
                    $('.data-vereditar.prova-name').text(prova_name);
                    $('.data-vereditar.date').text(date);
                    $('.cqv').html(questao);
                    $('.alternativa.1').text(options[0]);
                    $('.alternativa.2').text(options[1]);
                    $('.alternativa.3').text(options[2]);
                    $('.alternativa.4').text(options[3]);
                    $('.alternativa.correta').text(right_option);
                    
                }
            });
        }
    });




    $('input[type=radio]').change(function() {
        $('input[type=radio]:checked').not(this).prop('checked', false);
    });

    $('.box-alert-close-btn').on('click', function(){
        $('.background-alert.error').fadeOut('fast');
    });

    $('#form-questao').on('submit', function(event){
        event.preventDefault();
        var id_prova = $('#materias-select').val();
        var questao = $('#text-area-questao').val();
        var alt1 = $('#alt1').val();
        var alt2 = $('#alt2').val();
        var alt3 = $('#alt3').val();
        var alt4 = $('#alt4').val();
        var right_alt_id = $('input[name=radio-alternativa-correta]:checked', '#form-questao').val()
        var right_alt = $('#alt'+right_alt_id).val();
        
        if(id_prova === '0'){
            $('#materias-select').addClass('input-error');
            $('.msg-error.materias').text('Escolha uma materia')
        }else if(questao === '' || questao.length < 20){
            $('.background-alert.error').css('display', 'flex');
            $('.background-alert.error').fadeIn('fast');
            $('.box-alert-text').text('Você precisa digitar uma questão!');
            
        }else if(alt1 === '' || alt2 === '' || alt3 === '' || alt4 === ''){
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
                    id_prova: id_prova,
                    questao: questao, 
                    alt1: alt1,
                    alt2: alt2,
                    alt3: alt3,
                    alt4: alt4,
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

    $('#add-new-materia').on('click', function(){
        $('.background-alert.criarmateria').css('display', 'flex');
    });

    $('.close-btn-header-box.criarmateria').on('click', function(){
        $('.background-alert.criarmateria').fadeOut('fast');
    });

    $('#form-prova').on('submit', function(event){
        event.preventDefault();
        var esp = $('#select-esp-box').val()
        var prova_name = $('#input-criar-materia').val();

        if(prova_name === ""){
            $('#input-criar-materia').addClass('input-error');
            $('.msg-error.nomeprova').text("Digite um nome válido")
        }else{
            $.ajax({
                method: 'POST',
                url: base_url+'ajax/provas',
                dataType: 'json',
                data: {action: 'criar_prova', esp_id: esp, prova_name: prova_name},
                success: function(json){
                    if(json.msg === 'name-exists'){
                        $('#input-criar-materia').addClass('input-error');
                        $('.msg-error.nomeprova').text('Já existe uma prova com este nome, por favor tente outro!')
                    }else if(json.msg === 'success'){
                        $('.background-alert.criarmateria').fadeOut('fast');
                        document.location.reload();
                    }
                }
            });
        }
    });
});