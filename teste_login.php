<?php
session_start();
//print_r($_REQUEST);

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    //acessar sistema
    include_once('banco.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //print_r('Email: ' . $email);
    //print_r('<br>');  
    //print_r('Senha: ' . $senha);
    $sql = "SELECT  * FROM usuario WHERE usuariocadastro = '$email' and senhacadastro = '$senha'";
    $result = $conexao->query($sql);
    $num = mysqli_num_rows($result);

    // print_r($sql);
    // print_r($result); 
    /*
    if($num == 1){
        while($nivel = mysqli_fetch_array($result)){
            $adm = $nivel['funcao'];
            $nome = $nivel['nome'];

            if($adm == 'admin'){
                $_SESSION['funcao'] = $nome;
                header('location: index.php');
            }else {
                $_SESSION['estorquista'];
                header('location: index.php')
            }
            
        }
    }
    */

    if (mysqli_num_rows($result) < 1) {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location: login.php');

    } else {

        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location: index.php');

    }
} else {
    //não acessa
    header('location: login.php');
}
