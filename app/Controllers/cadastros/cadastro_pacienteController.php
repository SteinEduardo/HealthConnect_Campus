<?php
require_once __DIR__ . '/../../Config/config.php';

if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {
    $data_abertura = $_POST['data_abertura'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $contato_emergencia = $_POST['contato_emergencia'];
    $escolaridade = $_POST['escolaridade'];
    $ocupacao = $_POST['ocupacao'];
    $necessidade = $_POST['necessidade'];
    $estagiario = $_POST['estagiario'];
    $orientador = $_POST['orientador'];
    //$ra = $_POST['ra'];

    // Valida se todos os campos obrigatórios foram preenchidos
    if (
        !empty($data_abertura) && !empty($nome) && !empty($data_nascimento) &&
        !empty($genero) && !empty($endereco) && !empty($telefone) &&
        !empty($estagiario) && !empty($orientador)
    ) {

        $query = "INSERT INTO paciente (data_abertura, nome, data_nascimento, genero, endereco, telefone, email, contato_emergencia, escolaridade, ocupacao, necessidade, estagiario, orientador) 
                    VALUES ('$data_abertura', '$nome', '$data_nascimento', '$genero', '$endereco', '$telefone', '$email', '$contato_emergencia', '$escolaridade', '$ocupacao', '$necessidade', '$estagiario', '$orientador')";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Paciente cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar paciente: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}
?>