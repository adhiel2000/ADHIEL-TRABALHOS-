<?php
// isset -> serve para saber se uma variável está definida
include_once('banco.php');
if (isset($_POST['butao_alterar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $funcao = $_POST['funcao'];
    $data_admissao = $_POST['data_admissao'];
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sqlInsert = "UPDATE USUARIO 
        SET NOME='$nome',FUNCAO='$funcao',ADMISSAO='$data_admissao',USUARIOCADASTRO='$login',SENHACADASTRO='$senha'
        WHERE IDUSUARIO=$id";
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: usuarios.php');
