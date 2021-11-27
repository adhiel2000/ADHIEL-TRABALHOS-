<?php
// isset -> serve para saber se uma variável está definida
include_once('banco.php');
if (isset($_POST['butao_alterar'])) {

    $id = $_POST['id'];
    $qtd = $_POST['qtd'];
    
    $sqlInsert = "UPDATE PRODUTO 
        SET QTD='$qtd'
        WHERE IDPRODUTO=$id";
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: estoque.php');