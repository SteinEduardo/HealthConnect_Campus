<?php
session_start();

// Este arquivo DEVE APENAS verificar se a sessão de login existe.
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}
// Note: O código de verificação de nível (ADM) foi mantido como comentário
// para que você possa ativá-lo depois, se necessário.
?>