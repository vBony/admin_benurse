<script src="https://cdn.tiny.cloud/1/agc4ox6734xa9pa5z85uzdkab679s2k91q91j1t11smg803x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#text-area-questao',
        heigth: '100%',
        mobile: {
            menubar: true,
            plugins: [ 'autosave', 'lists', 'autolink' ],
            toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
        }
    });
</script>



<div id="row-title">benurse - Provas</div>

<div class="box-app">
    <div id="up-title-area">
        <div id="up-title">Últimas questões adicionadas</div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="tabela">
            <thead>
                <tr>
                <th scope="col" class="th-title" >#</th>
                <th scope="col" class="th-title" >Prova</th>
                <th scope="col" class="th-title" >Autor</th>
                <th scope="col" class="th-title" id="data-tabela">Data</th>
                <th scope="col" class="th-title th-lg">Ação</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($last_questoes as $dados){?>
                    <tr>
                        <th scope="row"><?=$dados['id_question']?></th>
                        <td><?=$dados['prova_name']?></td>
                        <td><?=$dados['first_name']?></td>
                        <td><?=$dados['date']?></td>
                        <td id="aca-tabela">
                        <div id="list-btn-area">
                            <button type="button" class="btn btn-primary btn-sm" id="btn-ver" data-id="<?=$dados['id_question']?>">Ver</button>
                            <button type="button" class="btn btn-danger btn-sm" id="btn-exc" data-id="<?=$dados['id_question']?>" class="delete_last_question">Excluir</button>
                        </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<div class="box-app">
    <div class="default-title">Criar uma nova questão</div>
    <div id="text-questoes">
        O padrão de questões é de múltipla escolha de A-E, por isso preencha
        todos os campos com ortografia correta e marque no campo ao lado das questões
        apenas uma opção correta.
    </div>

    <form method="post" id='form-questao'>
        <div class="input-group">
            <div class="default-label materia">Prova <div id="add-new-materia"><p>Criar uma Prova</p></div></div>
            

            <select name="materias" id="materias-select">
                <option value="0">Nenhuma selecionada</option>
                <?php foreach($provas as $dados){?>
                    <option value="<?=$dados['id']?>"><?=$dados['prova_name']?></option>
                <?php } ?>
            </select>
            <div class="msg-error materias"></div>
        </div>

        <div class="input-group text-area">
            <div class="default-label">Questão</div>
            <textarea name="questao" id="text-area-questao" cols="30" rows="10" placeholder='Digite aqui a questão'></textarea>
            <div class="msg-error questao"></div>
        </div>

        <div class="input-group">
            <div class="default-label">Alternativas</div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "A"</div>
                <input type="text" name="alt1" id="alt1" class="input-alt" autocomplete="off" data-id="1">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="1">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "B"</div>
                <input type="text" name="alt2" id="alt2" class="input-alt" autocomplete="off" data-id="2">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="2">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "C"</div>
                <input type="text" name="alt3" id="alt3" class="input-alt" autocomplete="off" data-id="3">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="3">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "D"</div>
                <input type="text" name="alt4" id="alt4" class="input-alt" autocomplete="off" data-id="4">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="4">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <input type="submit" value="Enviar" id="btn-enviar-questao">
        </div>
    </form>
    <div id="teste"></div>
</div>


<!-- MODAL'S DA APLICAÇÃO -->

<!-- Modals de erro ou success-->
<div class="background-alert error">
    <div class="box-alert">
        <div class="box-alert-area">
        <div class="box-alert-title">Erro:</div>
            <div class="box-alert-text"></div>
            
        </div>
        <button class="box-alert-close-btn">Fechar</button>
    </div>
</div>

<div class="background-alert success">
    <div class="box-alert success">
        <div class="box-alert-area">
            <div class="box-alert-text"></div>
            
        </div>
        <button class="box-alert-close-btn success">Fechar</button>
    </div>
</div>

<div class="background-alert delete">
    <div class="box-alert">
        <div class="box-alert-area">
        <div class="box-alert-title">Deletar:</div>
            <div class="box-alert-text">Tem certeza que deseja deletar essa questão?</div>
            
        </div>
        <div class="btn-area-delete">
        <button class="box-alert-delete-btn" data-id="">Sim</button>
        <button class="box-alert-nodelete-btn">Não</button>
        </div>
    </div>
</div>

<div class="background-alert success">
    <div class="box-alert success">
        <div class="box-alert-area">
            <div class="box-alert-text"></div>
            
        </div>
        <button class="box-alert-close-btn success">Fechar</button>
    </div>
</div>



<!-- Modals de edição -->
<div class="background-alert criarmateria">
    <div class="box-default">
        <div class="header-box">
            <div class="title-header-box">Criar matéria</div>
            <div class="close-btn-header-box criarmateria"></div>
        </div>

        <div class="body-box">
            <form method="post" id="form-prova">
                <div class="input-group-box">
                    <div class="label-box">Essa prova é para alguma especialização?</div>
                    <select name="especializacao_prova" id="select-esp-box" class="">
                        <option value="0">Não</option>
                        <?php foreach($especialties as $dados) {?>
                            <option value="<?=$dados['esp_id'];?>"><?=$dados['esp_id']?> - <?=$dados['esp_name'];?></option>
                        <?php } ?>
                    </select>
                    <div class="msg-error selectesp"></div>
                </div>
                
                <div class="input-group-box">
                    <div class="label-box">Nome da Prova</div>
                    <input type="text" name="nome-materia" id="input-criar-materia" class="input-box" autocomplete="off">
                    <div class="msg-error nomeprova"></div>
                </div>
                
                <div class="btn-box-area">
                    <input type="submit" value="Cadastrar Prova" class="submit-btn-box">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="background-alert vereditar">
    <div class="box-default vereditar">
        <div class="header-box vereditar">
            <div class="title-header-box vereditar">Ver questão</div>
            <div class="close-btn-header-box vereditar"></i></div>
        </div>

        <div class="body-box vereditar">
            <form method="post" id="form-vereditar">
                <div class="data-area">
                    <div id="header-area">
                        <div id="box-1-header">
                            <div class="row-data">Autor: <div class="data-vereditar first-name"></div></div>
                            <div class="row-data">Prova: <div class="data-vereditar prova-name"></div></div>
                        </div>
                        <div id="box-2-header">
                            <div class="row-data data">Data: <div class="data-vereditar date"></div></div>
                        </div>
                    </div>

                    <div class="corpo-questao-vereditar-area">
                        <div class="cqv-title">Questão:</div>
                        <div class="cqv">

                        </div>
                        <div class="alt-area 1">
                            <div class="label-alt">a)</div>
                            <div class="alternativa 1"></div>
                        </div>

                        <div class="alt-area 1">
                            <div class="label-alt">b)</div>
                            <div class="alternativa 2"></div>
                        </div>

                        <div class="alt-area 1">
                            <div class="label-alt">c)</div>
                            <div class="alternativa 3"></div>
                        </div>

                        <div class="alt-area 1">
                            <div class="label-alt">d)</div>
                            <div class="alternativa 4"></div>
                        </div>

                        <div class="alt-area correta">
                            <div class="label-alt">Alternativa correta:</div>
                            <div class="alternativa correta">Teste</div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>