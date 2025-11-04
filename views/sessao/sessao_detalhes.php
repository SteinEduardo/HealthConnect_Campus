<?php
require_once __DIR__ . '/../../app/Controllers/sessao/sessao_detalhesController.php';

$page_title = "Detalhes da Sessão ID: " . ($sessao['id'] ?? 'N/A');
require_once __DIR__ . '/../includes/header.php'; 
?>

<h1>Detalhes da Sessão</h1>

<div class="dashboard-card" style="margin-bottom: 25px;">
    
    <div class="details-section">
        
        <p><strong>Data e Hora:</strong> <?php echo date('d/m/Y H:i', strtotime($sessao['data'])); ?></p>
        
        <p><strong>Presença do Paciente:</strong> 
            <?php 
            $presenca = $sessao['anotacao'] ?? 'N/A';
            if ($presenca === 'presente') {
                echo 'Presente';
            } elseif ($presenca === 'ausente') {
                echo 'Ausente';
            } else {
                echo 'Não Registrado';
            }
            ?>
        </p>
        
        <p><strong>Observações:</strong></p>
        <div style="background-color: #f7f7f7; padding: 15px; border-radius: 6px; margin-top: 5px; white-space: pre-wrap;">
            <?php echo htmlspecialchars($sessao['sessao_text'] ?? 'Nenhuma observação registrada.'); ?>
        </div>
        
    </div>

    <div style="margin-top: 25px;">
        <a href="prontuario.php?id=<?php echo $id_paciente; ?>" class="btn-back edit-btn">Voltar ao Prontuário</a>
    </div>

</div>

<?php
require_once __DIR__ . '/../includes/footer.php'; 
?>