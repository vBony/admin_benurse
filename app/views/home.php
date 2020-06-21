    <div id="title-page">
        benurse - Área do administrador
    </div>
    
    <div id="statistc-area">
        <div class="row justify-content-around" id="statisc-invisible">
            <div class="col-md-6 col-lg-3 col-xlg-3 marginbox">
                <div class="card-dashboard users">
                    <div class="box1">
                        <div class="title-dashboard users">Usuários Cadastrados</div>
                        <div class="data-dashboard users"><?=$count_users['contagem'];?></div>
                    </div>

                    <div class="box2">
                        <img src="<?=BASE_URL?>app/assets/images/user-card.png" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xlg-3  marginbox">
                <div class="card-dashboard empresas">
                    <div class="box1">
                        <div class="title-dashboard empresas">Empresas Cadastradas</div>
                        <div class="data-dashboard empresas">0</div>
                    </div>

                    <div class="box2">
                        <img src="<?=BASE_URL?>app/assets/images/empresa-card.png" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xlg-3  marginbox">
                <div class="card-dashboard ganhos">
                    <div class="box1">
                        <div class="title-dashboard ganhos">Ganhos do mês ($mes)</div>
                        <div class="data-dashboard ganhos">$0</div>
                    </div>

                    <div class="box2">
                        <img src="<?=BASE_URL?>app/assets/images/cifrao-card.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="menu-area">
        <div class="row justify-content-around" id="menu-area-inv">
            <div class="col-md-6 col-lg-3 col-xlg-3 marginbox">
                <div class="menu-card" id="provas-btn">
                    <div class="title-menu-card">Provas</div>
                    <div class="img-menu-card provas"><img src="<?=BASE_URL?>app/assets/images/provas-menu.png" alt=""></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xlg-3 marginbox">
                <div class="menu-card">
                    <div class="title-menu-card">Usuários</div>
                    <div class="img-menu-card"><img src="<?=BASE_URL?>app/assets/images/user-menu.png" alt=""></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-xlg-3 marginbox">
                <div class="menu-card">
                    <div class="title-menu-card">Empresas</div>
                    <div class="img-menu-card"><img src="<?=BASE_URL?>app/assets/images/empresa-menu.png" alt=""></div>
                </div>
            </div>
        </div>

            
    </div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- 
    PROVAS
        { 
        Criar questoes,
        cditar ultimas questoes
        excluir ultimas questoes
        ver prova de acordo com o curso superior
            
            editar questoes dessa prova
        }

        


        
 -->