<?php
// Arquivo: views/menu/menu_adm.php

// CRÍTICO: Inclui o Controller 
require_once __DIR__ . '/../../app/Controllers/menu/menu_admController.php';

// Define o título da página (usado pelo header.php)
$page_title = "Menu Administrador - Dashboard";

// 1. INCLUI O HEADER (Abre o layout de dashboard e a sidebar)
require_once __DIR__ . '/../includes/header.php'; 
?>

<h1><?php echo $page_title; ?></h1>

<div class="btn-group-row">
    <button onclick="window.location.href='../cadastros/cadastro_professor.php'" class="btn">Cadastrar Professor</button>
    <button onclick="window.location.href='../cadastros/cadastro_aluno.php'" class="btn">Cadastrar Aluno</button>
    <button onclick="window.location.href='../cadastros/cadastro_paciente.php'" class="btn">Cadastrar Paciente</button>
</div>

<form class="form-filtro" method="GET">
    <input type="text" name="filtro" placeholder="Filtrar por nome" value="<?php echo htmlspecialchars($filtro ?? ''); ?>">
    <button type="submit">Filtrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (isset($result) && mysqli_num_rows($result) > 0) {
            while ($coluna = mysqli_fetch_array($result)) {
                
                // Lógica de Links: views/menu/ -> views/sessao/
                $link = '#';
                if ($coluna['tipo'] === 'Aluno') {
                    $link = "menu_aluno.php?id=" . urlencode($coluna['id']);
                } elseif ($coluna['tipo'] === 'Professor') {
                    $link = "menu_professor.php?id=" . urlencode($coluna['id']);
                } elseif ($coluna['tipo'] === 'Paciente') {
                    $link = "../sessao/prontuario.php?id=" . urlencode($coluna['id']);
                }
        ?>
            <tr>
                <td><?php echo $coluna['tipo']; ?></td>
                <td><a href="<?php echo $link; ?>"><?php echo $coluna['nome']; ?></a></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="tipo" value="<?php echo $coluna['tipo']; ?>">
                        <input type="hidden" name="id" value="<?php echo $coluna['id']; ?>">
                        <button type="submit" name="botao" value="Deletar" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php 
            }
        } else { 
            echo '<tr><td colspan="3">Nenhum registro encontrado.</td></tr>';
        } 
        ?>
    </tbody>
</table>


<?php
// 3. INCLUI O FOOTER (Fecha o layout de dashboard)
require_once __DIR__ . '/../includes/footer.php'; 
?>