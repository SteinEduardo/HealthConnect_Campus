<?php
require_once __DIR__ . '/../../app/Controllers/sessao/criar_sessaoController.php';

$id_prontuario = isset($_GET['id']) ? intval($_GET['id']) : 0; 
if ($id_prontuario === 0) { die("Erro: ID de prontuário inválido na URL."); } 

$page_title = "Criar Nova Sessão";
require_once __DIR__ . '/../includes/header.php'; 
?>

<h1>Criar Sessão</h1>

<div class="dashboard-card">
    <form action="#" method="POST">
        
        <input type="hidden" name="id_prontuario" value="<?php echo $id_prontuario; ?>">
        
        <div class="form-full-width" style="margin-bottom: 20px;">
            <label for="data_horario">Data e Hora:</label>
            <input type="datetime-local" name="data_horario" required>
        </div>

        <div class="form-full-width" style="margin-bottom: 20px;">
            <label for="presenca">Presença:</label>
            <select name="presenca" required>
                <option value="presente">Presente</option>
                <option value="ausente">Ausente</option>
            </select>
        </div>

        <div class="form-full-width" style="margin-bottom: 20px;">
            <label for="observacoes">Observações:</label>
            <textarea name="observacoes" rows="8"></textarea>
        </div>

        <div class="btn-group-row" style="margin-top: 30px;">
            <a href="prontuario.php?id=<?php echo $id_prontuario; ?>" class="btn-back delete-btn" style="margin-right: 15px;">Voltar</a>
            
            <button type="submit" name="botao" value="Cadastrar" class="edit-btn">Criar</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php'; 
?>