<?php

if (!empty($_GET['id'])) {

    include_once('banco.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT  * FROM  PRODUTO WHERE IDPRODUTO=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM PRODUTO WHERE IDPRODUTO=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
    header('Location: produtos.php');
}



?>
