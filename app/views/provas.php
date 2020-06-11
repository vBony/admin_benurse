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
            <th scope="col" class="th-title" >Corpo</th>
            <th scope="col" class="th-title" >Data</th>
            <th scope="col" class="th-title" >Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Lore Ipsum</td>
            <td>Lore Ipsum</td>
            <td>Lore Ipsum</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Lore Ipsum</td>
            <td>Lore Ipsum</td>
            <td>Lore Ipsum</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Lore Ipsum</td>
            <td>Lore Ipsum</td>
            <td>Lore Ipsum</td>
            </tr>
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
        </div>

        <div class="input-group">
            <div class="default-label">Questão</div>
            <textarea name="questao" id="text-area-questao" cols="30" rows="10">

            </textarea>
        </div>

        <div class="input-group">
            <div class="default-label">Alternativas</div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "A"</div>
                <input type="text" name="altA">
                <div>
                    <input type="radio" name="radioA" class="ratios-alt">
                    <span><strong>Opção correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "B"</div>
                <input type="text" name="altB">
                <div>
                    <input type="radio" name="oid" class="ratios-alt">
                    <span><strong>Opção correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "C"</div>
                <input type="text" name="altC">
                <div>
                    <input type="radio" name="oid" class="ratios-alt">
                    <span><strong>Opção correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "D"</div>
                <input type="text" name="altD">
                <div>
                    <input type="radio" name="oid" class="ratios-alt">
                    <span><strong>Opção correta</strong></span>
                </div>
            </div>

            <div class="group-alternativas">
                <div class="label-alternativas">Alt. "E"</div>
                <input type="text" name="altE">
                <div>
                    <input type="radio" name="oid" class="ratios-alt">
                    <span><strong>Opção correta</strong></span>
                </div>
            </div>
        </div>
    </form>
</div>