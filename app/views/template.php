<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Administrador 🛠 | Sou enfermagem</title>
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/template.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/<?=$js?>"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/template.css">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/<?=$css?>">
    <link rel="sortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon" />

</head>

<body>
    <div id="header">
        <div id="logo-area"><img src="<?=BASE_URL?>app/assets/images/logo_header.png" srcset=""></div>
        <div id="user-stats-area">
            <div id="user-name"><?=$firstName?></div>
            <div id="arrow" class="down"></div>
        </div>
    </div>


    <div id="window-user">
        <div class='row_window-user' id="editperfil">
            <img src="<?=BASE_URL?>app/assets/images/editar.png" alt=""> 
            <span>Editar meu perfil</span>
        </div>
        <div class='row_window-user' id="sair_header_menu">
            <img src="<?=BASE_URL?>app/assets/images/sair.png" alt="">
            <span> Sair </span>
        </div>
    </div>

    <?php $this->loadViewInTemplate($viewName, $viewData) ?>
</body>
</html>