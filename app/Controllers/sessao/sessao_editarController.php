<?php
require_once __DIR__ . '/../../Config/config.php';

// 1. CRÍTICO: Define a URL base para que o redirecionamento funcione
$base_path = '/IC/HealthConnect_Campus/'; 


// Verifica se o ID da sessão foi enviado via GET
if (!isset($_GET['sessao_id'])) {
// ... (restante do código) ...
}

$sessao_id = intval($_GET['sessao_id']); 

// 2. BUSCA DA SESSÃO E DO ID DO PRONTUÁRIO
$query_sessao = "SELECT * FROM sessoes WHERE id = $sessao_id"; 
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
// ... (restante do código) ...
}

$sessao = mysqli_fetch_array($result_sessao);

// 3. CRÍTICO: BUSCA DO ID DO PACIENTE USANDO O ID DO PRONTUÁRIO DA SESSÃO
$id_prontuario = $sessao['id_prontuario']; // ID do Prontuário é necessário

$query_paciente_id = "SELECT id_paciente FROM prontuario WHERE id = $id_prontuario";
$result_paciente_id = mysqli_query($con, $query_paciente_id);
$paciente_row = mysqli_fetch_assoc($result_paciente_id);

if (!$paciente_row) {
    die("Erro: Não foi possível encontrar o paciente associado a este prontuário.");
}

$id_paciente = $paciente_row['id_paciente']; // Este é o ID que precisamos para redirecionar!

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (restante da lógica de POST) ...

    if (mysqli_query($con, $query_update)) {
        echo "<script>alert('Sessão atualizada com sucesso!');</script>";
        
        // 4. CORREÇÃO CRÍTICA: Redirecionamento usando a URL base e o ID do PACIENTE
        echo "<script>window.location.href='{$base_path}views/sessao/prontuario.php?id={$id_paciente}';</script>";
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar sessão: " . mysqli_error($con) . "');</script>";
    }
}
?>