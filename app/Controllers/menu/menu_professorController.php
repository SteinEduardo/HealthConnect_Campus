<?php
// Arquivo: app/Controllers/menu/menu_professorController.php

// Inclusão do config.php (Caminho corrigido)
require_once __DIR__ . '/../../Config/config.php';

// Inicia a sessão para acessar o ID do professor logado
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// ⚠️ Assumindo que o ID do professor logado está na sessão
$professor_id = $_SESSION['usuario_id'] ?? null;

// Variáveis que serão usadas na View
$alunos_supervisionados = [];
$prontuarios_ativos = [];
$total_alunos = 0;
$total_prontuarios = 0;

if ($professor_id) {
    // -------------------------------------------------------------------
    // 1. CONSULTA: ALUNOS SUPERVISIONADOS POR ESTE PROFESSOR
    // -------------------------------------------------------------------
    
    // Supondo que a tabela 'aluno' tenha um campo 'professor_id' que armazena o id do supervisor
    $query_alunos = "SELECT id, nome, email, nivel FROM aluno WHERE professor_id = '$professor_id'";
    // ⚠️ MELHORIA DE SEGURANÇA NECESSÁRIA: Usar prepared statements! (Próxima etapa)
    
    $result_alunos = mysqli_query($con, $query_alunos);

    if ($result_alunos) {
        while ($aluno = mysqli_fetch_assoc($result_alunos)) {
            // Adiciona o aluno ao array
            $alunos_supervisionados[] = $aluno;
        }
        $total_alunos = count($alunos_supervisionados);
    } else {
        // Lidar com erro
        error_log("Erro ao buscar alunos: " . mysqli_error($con));
    }


    // -------------------------------------------------------------------
    // 2. CONSULTA: PRONTUÁRIOS ATIVOS (Pacientes) desses alunos
    // -------------------------------------------------------------------
    
    // 2.1. Monta uma lista de IDs dos alunos para a subconsulta
    $aluno_ids = array_column($alunos_supervisionados, 'id');
    
    if (!empty($aluno_ids)) {
        $ids_string = implode(',', $aluno_ids); // Cria a lista: 1, 5, 8, ...
        
        // Supondo que a tabela 'paciente' tenha um campo 'aluno_responsavel_id' e que o 'status' define ativo
        $query_prontuarios = "SELECT 
                                p.id AS paciente_id, 
                                p.nome AS paciente_nome,
                                a.nome AS aluno_nome,
                                p.status_prontuario AS status
                              FROM paciente p
                              JOIN aluno a ON p.aluno_responsavel_id = a.id
                              WHERE p.aluno_responsavel_id IN ($ids_string)
                              AND p.status_prontuario != 'Finalizado'"; // Exemplo de filtro de status ativo

        $result_prontuarios = mysqli_query($con, $query_prontuarios);
        
        if ($result_prontuarios) {
            while ($prontuario = mysqli_fetch_assoc($result_prontuarios)) {
                $prontuarios_ativos[] = $prontuario;
            }
            $total_prontuarios = count($prontuarios_ativos);
        } else {
            error_log("Erro ao buscar prontuários: " . mysqli_error($con));
        }
    }
} else {
    // Redirecionar para login se a sessão expirar
    // header("Location: {$base_path}login.php"); 
    // exit;
}

// O resto do Controller é opcional (Excluir aluno)
// ...
?>