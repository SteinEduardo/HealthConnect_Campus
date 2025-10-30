<?php
require_once __DIR__ . '/../../Config/config.php';
include(__DIR__ . '/../verifica_Cadastro.php');

// Excluir aluno se a solicitação POST for enviada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir_aluno_id'])) {
    $aluno_id = intval($_POST['excluir_aluno_id']);
    $delete_query = "DELETE FROM aluno WHERE id = $aluno_id";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<p>Aluno excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir o aluno: " . mysqli_error($con) . "</p>";
    }
}

// Consulta a lista de alunos
$query = "SELECT * FROM aluno";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Erro na consulta: " . mysqli_error($con);
    exit;
}
?>