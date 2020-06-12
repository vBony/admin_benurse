<script src="https://cdn.tiny.cloud/1/agc4ox6734xa9pa5z85uzdkab679s2k91q91j1t11smg803x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src='https://cdn.tiny.cloud/1/agc4ox6734xa9pa5z85uzdkab679s2k91q91j1t11smg803x/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#text-area-questao'
    });
</script>



<div id="row-title">benurse - Provas</div>

<div class="box-app">
    <div id="up-title-area">
        <div id="up-title">Últimas questões adicionadas</div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col" class="th-title" >#</th>
            <th scope="col" class="th-title" >Matéria</th>
            <th scope="col" class="th-title" >Autor</th>
            <th scope="col" class="th-title" >Data</th>
            <th scope="col" class="th-title" >Ação</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($last_questoes as $dados){?>
                <tr>
                    <th scope="row"><?=$dados['id_question']?></th>
                    <td><?=$dados['materia']?></td>
                    <td><?=$dados['first_name']?></td>
                    <td><?=$dados['date']?></td>
                    <td>
                    <button type="button" class="btn btn-primary">Ver mais</button>
                    <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
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
            <div class="default-label materia">Matéria <span id="add-new-materia">Criar uma nova matéria</span></div>
            

            <select name="materias" id="materias-select">
                <option value="0">Nenhuma selecionada</option>
                <?php foreach($materias as $dados){?>
                    <option value="<?=$dados['id']?>"><?=$dados['materia']?></option>
                <?php } ?>
            </select>
            <div class="msg-error materias"></div>
        </div>

        <div class="input-group">
            <div class="default-label">Questão</div>
            <textarea name="questao" id="text-area-questao" cols="30" rows="10" placeholder='Digite aqui a questão'></textarea>
            <div class="msg-error questao"></div>
        </div>

        <div class="input-group">
            <div class="default-label">Alternativas</div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "A"</div>
                <input type="text" name="alt1" id="alt1" class="input-alt">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="1">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "B"</div>
                <input type="text" name="alt2" id="alt2" class="input-alt">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="2">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "C"</div>
                <input type="text" name="alt3" id="alt3" class="input-alt">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="3">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "D"</div>
                <input type="text" name="alt4" id="alt4" class="input-alt">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="4">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "E"</div>
                <input type="text" name="alt5" id="alt5" class="input-alt">
                <div>
                    <input type="radio" name="radio-alternativa-correta" class="ratios-alt" value="5">
                    <span><strong>Alternativa correta</strong></span>
                </div>
            </div>

            <input type="submit" value="Enviar" id="btn-enviar-questao">
        </div>
    </form>
    <div id="teste"></div>
</div>


<!-- MODAL'S DA APLICAÇÃO -->

<!-- Modal opção correta não selecionada -->
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

