<?php
// Arquivo: app/Controllers/sessao/criar_sessaoController.php

require_once __DIR__ . '/../../Config/config.php';

// Define a URL base para que o redirecionamento funcione
$base_path = '/UniCuritiba/Projetos/IC_HealthConnect/HealthConnect_Campus/'; 

// 1. Definição inicial do ID_PRONTUARIO para evitar warnings.
$id_prontuario_url = isset($_GET['id']) ? intval($_GET['id']) : 0; 
if ($id_prontuario_url <= 0) {
    die("Erro: ID de prontuário inválido na URL.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 2. COLETA O ID DO PRONTUÁRIO DO FORMULÁRIO (CRÍTICO)
    $id_prontuario_post = isset($_POST['id_prontuario']) ? intval($_POST['id_prontuario']) : 0; 

    // Se o ID do formulário for inválido, interrompe.
    if ($id_prontuario_post <= 0) {
        die("Erro FATAL: ID de prontuário não foi passado via formulário.");
    }

    // Coleta e sanitiza dos outros campos
    $data_horario = mysqli_real_escape_string($con, $_POST['data_horario']);
    $presenca = mysqli_real_escape_string($con, $_POST['presenca']);
    $observacoes = mysqli_real_escape_string($con, $_POST['observacoes']);

    if (!empty($data_horario)) {
        
        $query = "INSERT INTO sessoes (id_prontuario, data, sessao_text, anotacao) 
                 VALUES ('$id_prontuario_post', '$data_horario', '$observacoes', '$presenca')";

        $result = mysqli_query($con, $query);

        if ($result) {
            
            // 4. BUSCA O ID DO PACIENTE PARA O REDIRECIONAMENTO (CORREÇÃO DE LÓGICA)
            $query_paciente_id = "SELECT id_paciente FROM prontuario WHERE id = $id_prontuario_post";
            $result_paciente_id = mysqli_query($con, $query_paciente_id);
            
            if ($row_paciente = mysqli_fetch_assoc($result_paciente_id)) {
                $id_paciente_correto = $row_paciente['id_paciente'];
                
                // Redireciona para o prontuário do paciente (usa ID do PACIENTE)
                echo "<script>alert('Sessão criada com sucesso!');</script>";
                echo "<script>window.location.href='{$base_path}views/sessao/prontuario.php?id={$id_paciente_correto}';</script>";
            } else {
                echo "<script>alert('Sessão criada, mas erro ao encontrar paciente associado.'); window.location.href='{$base_path}views/menu/menu_aluno.php';</script>";
            }
        } else {
            echo "<script>alert('Erro ao criar sessão: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Preencha a data e horário obrigatórios!');</script>";
    }
}
?>