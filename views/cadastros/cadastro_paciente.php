<?php
// Arquivo: views/cadastros/cadastro_paciente.php

// CRÍTICO: Inclui o Controller de Paciente
require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_pacienteController.php';

// DEFINE O TIPO DE CADASTRO E O TÍTULO (Necessário para a View)
$tipo_cadastro = "paciente";
$page_title = "Cadastrar Paciente";

// 1. INCLUI O HEADER
require_once __DIR__ . '/../includes/header.php'; 
?>

<h1><?php echo $page_title; ?></h1>

<div class="form-grid">
    <form action="#" method="post">
        
        <div class="form-row">
            <div class="form-group-field">
                <label for="nome">Nome Completo:</label>
                <input type="text" name="nome" required>
            </div>
            <div class="form-group-field">
                <label for="data_abertura">Data de Abertura:</label>
                <input type="date" name="data_abertura" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group-field">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" required>
            </div>
            <div class="form-group-field">
                <label for="genero">Gênero:</label>
                <select name="genero" required>
                    <option value="">Selecione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
        </div>
        
        <div class="form-full-width">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" required>
        </div>

        <div class="form-row">
            <div class="form-group-field">
                <label for="telefone">Telefone:</label>
                <input type="number" name="telefone" required>
            </div>
            <div class="form-group-field">
                <label for="email">Email:</label>
                <input type="email" name="email">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group-field">
                <label for="contato_emergencia">Contato Emergencial:</label>
                <input type="number" name="contato_emergencia">
            </div>
            <div class="form-group-field">
                <label for="escolaridade">Escolaridade:</label>
                <input type="text" name="escolaridade">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group-field">
                <label for="ocupacao">Ocupação:</label>
                <input type="text" name="ocupacao">
            </div>
            <div class="form-group-field">
                <label for="estagiario">Aluno Responsável:</label>
                <input type="text" name="estagiario" required>
            </div>
        </div>

        <div class="form-full-width">
            <label for="necessidade">Queixa Principal / Necessidade:</label>
            <textarea name="necessidade"></textarea>
        </div>

        <div class="form-full-width">
            <label for="orientador">Professor Supervisor:</label>
            <input type="text" name="orientador" required>
        </div>
        
        <input type="hidden" name="nivel" value="<?php echo ucfirst($tipo_cadastro); ?>">
        
        <div class="form-submit-container">
            <button type="submit" name="botao" value="Cadastrar" class="btn">Cadastrar <?php echo ucfirst($tipo_cadastro); ?></button>
        </div>
    </form>
</div>


<?php
// INCLUI O FOOTER
require_once __DIR__ . '/../includes/footer.php'; 
?>