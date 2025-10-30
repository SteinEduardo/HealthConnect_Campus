<?php
require_once __DIR__ . '/../app/Controllers/LoginController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <form action="#" method="post">
                <label for="login"><strong>Login</strong></label>
                <input type="email" name="email" placeholder="Digite seu e-mail" class="login-input" required>
                <label for="senha"><strong>Senha</strong></label>
                <input type="password" name="senha" placeholder="Digite sua senha" class="login-input" required>
                <button type="submit" name="botao" value="Entrar" class="login-btn">Entrar</button>
            </form>
        </div>
    </div>
</body>

</html>