<?php
require_once __DIR__ . '/../../Config/config.php';
include(__DIR__ . '/../verifica_Cadastro.php');

// Consulta a lista de pacientes
$query = "SELECT * FROM paciente";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Erro na consulta: " . mysqli_error($con);
    exit;
}
?>