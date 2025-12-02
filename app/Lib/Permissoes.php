<?php

function verificar_acesso($current_page, $user_role) {
    
    $permissoes_necessarias = [
        
        'menu_adm.php' => 'adm',
        'cadastro_professor.php' => 'adm',
        
        'menu_professor.php' => 'professor',

        'menu_aluno.php' => 'aluno',
        'cadastro_aluno.php' => 'aluno',
        'cadastro_paciente.php' => 'aluno',
        'prontuario.php' => 'aluno',
        'criar_sessao.php' => 'aluno',
        'sessao_editar.php' => 'aluno',
    ];

    $min_role = 'aluno';
    foreach ($permissoes_necessarias as $page => $role) {
        if (strpos($current_page, $page) !== false) {
            $min_role = $role;
            break;
        }
    }
    
    if ($user_role === 'adm') {
        return true;
    }
    
    if ($user_role === 'professor' && ($min_role === 'professor' || $min_role === 'aluno')) {
        return true;
    }
    
    if ($user_role === 'aluno' && $min_role === 'aluno') {
        return true;
    }
    return false;
}
?>