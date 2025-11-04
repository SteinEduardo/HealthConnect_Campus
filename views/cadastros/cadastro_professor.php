<?php
$tipo_cadastro = "professor";
$page_title = "Cadastrar Professor";

require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_professorController.php';
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
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group-field">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group-field">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group-field">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
            </div>

            <div class="form-group-field">
                <label for="nivel">Nível:</label>
                <input type="text" name="nivel" value="Professor" required>
            </div>
        </div>
        
        <input type="hidden" name="nivel" value="<?php echo ucfirst($tipo_cadastro); ?>">

        <div class="form-submit-container">
            <button type="submit" name="botao" value="Cadastrar" class="btn">Cadastrar <?php echo ucfirst($tipo_cadastro); ?></button>
        </div>
    </form>
</div>

<?php

require_once __DIR__ . '/../includes/footer.php'; 
?>