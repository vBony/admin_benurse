<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sou Enfermagem - Login como administrador 🛠</title>
    <script src="<?=BASE_URL?>app/assets/js/jquery.js"></script>
    <script src="<?=BASE_URL?>app/assets/js/admin_login.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/admin_login.css">
    <link rel="sortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon" />
</head>
<body>
    <div id='logo_header_area'><img src="<?=BASE_URL?>app/assets/images/logo_header.png" alt=""></div>
    <div id="title_header">Login como Administrador</div>

    <form method="post" id="form-login">
        <input type="email" name="email" class="default-input" placeholder="Email" id="email">
        <div class="error-msg email"></div>
        <input type="password" name="password" class="default-input" placeholder="Senha" id="password">
        <div class="error-msg password"></div>
        <input type="submit" value="Entrar" id="submit-btn">
        <a href="<?=BASE_URL?>admin/register" id="login-link">Registrar-se</a>
    </form>
</body>
</html>