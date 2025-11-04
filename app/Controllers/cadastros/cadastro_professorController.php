<?php
require_once __DIR__ . '/../../Config/config.php';

$base_path = '/UniCuritiba/Projetos/IC_HealthConnect/HealthConnect_Campus/'; 

if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha']; 
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nivel = $_POST['nivel'];

    if (!empty($nome) && !empty($cpf) && !empty($senha) && !empty($email) && !empty($telefone) && !empty($nivel)) {
        
        $query = "INSERT INTO professor (nome, cpf, senha, email, telefone, nivel) 
                  VALUES ('$nome', '$cpf', '$senha', '$email', '$telefone', '$nivel')";
        $result = mysqli_query($con, $query);

        if ($result) {
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