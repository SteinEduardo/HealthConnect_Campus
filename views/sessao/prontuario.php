<?php
    // O Controller deve ser corrigido para definir $id_prontuario_atual e buscar os dados
    require_once __DIR__ . '/../../app/Controllers/sessao/prontuarioController.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <title>Prontuário do Paciente</title>
</head>
<body>
    <div class="main-content">
        <h1>Prontuário do Paciente</h1>
        
        <h2>Dados do Paciente</h2>
        <p><strong>Nome:</strong> <?php echo $paciente['nome']; ?></p>
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
            <thead>
                <tr>
                    <th>Data e Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            // CORREÇÃO DA SINTAXE: Verifica se há resultados válidos para o loop
            if (isset($result_sessoes) && $result_sessoes && mysqli_num_rows($result_sessoes) > 0) {
                while ($sessao = mysqli_fetch_array($result_sessoes)) { 
            ?>
                    <tr>
                        <td>
                            <a href="sessao_detalhes.php?sessao_id=<?php echo $sessao['id']; ?>">
                                <?php echo $sessao['data']; ?> 
                            </a>
                        </td>
                        <td>
                            <a href="sessao_editar.php?sessao_id=<?php echo $sessao['id']; ?>">Editar Sessão</a>
                        </td>
                    </tr>
            <?php 
                } // Fim do while
            } else { 
            // Se não houver sessões
            ?>
                <tr><td colspan="2">Nenhuma sessão encontrada.</td></tr>
            <?php 
            } // Fim do if 
            ?>
            </tbody>
        </table>

        <div class="btn-container" style="margin-top: 20px;">
            <?php 
            // CRÍTICO: Usa a variável do Controller para checar e linkar
            if (isset($id_prontuario_atual) && $id_prontuario_atual > 0) { ?>
                <a href="criar_sessao.php?id=<?php echo $id_prontuario_atual; ?>" class="btn">Criar Sessão</a>
            <?php } else { ?>
                <p>É necessário cadastrar o Prontuário primeiro.</p>
            <?php } ?>
        </div>
        
    </div>
</body>
</html>