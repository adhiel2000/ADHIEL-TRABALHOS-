<?php

if (!empty($_GET['id'])) {

    include_once('banco.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT  * FROM  USUARIO WHERE IDUSUARIO=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM USUARIO WHERE IDUSUARIO=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
    header('Location: usuarios.php');
}



?>



