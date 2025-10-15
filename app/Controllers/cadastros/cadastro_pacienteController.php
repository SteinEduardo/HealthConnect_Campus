<?php
include(__DIR__ . '/../app/Config/config.php');

// Solicita as informações de cadastro e registra no banco
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
// CÓDIGO DE SUBSTITUIÇÃO para o bloco que começa no 'if (!empty($data_abertura)...'

    // Valida se todos os campos obrigatórios foram preenchidos (LÓGICA CORRIGIDA)
    if (
        !empty($data_abertura) && !empty($nome) && !empty($data_nascimento) &&
        !empty($genero) && !empty($endereco) && !empty($telefone) &&
        !empty($estagiario) && !empty($orientador)
    ) {
        
        // CORREÇÃO: Query de inserção ajustada para as colunas EXISTENTES no BD (sem aluno_id)
        $query = "INSERT INTO paciente (data_abertura, nome, data_nascimento, genero, endereco, telefone, email, contato_emergencia, escolaridade, ocupacao, necessidade, estagiario, orientador) 
                    VALUES ('$data_abertura', '$nome', '$data_nascimento', '$genero', '$endereco', '$telefone', '$email', '$contato_emergencia', '$escolaridade', '$ocupacao', '$necessidade', '$estagiario', '$orientador')";

        $result = mysqli_query($con, $query);

        // Verifica se o registro foi bem-sucedido
        if ($result) {
            echo "<script>alert('Paciente cadastrado com sucesso!');</script>";
        } else {
            // Se houver um erro, o alert mostrará a mensagem de erro do SQL
            echo "<script>alert('Erro ao cadastrar paciente: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}
?>