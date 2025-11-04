<?php
// Arquivo: views/menu/menu_aluno.php

// CRÍTICO: Inclui o Controller (que busca os dados do aluno, professor e prontuários)
require_once __DIR__ . '/../../app/Controllers/menu/menu_alunoController.php';

// Define o título da página
$page_title = "Dashboard Aluno";
require_once __DIR__ . '/../includes/header.php'; 

// Variáveis para nome na saudação (usa o nome da sessão ou do DB, com fallback seguro)
$nome_aluno = $_SESSION['nome'] ?? ($aluno_info['nome'] ?? 'Aluno'); 
$professor_nome = $professor_info['nome'] ?? 'N/A';
$professor_email = $professor_info['email'] ?? 'N/A';
$total_prontuarios_exibido = $total_prontuarios ?? 0;
?>

<h1>Bem-vindo, <?php echo $nome_aluno; ?></h1>

<div class="btn-group-row" style="margin-bottom: 30px;">
    <button onclick="window.location.href='../cadastros/cadastro_paciente.php'" class="btn">Abrir Novo Prontuário</button>
</div>

<div class="dashboard-grid-cards">
    
    <div class="dashboard-card" style="margin-bottom: 20px;">
        <div class="card-header" style="justify-content: space-between;">
            <h2>Professor Supervisor</h2>
            <p style="font-size: 0.9rem; color: #6b7280; margin: 0;">(Contato)</p>
        </div>
        <div class="item-list">
            <ul>
                <li class="list-item">
                    <div class="item-info">
                        <div class="item-name"><?php echo $professor_nome; ?></div> 
                        <div style="font-size: 0.85rem; color: #6b7280;">Email: <?php echo $professor_email; ?></div>
                    </div>
                    <a href="mailto:<?php echo $professor_email; ?>" class="edit-btn">Email</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="dashboard-card" style="margin-bottom: 20px; grid-column: 1 / span 2;">
        <div class="card-header">
            <h2>Meus Prontuários Ativos (<?php echo $total_prontuarios_exibido; ?>)</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Paciente</th>
                    <th>Nome Paciente</th>
                    <th>Abertura</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($prontuarios_ativos)): ?>
                    <?php foreach ($prontuarios_ativos as $prontuario): 
                        // Lógica de Status (Mantida)
                        $status_class = 'status-active'; 
                        $status_text = 'Em Evolução';
                        
                        $paciente_id = $prontuario['paciente_id'];
                        $prontuario_id = $prontuario['prontuario_id'] ?? 1; // ID TEMPORÁRIO do prontuário, a ser corrigido
                    ?>
                        <tr>
                            <td>#<?php echo $paciente_id; ?></td>
                            <td><a href="../sessao/prontuario.php?id=<?php echo $paciente_id; ?>"><?php echo $prontuario['paciente_nome']; ?></a></td>
                            <td><?php echo date('d/m/Y', strtotime($prontuario['data_abertura'])); ?></td>
                            <td><span class="<?php echo $status_class; ?>"><?php echo $status_text; ?></span></td>
                            
                            <td class="action-buttons-cell">
                                
                                <button type="button" class="edit-btn" onclick="window.location.href='../sessao/criar_sessao.php?id=<?php echo $prontuario_id; ?>'" style="margin-right: 5px;">
                                    + Sessão
                                </button>

                                <a href="../sessao/prontuario_editar.php?id=<?php echo $prontuario_id; ?>" class="action-link" style="margin-right: 5px;">Editar</a>
                                
                                <form method="post" action="" style="display:inline;">
                                    <input type="hidden" name="prontuario_id" value="<?php echo $prontuario_id; ?>">
                                    <button type="submit" name="botao" value="Deletar_Prontuario" class="delete-btn" onclick="return confirm('Excluir este prontuário e todas as sessões associadas?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum prontuário ativo encontrado sob sua responsabilidade.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="#" class="text-link">Ver todos os prontuários (incluindo finalizados)</a>
        </div>
    </div>
    
</div>

<?php
// 2. INCLUI O FOOTER
require_once __DIR__ . '/../includes/footer.php'; 
?>