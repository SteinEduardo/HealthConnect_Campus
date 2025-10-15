<?php
    require_once __DIR__ . '/../../app/Controllers/sessao/prontuarioController.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuário do Paciente</title>
</head>
<body>
    <div class="main-content">
        <h1>Prontuário do Paciente</h1>
        
        <h2>Dados do Paciente</h2>
        <p><strong>Nome:</strong> <?php echo $paciente['nome']; ?></p>
        <p><strong>Data de Abertura:</strong> <?php echo $paciente['data_abertura']; ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo $paciente['data_nascimento']; ?></p>
        <p><strong>Gênero:</strong> <?php echo $paciente['genero']; ?></p>
        <p><strong>Endereço:</strong> <?php echo $paciente['endereco']; ?></p>
        <p><strong>Telefone:</strong> <?php echo $paciente['telefone']; ?></p>
        <p><strong>Email:</strong> <?php echo $paciente['email']; ?></p>
        <p><strong>Contato de Emergência:</strong> <?php echo $paciente['contato_emergencia']; ?></p>
        <p><strong>Escolaridade:</strong> <?php echo $paciente['escolaridade']; ?></p>
        <p><strong>Ocupação:</strong> <?php echo $paciente['ocupacao']; ?></p>
        <p><strong>Necessidades:</strong> <?php echo $paciente['necessidade']; ?></p>
        <p><strong>Estagiário:</strong> <?php echo $paciente['estagiario']; ?></p>
        <p><strong>Orientador:</strong> <?php echo $paciente['orientador']; ?></p>

        <h2>Prontuário</h2>
        <?php if ($prontuario) { ?>
            <p><strong>Avaliação:</strong> <?php echo $prontuario['avaliacao']; ?></p>
            <p><strong>Histórico Familiar:</strong> <?php echo $prontuario['historico_familiar']; ?></p>
            <p><strong>Histórico Social:</strong> <?php echo $prontuario['historico_social']; ?></p>
        <?php } else { ?>
            <p>Prontuário não cadastrado.</p>
        <?php } ?>

        <h2>Sessões</h2>
        <table>
            <tr>
                <th>Data e Hora</th>
                <th>Ações</th>
            </tr>
            <?php while ($sessao = mysqli_fetch_array($result_sessoes)) { ?>
                <tr>
                    <td><a href="sessao_detalhes.php?sessao_id=<?php echo $sessao['id']; ?>"><?php echo $sessao['data_horario']; ?></a></td>
                    <td>
                        <a href="sessao_editar.php?sessao_id=<?php echo $sessao['id']; ?>">Editar Sessão</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <a href="criar_sessao.php?id=<?php echo $paciente['id']; ?>" class="btn">Criar Sessão</a>
    </div>
</body>
</html>
