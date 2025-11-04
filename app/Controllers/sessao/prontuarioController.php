<?php
require_once __DIR__ . '/../../Config/config.php';

// 1. Coleta o ID do Paciente da URL
$id_paciente = isset($_GET['id']) ? intval($_GET['id']) : 0; 

if ($id_paciente <= 0) {
    die("ID do paciente não encontrado.");
}

// 2. Consulta para puxar os dados do paciente
$query_paciente = "SELECT * FROM paciente WHERE id = $id_paciente";
$result_paciente = mysqli_query($con, $query_paciente);
$paciente = mysqli_fetch_assoc($result_paciente);

if (!$paciente) {
    die("Paciente não encontrado no banco de dados.");
}

// 3. Consulta para encontrar o ID do Prontuário (Chave Estrangeira da tabela 'sessoes')
// Buscamos o prontuário mais recente associado a este paciente.
$query_prontuario_id = "SELECT id FROM prontuario WHERE id_paciente = $id_paciente ORDER BY id DESC LIMIT 1";
$result_prontuario_id = mysqli_query($con, $query_prontuario_id);

// 4. Salva o ID do Prontuário na variável que será usada na View
$id_prontuario_atual = 0; 
if ($prontuario_row = mysqli_fetch_assoc($result_prontuario_id)) {
    $id_prontuario_atual = $prontuario_row['id'];
}

// 5. Consulta para puxar os dados detalhados do prontuário
$prontuario = null;
if ($id_prontuario_atual > 0) {
    $query_prontuario = "SELECT * FROM prontuario WHERE id = $id_prontuario_atual";
    $result_prontuario = mysqli_query($con, $query_prontuario);
    $prontuario = mysqli_fetch_assoc($result_prontuario);
    
    // 6. Consulta para puxar as sessões
    $query_sessoes = "SELECT * FROM sessoes WHERE id_prontuario = $id_prontuario_atual ORDER BY data DESC";
    $result_sessoes = mysqli_query($con, $query_sessoes);
} else {
    $result_sessoes = null;
}
?>