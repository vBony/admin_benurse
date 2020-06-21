<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sou enfermagem - Cadastrar Administrador 🛠</title>
    <link rel="sortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon" />
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/admin_register.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <script src="<?=BASE_URL?>app/assets/js/admin_register.js"></script>
</head>
<body>
    <div id='logo_header_area'><img src="<?=BASE_URL?>app/assets/images/logo_header.png" alt=""></div>
    <div id="title_header">Crie uma conta de administrador</div>

    <form method="post" id="form-register">
        <input type="text" name="name" class="default-input" placeholder="Nome" id="nome">
        <div class="error-msg name"></div>
        <input type="email" name="email" class="default-input" placeholder="Email" id="email">
        <div class="error-msg email"></div>
        <input type="password" name="password" class="default-input" placeholder="Senha" id="password">
        <div class="error-msg password"></div>
        <input type="text" name="setoken" class="default-input" placeholder="BN Token" id="se-token">
        <div class="error-msg setoken"></div>
        <div id="SEinform">Caso não possua um <i>Benurse Token</i>, você deverá entrar em contato com um Super Administrador.</div>
        <input type="submit" value="Registrar" id="submit-btn">
        <a href="<?=BASE_URL?>admin/login" id="login-link">Já sou Administrador</a>
    </form>
</body>
</html>