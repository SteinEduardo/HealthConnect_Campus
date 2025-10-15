<?php
include(__DIR__ . '/../app/Config/config.php');
include('verifica_Cadastro.php');

// Deleta registro se solicitado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo'], $_POST['id'])) {
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $id = (int)$_POST['id'];
    $tabela = '';

    if ($tipo === 'Aluno') {
        $tabela = 'aluno';
    } elseif ($tipo === 'Professor') {
        $tabela = 'professor';
    } elseif ($tipo === 'Paciente') {
        $tabela = 'paciente';
    }

    if ($tabela) {
        $query = "DELETE FROM $tabela WHERE id = $id";
        if (mysqli_query($con, $query)) {
            $status = "success";
        } else {
            $status = "error";
        }
    } else {
        $status = "invalid_type";
    }
}

// Consulta registros com filtro
$filtro = isset($_GET['filtro']) ? mysqli_real_escape_string($con, $_GET['filtro']) : '';

$query = "
    SELECT 'Aluno' AS tipo, a.id, a.nome
    FROM aluno a
    WHERE a.nome LIKE '%$filtro%'
    UNION
    SELECT 'Professor' AS tipo, pr.id, pr.nome
    FROM professor pr
    WHERE pr.nome LIKE '%$filtro%'
    UNION
    SELECT 'Paciente' AS tipo, p.id, p.nome
    FROM paciente p
    WHERE p.nome LIKE '%$filtro%'
";

$result = mysqli_query($con, $query);

if (!$result) {
    echo "Erro na consulta: " . mysqli_error($con);
    exit;
}

// Feedback de status
$status_message = '';
if (isset($status)) {
    if ($status === 'success') {
        $status_message = "<div class='alert success'>Registro deletado com sucesso!</div>";
    } elseif ($status === 'error') {
        $status_message = "<div class='alert error'>Erro ao deletar o registro.</div>";
    } elseif ($status === 'invalid_type') {
        $status_message = "<div class='alert error'>Tipo de registro inválido!</div>";
    }
}
?>