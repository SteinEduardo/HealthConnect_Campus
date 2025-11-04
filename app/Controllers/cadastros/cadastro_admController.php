<?php
// Arquivo: app/Controllers/cadastros/cadastro_alunoController.php

require_once __DIR__ . '/../../Config/config.php';

// Define a URL base para que o redirecionamento funcione - Ajuste conforme seu ambiente
$base_path = '/UniCuritiba/Projetos/IC_HealthConnect/HealthConnect_Campus/'; 

if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {
    
    // Coleta todas as variáveis do formulário (incluindo o novo campo)
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $ra = $_POST['ra'];
    $senha = $_POST['senha']; // Senha em texto puro
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nivel = $_POST['nivel'];
    $genero = $_POST['genero'] ?? null;
    $professor_email = $_POST['professor_email']; 

    //Validação
    if (!empty($nome) && !empty($cpf) && !empty($ra) && !empty($senha) && !empty($email) && !empty($telefone)) {
        
        $query = "INSERT INTO aluno (nome, cpf, ra, senha, email, telefone, nivel) 
                  VALUES ('$nome', '$cpf', '$ra', '$senha', '$email', '$telefone', '$nivel')";
        
        $result = mysqli_query($con, $query);

        //Lógica de Redirecionamento
        if ($result) {
            echo "<script>alert('Aluno cadastrado com sucesso!');</script>";
            // Redireciona para o menu principal
            echo "<script>window.location.href='{$base_path}views/menu/menu_adm.php';</script>";
            exit;
        } else {
            echo "<script>alert('Erro ao cadastrar aluno: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}
?>