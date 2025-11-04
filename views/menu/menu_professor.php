<?php
require_once __DIR__ . '/../../app/Controllers/menu/menu_professorController.php';

$page_title = "Dashboard Professor";

require_once __DIR__ . '/../includes/header.php'; 

?>

<h1>Meus Alunos Supervisionados (<?php echo $total_alunos; ?>)</h1>

<div class="dashboard-card">
    <div class="item-list">
        <ul>
            <?php 
            if ($total_alunos > 0) {
                foreach ($alunos_supervisionados as $aluno) {
                    $nome_partes = explode(' ', $aluno['nome']);
                    $iniciais = strtoupper(substr($aluno['nome'], 0, 1) . substr($nome_partes[count($nome_partes) - 1], 0, 1));
            ?>
            <li class="list-item">
                <div style="display: flex; align-items: center;">
                    <div class="avatar" style="background-color: #6366f1;"><?php echo $iniciais; ?></div>
                    <div class="item-info">
                        <div class="item-name"><?php echo $aluno['nome']; ?></div>
                        <div style="font-size: 0.85rem; color: #6b7280;"><?php echo $aluno['nivel'] ?? 'Nível/Curso'; ?></div>
                    </div>
                </div>
                <div class="actions-group">
                    <a href="../cadastros/cadastro_aluno_editar.php?id=<?php echo $aluno['id']; ?>" class="nav-item action-edit-link" style="margin-right: 10px;">Editar</a>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="aluno_id" value="<?php echo $aluno['id']; ?>">
                        <button type="submit" name="botao" value="Deletar_Aluno" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</button>
                    </form>
                </div>
                </li>
            <?php 
                }
            } else {
                echo '<li class="list-item">Nenhum aluno está sob sua supervisão.</li>';
            }
            ?>
        </ul>
        <div style="text-align: center; margin-top: 15px;">
            <a href="#" class="text-link">Ver lista completa</a>
        </div>
    </div>
</div>

<h1>Prontuários Ativos (<?php echo $total_prontuarios; ?> Casos)</h1>

<div class="dashboard-card">
    <table>
        <thead>
            <tr>
                <th>Paciente (ID)</th>
                <th>Aluno Responsável</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($total_prontuarios > 0) {
                foreach ($prontuarios_ativos as $prontuario) { 
                    $status_db = $prontuario['status'] ?? 'Em Evolução';
                    
                    if (strpos($status_db, 'Revisão') !== false || $status_db === 'Pendente') {
                        $status_class = 'status-pending';
                        $status_text = 'Revisão Pendente';
                    } else {
                        $status_class = 'status-active';
                        $status_text = 'Em Evolução';
                    }
                    
                    $paciente_info = $prontuario['paciente_nome'] . ' (#' . $prontuario['paciente_id'] . ')';
                    $prontuario_id = $prontuario['prontuario_id'] ?? 1; // Assumindo que você puxa o ID do prontuário
            ?>
            <tr>
                <td><?php echo $paciente_info; ?></td>
                <td><?php echo $prontuario['aluno_nome']; ?></td>
                <td><span class="<?php echo $status_class; ?>"><?php echo $status_text; ?></span></td>
                <td>
                    <a href="../sessao/prontuario.php?id=<?php echo $prontuario['paciente_id']; ?>" class="text-link">Detalhes</a>
                    
                    <a href="../sessao/sessao_editar.php?prontuario_id=<?php echo $prontuario_id; ?>" class="text-link" style="margin-left: 10px;">Editar</a>
                    
                    <form method="post" action="" style="display:inline; margin-left: 10px;">
                        <input type="hidden" name="prontuario_id" value="<?php echo $prontuario_id; ?>">
                        <button type="submit" name="botao" value="Deletar_Prontuario" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir este prontuário?')">Excluir</button>
                    </form>
                    </td>
            </tr>
            <?php 
                }
            } else {
                echo '<tr><td colspan="4">Não há prontuários ativos sob sua supervisão.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <div style="text-align: center; margin-top: 15px;">
        <a href="#" class="text-link">Ver todos os prontuários</a>
    </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php'; 
?>