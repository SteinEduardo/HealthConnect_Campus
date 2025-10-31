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

<body class="login-bg">

    <div class="login-card">
        <!--HEADER-->
        <div class="login-header">
            <div style="display: flex; align-items:center; justify-content: center; ">
                <span style="font-size: 1.875rem; font-weight: bold; color: #06b6d4; margin-right: 8px;">Health Connect</span>
                <h1>Anima</h1>
            </div>
        </div>
        <p style="font-size: 1.25rem; color: #4b5563; font-weight: 600; margin-top: 1rem;">Bem vindo (a) de volta!</p>
        <p style="font-size: 0.875rem; color: #6b7280;">Acesse sua conta para continuar</p>
        <!--HEADER FINAL-->


        <form action="#" method="post">
            <!--E-MAIL-->
            <div class="input-group">
                <label for="email" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 4px;">
                    E-mail:
                </label>
                <div>
                    <input type="email" id="email" name="email" required placeholder="seu.usuario@healthconnect.com" class="input-field">
                </div>
            </div>

            <!--SENHA-->
            <div>
                <label for="password" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 4px;">Senha</label>
                <div>
                    <input type="password" id="password" name="senha" required placeholder="********"class="input-field">
                </div>
            </div>

            <!--BTN ENTRAR-->
            <button type="submit" name="botao" value="Entrar" id="login-button">
                <span id="button-text">Entrar</span>
            </button>

            <!--ESQUECEU SENHA-->
            <div style="margin-top: 1.5rem; text-align: center; font-size: 0.875rem;">
                <a href="#" style="color: #2563eb; text-decoration: none;">Esqueceu sua senha?</a>
            </div>
        </form>
    </div>

</body>

</html>