<?php
// Arquivo: app/Controllers/sessao/sessao_editarController.php

require_once __DIR__ . '/../../Config/config.php';

// 1. CRÍTICO: Define a URL base para que o redirecionamento funcione
$base_path = '/IC/HealthConnect_Campus/'; 
///UniCuritiba

// Verifica se o ID da sessão foi enviado via GET
if (!isset($_GET['sessao_id'])) {
    die("Sessão não encontrada.");
}

$sessao_id = intval($_GET['sessao_id']); 

// 2. BUSCA DA SESSÃO COM JOIN PARA OBTER O ID DO PACIENTE
// Usamos JOIN para buscar o ID do paciente associado ao prontuário da sessão.
$query_sessao = "SELECT s.*, pr.id_paciente
                 FROM sessoes s
                 JOIN prontuario pr ON s.id_prontuario = pr.id
                 WHERE s.id = $sessao_id";
                 
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
    die("Sessão não encontrada.");
}

$sessao = mysqli_fetch_array($result_sessao);

// 3. CRÍTICO: DEFINE A VARIÁVEL $id_paciente para que a View (botão Voltar) possa usá-la.
// O Controller de Detalhes da Sessão também precisa desta variável!
$id_paciente = $sessao['id_paciente']; // Variável definida e pronta para a View

// 4. LÓGICA DE ATUALIZAÇÃO (POST)
// 4. Processamento do Formulário (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Coleta dos dados do formulário (agora com nomes das variáveis PHP consistentes)
    $data_post = mysqli_real_escape_string($con, $_POST['data_horario']);
    $sessao_text_post = mysqli_real_escape_string($con, $_POST['observacoes']);
    $anotacao_post = mysqli_real_escape_string($con, $_POST['presenca']);

    // 🏆 SOLUÇÃO: CRIAÇÃO DA QUERY DE UPDATE (Com as colunas CORRETAS)
    $query_update = "UPDATE sessoes 
                     SET data = '$data_post',  
                         sessao_text = '$sessao_text_post',  
                         anotacao = '$anotacao_post'
                     WHERE id = $sessao_id"; // Usa o ID da sessão da URL
    
    // A linha 41 agora executa a query.
    if (mysqli_query($con, $query_update)) {
        
        echo "<script>alert('Sessão atualizada com sucesso!');</script>";
        // Redirecionamento de sucesso usando a URL base e o ID do PACIENTE
        echo "<script>window.location.href='{$base_path}views/sessao/prontuario.php?id={$id_paciente}';</script>"; 
        exit();
    } else {
        echo "<script>alert('Erro ao salvar edição: " . mysqli_error($con) . "');</script>";
    }
}
?>