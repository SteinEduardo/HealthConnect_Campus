<?php
include('config.php');

// Verifica se o ID da sessão foi enviado via GET
if (!isset($_GET['sessao_id'])) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao_id = intval($_GET['sessao_id']);

// Consulta os dados da sessão
$query_sessao = "SELECT * FROM sessoes WHERE id = $sessao_id"; 
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao = mysqli_fetch_array($result_sessao);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_horario = mysqli_real_escape_string($con, $_POST['data_horario']);
    $presenca = mysqli_real_escape_string($con, $_POST['presenca']);
    $observacoes = mysqli_real_escape_string($con, $_POST['observacoes']);

    $query_update = "UPDATE sessoes 
                  SET data = '$data_horario',  
                      sessao_text = '$observacoes',  
                      anotacao = '$presenca'
                  WHERE id = $sessao_id";

    
    if (mysqli_query($con, $query_update)) {
        echo "<script>alert('Sessão atualizada com sucesso!'); window.location.href='prontuario.php?id=" . $sessao['id_prontuario'] . "';</script>";
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar sessão: " . mysqli_error($con) . "');</script>";
    }
}
?>