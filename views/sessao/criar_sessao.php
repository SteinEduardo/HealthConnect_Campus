<?php
    require_once __DIR__ . '/../../app/Controllers/sessao/criar_sessaoController.php'
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Sessão</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="container">
        <h1>Criar Sessão</h1>
        
        <form action="#" method="POST">
            <label for="data_horario">Data e Hora:</label>
            <input type="datetime-local" name="data_horario" required>
            
            <label for="presenca">Presença:</label>
            <select name="presenca" required>
                <option value="presente">Presente</option>
                <option value="ausente">Ausente</option>
            </select>
            
            <label for="observacoes">Observações:</label>
            <textarea name="observacoes" rows="4" cols="50"></textarea>
            
            <button type="submit" class="botao">Criar</button>
        </form>

        <!-- Botão Voltar -->
        <div class="voltar-container">
            <form action="prontuario.php?id=<?php echo $id_paciente; ?>" method="get">
                <button type="submit" class="voltar-btn">Voltar</button>
            </form>
        </div>
    </div>
</body>
</html>
