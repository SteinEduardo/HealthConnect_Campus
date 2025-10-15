<?php
include('config.php');

// Verifica se o ID do paciente foi enviado
if (!isset($_GET['id'])) {
    echo "Paciente não encontrado.";
    exit;
}

$id_paciente = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_horario = mysqli_real_escape_string($con, $_POST['data_horario']);
    $presenca = mysqli_real_escape_string($con, $_POST['presenca']);
    $observacoes = mysqli_real_escape_string($con, $_POST['observacoes']);

    $query = "INSERT INTO sessoes (id_prontuario, data, sessao_text, anotacao) 
          VALUES ('$id_paciente', '$data_horario', '$observacoes', '$presenca')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Sessão criada com sucesso!'); window.location.href='prontuario.php?id=$id_paciente';</script>";
    } else {
        echo "<script>alert('Erro ao criar sessão: " . mysqli_error($con) . "');</script>";
    }
}
?>