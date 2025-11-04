<?php

require_once __DIR__ . '/../../Config/config.php';

if (!isset($_GET['sessao_id'])) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao_id = intval($_GET['sessao_id']); 

$query_sessao = "SELECT * FROM sessoes WHERE id = $sessao_id";
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
    echo "Sessão não encontrada.";
    exit;
}

$sessao = mysqli_fetch_array($result_sessao);
?>