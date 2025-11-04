<?php
// Arquivo: views/sessao/sessao_editar.php

// CRÍTICO: Inclui o Controller (que busca e processa a edição da sessão)
require_once __DIR__ . '/../../app/Controllers/sessao/sessao_editarController.php';

// Define o título da página
$page_title = "Editar Sessão ID: " . ($sessao['id'] ?? 'N/A');
require_once __DIR__ . '/../includes/header.php'; 

// Variável para o link Voltar (definida no Controller)
$id_paciente = $id_paciente ?? 0; 
?>

<h1>Editar Sessão</h1>

<div class="dashboard-card">
    <form method="POST">
        
        <div class="form-full-width" style="margin-bottom: 20px;">
            <label for="data_horario">Data e Hora:</label>
            <input type="datetime-local" name="data_horario" 
                   value="<?php echo date('Y-m-d\TH:i', strtotime($sessao['data'] ?? 'now')); ?>" required>
        </div>

        <div class="form-full-width" style="margin-bottom: 20px;">
            <label for="presenca">Presença:</label>
            <select name="presenca" required>
                <option value="presente" <?php echo ($sessao['anotacao'] ?? '') === 'presente' ? 'selected' : ''; ?>>Presente</option>
                <option value="ausente" <?php echo ($sessao['anotacao'] ?? '') === 'ausente' ? 'selected' : ''; ?>>Ausente</option>
            </select>
        </div>

        <div class="form-full-width" style="margin-bottom: 20px;">
            <label for="observacoes">Observações:</label>
            <textarea name="observacoes" rows="8"><?php echo htmlspecialchars($sessao['sessao_text'] ?? ''); ?></textarea>
        </div>

        <div class="btn-group-row" style="margin-top: 30px;">
            <a href="prontuario.php?id=<?php echo $id_paciente; ?>" class="btn-back delete-btn" style="margin-right: 15px;">Voltar</a>
            
            <button type="submit" name="botao" value="Salvar" class="edit-btn">Salvar</button>
        </div>
    </form>
</div>

<?php
// INCLUI O FOOTER
require_once __DIR__ . '/../includes/footer.php'; 
?>