<?php
// isset -> serve para saber se uma variável está definida
include_once('banco.php');
if (isset($_POST['butao_alterar'])) {

    $id = $_POST['id'];
    $cnpj = $_POST['cnpj'];
    $razao_social = $_POST['razao_social'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sqlInsert = "UPDATE FORNECEDOR 
        SET CNPJ='$cnpj',RAZAO_SOCIAL='$razao_social',ENDERECO='$endereco',BAIRRO='$bairro',CEP='$cep',MUNICIPIO='$municipio',ESTADO='$estado',EMAIL='$email',TELEFONE='$telefone'
        WHERE IDFORNECEDOR=$id";
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: fornecedores.php');
