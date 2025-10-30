<?php
require_once __DIR__ . '/../../Config/config.php';

// Verifica se o ID da sessão foi enviado via GET
if (!isset($_GET['sessao_id'])) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao_id = intval($_GET['sessao_id']); // Garante que o ID é um número inteiro

// Consulta os dados da sessão
$query_sessao = "SELECT * FROM sessoes WHERE id = $sessao_id";
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao = mysqli_fetch_array($result_sessao);
?>