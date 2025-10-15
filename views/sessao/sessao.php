<html>
<body>
    <h1>Detalhes da Sessão</h1>
    
    <p><strong>Data e Hora:</strong> <?php echo $sessao['data_horario']; ?></p>
    <p><strong>Presença do Paciente:</strong> <?php echo $sessao['presenca'] ? 'Presente' : 'Ausente'; ?></p>
    <p><strong>Observações:</strong> <?php echo nl2br(htmlspecialchars($sessao['observacoes'])); ?></p>
    
    <br>
    <a href="sessao_editar.php?sessao_id=<?php echo $sessao['id']; ?>">Editar Sessão</a>
    <br><br>
    <a href="prontuario.php?id=<?php echo $sessao['paciente_id']; ?>">Voltar</a>
</body>
</html>
