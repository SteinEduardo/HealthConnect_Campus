<?php
require_once __DIR__ . '/../../Config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$aluno_info = [];
$professor_info = ['nome' => 'N/A', 'email' => 'N/A']; 
$prontuarios_ativos = [];
$total_prontuarios = 0; 

$aluno_id = $_SESSION['usuario_id'] ?? null; 
if (isset($_GET['id'])) {
    $aluno_id = $_GET['id']; 
}

if ($aluno_id) {
    $query_aluno = "SELECT nome FROM aluno WHERE id = '$aluno_id'"; 
    $result_aluno = mysqli_query($con, $query_aluno);
    if ($result_aluno && $row = mysqli_fetch_assoc($result_aluno)) {
        $aluno_info = $row;
        $aluno_nome = $row['nome']; 
    } else {
        $aluno_nome = ''; 
    }

    if (!empty($aluno_nome)) {
        $query_prontuarios = "SELECT 
                                p.id AS paciente_id, 
                                p.nome AS paciente_nome,
                                p.data_abertura,
                                p.orientador AS professor_supervisor_nome  
                              FROM paciente p
                              WHERE p.estagiario = '$aluno_nome'
                              ORDER BY p.data_abertura DESC";

        $result_prontuarios = mysqli_query($con, $query_prontuarios);
        
        if ($result_prontuarios) {
            while ($prontuario = mysqli_fetch_assoc($result_prontuarios)) {
                $prontuarios_ativos[] = $prontuario;
            }
            $total_prontuarios = count($prontuarios_ativos);
            
            if (!empty($prontuarios_ativos)) {
                $professor_info['nome'] = $prontuarios_ativos[0]['professor_supervisor_nome'];
            }
        } else {
            error_log("Erro ao buscar prontuários: " . mysqli_error($con));
        }
    }
}
?>