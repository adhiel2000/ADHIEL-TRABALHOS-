<?php

if (!empty($_GET['id'])) {

    include_once('banco.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT  * FROM  FORNECEDOR WHERE IDFORNECEDOR=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM FORNECEDOR WHERE IDFORNECEDOR=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
    header('Location: fornecedores.php');
}



?>


