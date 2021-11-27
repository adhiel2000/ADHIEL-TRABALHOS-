<?php




$servidor = '127.0.0.1:3307';
$usuario = 'root';
$senha = 'root';
$banco = 'tcc_banco';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
/*
if ($conexao->connect_errno) {
    echo "Erro";
} else {
    echo " Conexão efetuada com sucesso";
}
*/



