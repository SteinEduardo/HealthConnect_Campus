<?php
include(__DIR__ . '/../app/Config/config.php');
include('verifica_Cadastro.php');

// Consulta a lista de pacientes
$query = "SELECT * FROM paciente";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Erro na consulta: " . mysqli_error($con);
    exit;
}
?>