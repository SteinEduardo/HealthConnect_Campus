<?php
require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_alunoController.php';

$tipo_cadastro = "aluno";
$page_title = "Cadastrar Aluno";

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
                <label for="ra">RA:</label>
                <input type="text" name="ra" required>
            </div>

            <div class="form-group-field">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
            </div>
        </div>

        <div class="form-group">
            <label for="professor_email">Professor Responsável (Email):</label>
            <input type="email" id="professor_email" name="professor_email" required>
        </div>

        <div class="form-full-width">
            <label for="genero">Gênero:</label>
            <select name="genero">
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
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