<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área do Administrador 🛠 | Sou enfermagem</title>
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/template.js?v=150620"></script>
    <script src="<?=BASE_URL?>app/assets/js/<?=$js?>?v=150620"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/template.css?v=150620">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/<?=$css?>?v=150620">
    <link rel="sortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon" />

</head>

<body>
    <div id="header">
        <div id="logo-area"><img src="<?=BASE_URL?>app/assets/images/logo_header.png" srcset=""></div>
        <div id="user-stats-area">
            <div id="user-name"><?=$adminData['first_name']?></div>
            <div id="arrow" class="down"></div>
        </div>
    </div>


    <div id="window-user">
        <div class='row_window-user' id="editperfil">
            <img src="<?=BASE_URL?>app/assets/images/editar.png" alt=""> 
            <span>Editar meu perfil</span>
        </div>

        <?php if($adminData['admin_hierarchy'] == 'super-admin') { ?>
            <div class='row_window-user' id="BN-token-menu">
                <img src="<?=BASE_URL?>app/assets/images/escudo.png" alt="">
                <span> BN Token </span>
            </div>
        <?php } ?>

        <div class='row_window-user' id="sair_header_menu">
            <img src="<?=BASE_URL?>app/assets/images/sair.png" alt="">
            <span> Sair </span>
        </div>

        
    </div>

    <div class="background-window bn-token">
        <div class="window">
            <div class="title-window">Benurse Token</div>
            <div class="text-window">Utilize este código para registrar novos Administradores. (Muda em 24h)</div>
            <?php if($adminData['admin_hierarchy'] == 'super-admin') { ?>
                <input type="text" name="" id="input-token" disabled='disabled' value="<?=$token['code']?>">
            <?php } ?>
            <button id="fechar-btn">Fechar</button>
        </div>
    </div>

    <?php $this->loadViewInTemplate($viewName, $viewData) ?>
</body>
</html>