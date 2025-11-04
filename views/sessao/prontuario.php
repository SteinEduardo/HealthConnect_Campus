<?php

require_once __DIR__ . '/../../app/Controllers/sessao/prontuarioController.php';

$page_title = "Prontuário do Paciente: " . ($paciente['nome'] ?? 'Detalhes');
require_once __DIR__ . '/../includes/header.php'; 

$id_paciente_url = $paciente['id'] ?? 0;
$id_prontuario = $id_prontuario_atual ?? 0; // O ID que o Controller puxou do Prontuário
?>

<h1>Prontuário do Paciente</h1>

<div class="dashboard-card" style="margin-bottom: 25px;">
    <div class="card-header">
        <h2>Dados do Paciente</h2>
    </div>
    <div class="details-section" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <p><strong>Nome:</strong> <?php echo $paciente['nome'] ?? 'N/A'; ?></p>
        <p><strong>Orientador:</strong> <?php echo $paciente['orientador'] ?? 'N/A'; ?></p>
        <p><strong>Data de Abertura:</strong> <?php echo date('d/m/Y', strtotime($paciente['data_abertura'] ?? '')) ; ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo date('d/m/Y', strtotime($paciente['data_nascimento'] ?? '')); ?></p>
        <p><strong>Gênero:</strong> <?php echo $paciente['genero'] ?? 'N/A'; ?></p>
        <p><strong>Telefone:</strong> <?php echo $paciente['telefone'] ?? 'N/A'; ?></p>
        <p><strong>Email:</strong> <?php echo $paciente['email'] ?? 'N/A'; ?></p>
        <p><strong>Endereço:</strong> <?php echo $paciente['endereco'] ?? 'N/A'; ?></p>
    </div>
</div>

<div class="dashboard-card" style="margin-bottom: 25px;">
    <div class="card-header">
        <h2>Prontuário</h2>
    </div>
    <?php if ($prontuario) { ?>
        <p><strong>Avaliação:</strong> <br><?php echo $prontuario['avaliacao'] ?? 'N/A'; ?></p>
        <p><strong>Histórico Familiar:</strong> <br><?php echo $prontuario['historico_familiar'] ?? 'N/A'; ?></p>
        <p><strong>Histórico Social:</strong> <br><?php echo $prontuario['historico_social'] ?? 'N/A'; ?></p>
        
    <?php } else { ?>
        <p>Prontuário não cadastrado. <a href="../cadastros/cadastrar_prontuario.php?id=<?php echo $id_paciente_url; ?>" class="text-link">Clique para cadastrar.</a></p>
    <?php } ?>
</div>


<div class="dashboard-card">
    <div class="card-header" style="justify-content: space-between;">
        <h2>Sessões Registradas</h2>
        <?php if ($id_prontuario > 0) { ?>
            <button onclick="window.location.href='criar_sessao.php?id=<?php echo $id_prontuario; ?>'" class="btn" style="padding: 8px 15px;">+ Nova Sessão</button>
        <?php } ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Data e Hora</th>
                <th>Presença</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if (isset($result_sessoes) && mysqli_num_rows($result_sessoes) > 0) {
            while ($sessao = mysqli_fetch_array($result_sessoes)) { 
        ?>
                <tr>
                    <td>
                        <a href="sessao_detalhes.php?sessao_id=<?php echo $sessao['id']; ?>">
                            <?php echo date('d/m/Y H:i', strtotime($sessao['data'])); ?> 
                        </a>
                    </td>
                    <td><?php echo $sessao['anotacao'] ?? 'N/A'; ?></td>
                    <td>
                        <a href="sessao_editar.php?sessao_id=<?php echo $sessao['id']; ?>" class="action-link">Editar</a>
                        <form method="post" action="" style="display:inline; margin-left: 10px;">
                            <input type="hidden" name="sessao_id" value="<?php echo $sessao['id']; ?>">
                            <button type="submit" name="botao" value="Deletar_Sessao" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar esta sessão?')">Deletar</button>
                        </form>
                    </td>
                </tr>
        <?php 
            }
        } else { 
        ?>
            <tr><td colspan="3">Nenhuma sessão encontrada para este prontuário.</td></tr>
        <?php 
        } 
        ?>
        </tbody>
    </table>
</div>

<?php
// INCLUI O FOOTER
require_once __DIR__ . '/../includes/footer.php'; 
?>