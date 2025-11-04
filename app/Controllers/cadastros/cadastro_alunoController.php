<?php
require_once __DIR__ . '/../../Config/config.php';

// Solicita as informações de cadastro e registra no banco
if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
    $ra = mysqli_real_escape_string($con, $_POST['ra']);
    $senha = $_POST['senha'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefone = mysqli_real_escape_string($con, $_POST['telefone']);
    $professor_email = mysqli_real_escape_string($con, $_POST['professor_email']);

    // Valida se todos os campos foram preenchidos
    if (!empty($nome) && !empty($cpf) && !empty($ra) && !empty($senha) && !empty($email) && !empty($telefone) && !empty($professor_email)) {
        
        // Verifica se o professor existe pelo email
        $professor_query = "SELECT id FROM professor WHERE email = '$professor_email'";
        $professor_result = mysqli_query($con, $professor_query);

        if ($professor_result && mysqli_num_rows($professor_result) > 0) {

            $query = "INSERT INTO aluno (nome, cpf, ra, senha, email, telefone, nivel) 
                      VALUES ('$nome', '$cpf', '$ra', '$senha', '$email', '$telefone', 'Aluno')";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Aluno cadastrado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar aluno: " . mysqli_error($con) . "');</script>";
            }
        } else {
            echo "<script>alert('Professor não encontrado. Verifique o email informado.');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos obrigatórios.');</script>";
    }
}
?>