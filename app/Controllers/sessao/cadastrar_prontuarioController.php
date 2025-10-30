<?php
require_once __DIR__ . '/../../Config/config.php';

$base_path = '/UniCuritiba/IC/HealthConnect_Campus/'; 

// Verifica se o ID do paciente foi passado via GET
if (isset($_GET['id'])) {
    $id_paciente = $_GET['id'];
} else {
    echo "ID do paciente não informado.";
    exit;
}

// Verifica se o formulário foi enviado
if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {
    $data_hora = $_POST['data_hora'];
    $avaliacao = $_POST['avaliacao'];
    $historico_familiar = $_POST['historico_familiar'];
    $historico_social = $_POST['historico_social'];

    if (!empty($data_hora) && !empty($avaliacao) && !empty($historico_familiar) && !empty($historico_social)) {
        
        // ⚠️ ALERTA DE SEGURANÇA: Query ainda está vulnerável a SQL Injection!
        $query = "INSERT INTO prontuario (id_paciente, data_hora, avaliacao, historico_familiar, historico_social)
                  VALUES ('$id_paciente', '$data_hora', '$avaliacao', '$historico_familiar', '$historico_social')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Prontuário cadastrado com sucesso!');</script>";
            
            echo "<script>window.location.href='{$base_path}views/menu/menu_aluno.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar prontuário: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}
?>