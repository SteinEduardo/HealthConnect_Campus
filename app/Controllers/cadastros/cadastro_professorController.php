<?php
// 1. CORREÇÃO DA INCLUSÃO: Sobe 2 níveis (de 'cadastros/' para 'app/') e desce para 'Config/'
require_once __DIR__ . '/../../Config/config.php';

// NOVO: Define a URL base da sua aplicação (AJUSTE SE O CAMINHO MUDAR)
// Baseado na sua URL: http://localhost/IC/HealthConnect_Campus/
$base_path = '/IC/HealthConnect_Campus/'; 

// Solicita informações de cadastro e registra no banco
if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha']; // Alerta de Segurança: Senha em texto puro
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nivel = $_POST['nivel'];

    // Validar se todos os campos estão preenchidos
    if (!empty($nome) && !empty($cpf) && !empty($senha) && !empty($email) && !empty($telefone) && !empty($nivel)) {
        
        // ALERTA DE SEGURANÇA: Esta query ainda está vulnerável a SQL Injection.
        $query = "INSERT INTO professor (nome, cpf, senha, email, telefone, nivel) 
                  VALUES ('$nome', '$cpf', '$senha', '$email', '$telefone', '$nivel')";
        $result = mysqli_query($con, $query);

        // Verifica se o cadastro foi bem-sucedido
        if ($result) {
            // 2. CORREÇÃO CRÍTICA DO REDIRECIONAMENTO: Usa a URL base do servidor
            header("Location: {$base_path}views/menu/menu_adm.php"); 
            exit();
        } else {
            echo "<script>alert('Erro ao cadastrar professor: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}
?>