<?php
require_once __DIR__ . '/../../Config/config.php';

$base_path = '/IC/HealthConnect_Campus/'; 

if (!isset($_GET['sessao_id'])) {
    die("Sessão não encontrada.");
}

$sessao_id = intval($_GET['sessao_id']); 

$query_sessao = "SELECT s.*, pr.id_paciente
                 FROM sessoes s
                 JOIN prontuario pr ON s.id_prontuario = pr.id
                 WHERE s.id = $sessao_id";
                 
$result_sessao = mysqli_query($con, $query_sessao);

if (!$result_sessao || mysqli_num_rows($result_sessao) == 0) {
    die("Sessão não encontrada.");
}

$sessao = mysqli_fetch_array($result_sessao);

$id_paciente = $sessao['id_paciente'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data_post = mysqli_real_escape_string($con, $_POST['data_horario']);
    $sessao_text_post = mysqli_real_escape_string($con, $_POST['observacoes']);
    $anotacao_post = mysqli_real_escape_string($con, $_POST['presenca']);

    $query_update = "UPDATE sessoes 
                     SET data = '$data_post',  
                         sessao_text = '$sessao_text_post',  
                         anotacao = '$anotacao_post'
                     WHERE id = $sessao_id";
    
    if (mysqli_query($con, $query_update)) {
        
        echo "<script>alert('Sessão atualizada com sucesso!');</script>";
        echo "<script>window.location.href='{$base_path}views/sessao/prontuario.php?id={$id_paciente}';</script>"; 
        exit();
    } else {
        echo "<script>alert('Erro ao salvar edição: " . mysqli_error($con) . "');</script>";
    }
}
?>