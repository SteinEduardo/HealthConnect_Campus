<?php
// Arquivo: app/Controllers/sessao/criar_sessaoController.php

require_once __DIR__ . '/../../Config/config.php';

// Define a URL base para que o redirecionamento funcione corretamente
$base_path = '/IC/HealthConnect_Campus/'; 
///UniCuritiba

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. CRÍTICO: COLETA o ID do PRONTUÁRIO do formulário (POST)
    $id_prontuario = isset($_POST['id_prontuario']) ? intval($_POST['id_prontuario']) : 0; 
    
    // 2. Verifica se o ID é válido antes de prosseguir
    if ($id_prontuario <= 0) {
        die("Erro FATAL: ID de prontuário não foi passado via formulário.");
    }

    // Coleta e sanitização básica dos outros campos
    $data_horario = mysqli_real_escape_string($con, $_POST['data_horario']);
    $presenca = mysqli_real_escape_string($con, $_POST['presenca']);
    $observacoes = mysqli_real_escape_string($con, $_POST['observacoes']);
    
    // Query de INSERT
    $query = "INSERT INTO sessoes (id_prontuario, data, sessao_text, anotacao) 
             VALUES ('$id_prontuario', '$data_horario', '$observacoes', '$presenca')";

    $result = mysqli_query($con, $query);

    if ($result) {
        
        // 3. BUSCA O ID DO PACIENTE USANDO O ID DO PRONTUÁRIO
        // Esta é a consulta CRÍTICA para corrigir o redirecionamento
        $query_paciente_id = "SELECT id_paciente FROM prontuario WHERE id = $id_prontuario";
        $result_paciente_id = mysqli_query($con, $query_paciente_id);

        if ($row_paciente = mysqli_fetch_assoc($result_paciente_id)) {
            $id_paciente_correto = $row_paciente['id_paciente'];
            
            // 4. REDIRECIONAMENTO CORRIGIDO: Usa a URL base e o ID do PACIENTE
            echo "<script>alert('Sessão criada com sucesso!');</script>";
            echo "<script>window.location.href='{$base_path}views/sessao/prontuario.php?id={$id_paciente_correto}';</script>";
        } else {
            // Caso de erro extremo na busca
            echo "<script>alert('Sessão criada, mas erro ao encontrar paciente associado.'); window.location.href='{$base_path}views/menu/menu_aluno.php';</script>";
        }
        
    } else {
        echo "<script>alert('Erro ao criar sessão: " . mysqli_error($con) . "');</script>";
    }
}
?>