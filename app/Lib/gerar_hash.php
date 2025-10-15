<?php
// GERA O HASH CRIPTOGRAFADO PARA A SENHA 'senha123'
$hash = password_hash('senha123', PASSWORD_DEFAULT);
echo "O HASH de 'senha123' é: " . $hash;
?>