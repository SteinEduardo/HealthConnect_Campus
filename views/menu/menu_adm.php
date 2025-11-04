<?php
require_once __DIR__ . '/../../app/Controllers/menu/menu_admController.php';

$page_title = "Menu Administrador - Dashboard";
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

<div class="dashboard-grid-cards">
    
    <div class="dashboard-card" style="margin-bottom: 20px;">
        <div class="card-header">
            <h2>Alunos (<?php echo count($alunos); ?>)</h2>
        </div>
        <table>
            <thead>
                <tr><th>Nome</th><th>Ações</th></tr>
            </thead>
            <tbody>
                <?php if (empty($alunos)): ?>
                    <tr><td colspan="2">Nenhum aluno encontrado.</td></tr>
                <?php else: ?>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><a href="menu_aluno.php?id=<?php echo $aluno['id']; ?>"><?php echo $aluno['nome']; ?></a></td>
                            <td>
                                <button type="button" class="edit-btn" onclick="window.location.href='../cadastros/cadastro_aluno_editar.php?id=<?php echo $aluno['id']; ?>'">Editar</button>
                                
                                <form method="post" action="" style="display:inline; margin-left: 10px;">
                                    <input type="hidden" name="tipo" value="Aluno">
                                    <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                                    <button type="submit" name="botao" value="Deletar" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar este aluno?')">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="dashboard-card" style="margin-bottom: 20px;">
        <div class="card-header">
            <h2>Professores (<?php echo count($professores); ?>)</h2>
        </div>
        <table>
            <thead>
                <tr><th>Nome</th><th>Ações</th></tr>
            </thead>
            <tbody>
                <?php if (empty($professores)): ?>
                    <tr><td colspan="2">Nenhum professor encontrado.</td></tr>
                <?php else: ?>
                    <?php foreach ($professores as $professor): ?>
                        <tr>
                            <td><a href="menu_professor.php?id=<?php echo $professor['id']; ?>"><?php echo $professor['nome']; ?></a></td>
                            <td>
                                <button type="button" class="edit-btn" onclick="window.location.href='../cadastros/cadastro_professor_editar.php?id=<?php echo $professor['id']; ?>'">Editar</button>
                                
                                <form method="post" action="" style="display:inline; margin-left: 10px;">
                                    <input type="hidden" name="tipo" value="Professor">
                                    <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
                                    <button type="submit" name="botao" value="Deletar" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar este professor?')">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="dashboard-card" style="margin-bottom: 20px;">
        <div class="card-header">
            <h2>Pacientes (<?php echo count($pacientes); ?>)</h2>
        </div>
        <table>
            <thead>
                <tr><th>Nome</th><th>Ações</th></tr>
            </thead>
            <tbody>
                <?php if (empty($pacientes)): ?>
                    <tr><td colspan="2">Nenhum paciente encontrado.</td></tr>
                <?php else: ?>
                    <?php foreach ($pacientes as $paciente): ?>
                        <?php $link = "../sessao/prontuario.php?id=" . urlencode($paciente['id']); ?>
                        <tr>
                            <td><a href="<?php echo $link; ?>"><?php echo $paciente['nome']; ?></a></td>
                            <td>
                                <button type="button" class="edit-btn" onclick="window.location.href='../cadastros/cadastro_paciente_editar.php?id=<?php echo $paciente['id']; ?>'">Editar</button>
                                
                                <form method="post" action="" style="display:inline; margin-left: 10px;">
                                    <input type="hidden" name="tipo" value="Paciente">
                                    <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">
                                    <button type="submit" name="botao" value="Deletar" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar este paciente?')">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
</div> <?php
require_once __DIR__ . '/../includes/footer.php'; 
?>