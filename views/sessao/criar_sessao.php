<?php
    require_once __DIR__ . '/../../app/Controllers/sessao/criar_sessaoController.php';

    $id_prontuario = isset($_GET['id']) ? intval($_GET['id']) : 0; 
    
    if ($id_prontuario === 0) { die("Erro: ID de prontuário inválido na URL."); } 
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Sessão</title>
    <link rel="stylesheet" href="../../public/assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Criar Sessão</h1>
        
        <form action="#" method="POST">
            
            <input type="hidden" name="id_prontuario" value="<?php echo $id_prontuario; ?>">
            
            <label for="data_horario">Data e Hora:</label>
            <input type="datetime-local" name="data_horario" required>
            
            <label for="presenca">Presença:</label>
            <select name="presenca" required>
                <option value="presente">Presente</option>
                <option value="ausente">Ausente</option>
            </select>
            
            <label for="observacoes">Observações:</label>
            <textarea name="observacoes" rows="4" cols="50" name="observacoes"></textarea> 
            
            <button type="submit" name="botao" value="Cadastrar" class="botao">Criar</button>
        </form>

        <div class="voltar-container">
            <button type="button" class="voltar-btn" onclick="window.location.href='prontuario.php?id=<?php echo $id_prontuario; ?>'">Voltar</button>
        </div>
    </div>
</body>
</html>