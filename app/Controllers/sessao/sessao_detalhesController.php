<?php
require_once __DIR__ . '/../../Config/config.php';

if (!isset($_GET['sessao_id'])) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao_id = intval($_GET['sessao_id']);

$query_sessao = "SELECT s.*, pr.id_paciente
                 FROM sessoes s
                 JOIN prontuario pr ON s.id_prontuario = pr.id
                 WHERE s.id = $sessao_id";
                 
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao = mysqli_fetch_array($result_sessao);

$id_paciente = $sessao['id_paciente'];
?>