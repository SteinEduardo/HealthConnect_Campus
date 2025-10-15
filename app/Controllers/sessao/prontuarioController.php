<?php
include(__DIR__ . '/../app/Config/config.php');

// Verifica se o ID do paciente foi enviado via GET
if (!isset($_GET['id'])) {
    echo "Paciente não encontrado.";
    exit;
}

$id_paciente = intval($_GET['id']); // Garante que o ID é um número inteiro

// Consulta os dados do paciente
$query_paciente = "SELECT * FROM paciente WHERE id = $id_paciente";
$result_paciente = mysqli_query($con, $query_paciente);

if (!$result_paciente || mysqli_num_rows($result_paciente) == 0) {
    echo "Paciente não encontrado.";
    exit;
}

$paciente = mysqli_fetch_array($result_paciente);

// 1. Consulta o prontuário do paciente (MANTÉM O NOME DA VARIÁVEL)
$query_prontuario = "SELECT * FROM prontuario WHERE id_paciente = $id_paciente";
$result_prontuario = mysqli_query($con, $query_prontuario);
$prontuario = mysqli_fetch_array($result_prontuario); // Variável $prontuario é definida aqui

// 2. Consulta as sessões do paciente (CORREÇÃO DE SCHEMA E LÓGICA)
// O prontuário deve existir para buscar as sessões. Se não existir, $prontuario['id'] será nulo.
if ($prontuario && isset($prontuario['id'])) {
    // CORREÇÃO: Usa a tabela 'sessoes' (plural) e a chave 'id_prontuario'
    $query_sessoes = "SELECT * FROM sessoes WHERE id_prontuario = {$prontuario['id']}";
    $result_sessoes = mysqli_query($con, $query_sessoes);
} else {
    // Se não houver prontuário, não há sessões para buscar.
    $result_sessoes = false; 
}
// O restante da parte HTML não foi incluído.
?>
