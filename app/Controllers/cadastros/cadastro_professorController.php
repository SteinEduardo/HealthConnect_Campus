<?php
include('config.php');

// Solicita informações de cadastro e registra no banco
if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha']; // Senha em texto puro
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nivel = $_POST['nivel'];
    // REMOVIDO: $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Validar se todos os campos estão preenchidos
    if (!empty($nome) && !empty($cpf) && !empty($senha) && !empty($email) && !empty($telefone) && !empty($nivel)) {
        
        // CORREÇÃO DE SCHEMA: Tabela 'professor' (singular) e senha em texto puro
        $query = "INSERT INTO professor (nome, cpf, senha, email, telefone, nivel) 
                      VALUES ('$nome', '$cpf', '$senha', '$email', '$telefone', '$nivel')";
        $result = mysqli_query($con, $query);

        // Verifica se o cadastro foi bem-sucedido
        if ($result) {
            header('Location: menu_adm.php');
            exit();
        } else {
            echo "<script>alert('Erro ao cadastrar professor: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}
// O restante da parte HTML do formulário de cadastro_professor.php fica inalterado
?>