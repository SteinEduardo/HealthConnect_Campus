<?php
require_once __DIR__ . '/../../Config/config.php';

$alunos = [];
$professores = [];
$pacientes = [];

$filtro = $_GET['filtro'] ?? '';


$filtro_sql = mysqli_real_escape_string($con, $filtro); 
$where_clause = $filtro ? "WHERE nome LIKE '%$filtro_sql%'" : '';

// -------------------------------------------------------------------
// 1. CONSULTA: ALUNOS
// -------------------------------------------------------------------
$query_alunos = "SELECT id, nome FROM aluno $where_clause ORDER BY nome";
$result_alunos = mysqli_query($con, $query_alunos);
if ($result_alunos) {
    while ($row = mysqli_fetch_assoc($result_alunos)) {
        $alunos[] = $row;
    }
}

// -------------------------------------------------------------------
// 2. CONSULTA: PROFESSORES
// -------------------------------------------------------------------
$query_professores = "SELECT id, nome FROM professor $where_clause ORDER BY nome";
$result_professores = mysqli_query($con, $query_professores);
if ($result_professores) {
    while ($row = mysqli_fetch_assoc($result_professores)) {
        $professores[] = $row;
    }
}

// -------------------------------------------------------------------
// 3. CONSULTA: PACIENTES
// -------------------------------------------------------------------
$query_pacientes = "SELECT id, nome FROM paciente $where_clause ORDER BY nome";
$result_pacientes = mysqli_query($con, $query_pacientes);
if ($result_pacientes) {
    while ($row = mysqli_fetch_assoc($result_pacientes)) {
        $pacientes[] = $row;
    }
}

?>