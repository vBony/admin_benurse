<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sou Enfermagem - Login como administrador 🛠</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="<?=BASE_URL?>app/assets/js/jquery.js?v=150620"></script>
    <script src="<?=BASE_URL?>app/assets/js/admin_login.js?v=21062020"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASE_URL?>app/assets/css/admin_login.css?v=21062020">
    <link rel="sortcut icon" href="<?=BASE_URL?>app/assets/images/logo.jpg" type="image/x-icon" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
    <div id='logo_header_area'><img src="<?=BASE_URL?>app/assets/images/logo_header.png" alt=""></div>
    <div id="title_header">Login como Administrador</div>


    <form method="post" id="form-login">
        <input type="email" name="email" class="default-input" placeholder="Email" id="email">
        <div class="error-msg email"></div>
        <input type="password" name="password" class="default-input" placeholder="Senha" id="password">
        <div class="error-msg password"></div>

        <div class="g-recaptcha" data-sitekey="6LcfracZAAAAAEUL6ueYH6reZiz9Kbi0wnCFbIKM" id="captcha"></div>
        <div class="error-msg captcha"></div>

        <button type="submit" id="submit-btn">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
            <span class="sr-only">Loading...</span>
            <span id="btn-text">Entrar</span>
        </button>
        
        <a href="<?=BASE_URL?>admin/register" id="login-link">Registrar-se</a>
    </form>
</body>
</html>