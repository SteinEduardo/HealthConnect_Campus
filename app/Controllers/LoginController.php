<?php
require_once __DIR__ . '/../Config/config.php';
session_start();

if (@$_REQUEST['botao'] == "Entrar") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //ADM
    $query_adm = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'";
    $result_adm = mysqli_query($con, $query_adm);
    if ($coluna = mysqli_fetch_array($result_adm)) {
        $_SESSION['id_usuario'] = $coluna['id'];
        $_SESSION['nome'] = $coluna['email'];
        $_SESSION['nivel'] = 'ADM';
        header('Location: ../views/menu/menu_adm.php');
        exit;
    }

    //PROFESSOR
    $query_professor = "SELECT * FROM professor WHERE email = '$email' AND senha = '$senha'";
    $result_professor = mysqli_query($con, $query_professor);
   if ($coluna = mysqli_fetch_array($result_professor)) {
        $_SESSION['id_usuario'] = $coluna['id'];
        $_SESSION['nome'] = $coluna['email'];
        $_SESSION['nivel'] = 'Professor';
        header('Location: ../views/menu/menu_professor.php');
        exit;
    }

    //ALUNO
    $query_aluno = "SELECT * FROM aluno WHERE email = '$email' AND senha = '$senha'";
    $result_aluno = mysqli_query($con, $query_aluno);
   if ($coluna = mysqli_fetch_array($result_aluno)) {
        $_SESSION['id_usuario'] = $coluna['id'];
        $_SESSION['nome'] = $coluna['email'];
        $_SESSION['nivel'] = 'Aluno';
        header('Location: ../views/menu/menu_aluno.php');
        exit;
    }

    echo "<script>alert('Credenciais inválidas.');</script>";
}
?>