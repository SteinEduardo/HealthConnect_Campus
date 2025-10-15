<?php
require_once __DIR__ . '/../../Config/config.php';

if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {
    $email = $_POST['email'];
    $senha = $_POST['senha']; // Senha em texto puro (para ambiente de teste)
    $nivel = $_POST['nivel'];

    if (!empty($email) && !empty($senha) && !empty($nivel)) {
        
        // CORREÇÃO DE SCHEMA: Usa a senha em texto puro ($senha) na query
        $query = "INSERT INTO adm (email, senha, nivel) 
                  VALUES ('$email', '$senha', '$nivel')";
        
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Administrador cadastrado com sucesso!');</script>";
            echo "<script>window.location.href='menu_adm.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar administrador: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}
?>