<?php
// Arquivo: app/Controllers/sessao/sessao_detalhesController.php

require_once __DIR__ . '/../../Config/config.php';

// Verifica se o ID da sessão foi enviado via GET
if (!isset($_GET['sessao_id'])) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao_id = intval($_GET['sessao_id']); // Garante que o ID é um número inteiro

// 1. CRÍTICO: Consulta a sessão com JOIN para obter o ID do paciente
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

// 2. CRÍTICO: DEFINE a variável $id_paciente para que a View (botão Voltar) possa usá-la
$id_paciente = $sessao['id_paciente'];
?>