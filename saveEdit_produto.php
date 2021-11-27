<?php
// isset -> serve para saber se uma variável está definida
include_once('banco.php');
if (isset($_POST['butao_alterar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $fornecedor = $_POST['fornecedor'];
    $qtd = $_POST['qtd'];
    $id_fornecedor = $_POST['id_fornecedor'];

    $sqlInsert = "UPDATE PRODUTO 
        SET NOME='$nome',DESCRICAO='$descricao',TIPO='$tipo',FORNECEDOR='$fornecedor',QTD='$qtd', ID_FORNECEDOR='$id_fornecedor'
        WHERE IDPRODUTO=$id";
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: produtos.php');
