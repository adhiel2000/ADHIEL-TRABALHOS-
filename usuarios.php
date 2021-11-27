<?php
session_start();

//INSERINDO OS VALORES PARA O BANCO DO FORMULARIO
if (isset($_POST['butao_cadastrar'])) {
    //print_r($_POST['nome']);
    //print_r('<br>');
    //print_r($_POST['funcao']);
    //print_r('<br>');
    //print_r($_POST['data admissao']);
    // print_r('<br>');

    include_once('banco.php');
    $nome = $_POST['nome'];
    $funcao = $_POST['funcao'];
    $data_admissao = $_POST['data_admissao'];
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO USUARIO(NOME,FUNCAO,ADMISSAO,USUARIOCADASTRO,SENHACADASTRO) 
    VALUES('$nome','$funcao','$data_admissao', '$login','$senha')");
}




?>


<?php

session_start();

if ($_COOKIE['email =']) {
    $_SESSION['email'] = $_COOKIE['email'];
}
if (!$_SESSION['email']) {
    header('Location: login.php');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https: //fonts.googleapis.com/css2? family = Oswald: wght @ 300 & display = swap " rel=" stylesheet ">
    <link rel="stylesheet" href="css\estilo.css">
    <link rel="stylesheet" href="css\exercicio.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TCC</title>
</head>

<body class="usuarios">
    <header class="cabecalho">
        <h1>NOME DA EMPRESA</h1>
    </header>
    <nav class="navegacao">
        <span class="email" style="padding-right: 30px; color:black;">Usuario: <?= $_SESSION['email'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="index.php" class="preto">voltar</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <?php

            /*

            if ($conexao->connect_errno) {
                echo " Conexão não efetuada com sucesso";
            } else {
                echo "Conexao efetuada" . $result;
            }
            */
            /*
            if (isset($_POST['butao_cadastrar'])) {
                print_r('<br>');
                print_r($_POST['nome']);
                print_r('<br>');
                print_r($_POST['funcao']);
                print_r('<br>');
                print_r($_POST['data_admissao']);
                print_r('<br>');
                print_r($_POST['usuario']);
                print_r('<br>');
                print_r($_POST['senha']);
                print_r('<br>');
            }
            */
            if (count($_POST) > 0) {
                if (!filter_input(INPUT_POST, "nome")) {
                    echo 'Nome é obrigatório', '<br>';
                }
            }

            if (count($_POST) > 0) {
                if (!filter_input(INPUT_POST, "funcao")) {
                    echo 'Função é obrigatório!', '<br>';
                }
            }


            if (count($_POST) > 0) {
                if (!filter_input(INPUT_POST, "usuario")) {
                    echo 'Usuário é obrigatório!', '<br>';
                }
            }

            if (count($_POST) > 0) {
                if (!filter_input(INPUT_POST, "senha")) {
                    echo 'Senha é obrigatório!', '<br>';
                }
            }



            ?>
            <!--<form action="formulario">
              
              <div class="inputBox">
                  <input type="number" name="nome" id="nome" class="inputUser" required>
                  <label for="nome" class="labeliIput">Nome</label>
              </div>
              <div class="inputBox">
                  <input type="text" name="funcao" id="funcao" class="inputUser" required>
                  <label for="funcao" class="labeliIput">Função</label>
              </div>
              <div class="inputBox">
                  <input type="date" name="data" id="data" class="inputUser" required>
                  <label for="endereco" class="labeliIput">Data de Admissão</label>
              </div>
              <div class="inputBox">
                  <input type="text" name="usuario" id="usuario" class="inputUser" required>
                  <label for="usuario" class="labeliIput">Usuario</label>
              </div>
              <div class="inputBox">
                  <input type="text" name="senha" id="senha" class="inputUser" required>
                  <label for="senha" class="labeliIput">Senha</label>
              </div>
              <input type="submit" name="submit" id="submit" value="Cadastrar">
              <input type="submit" name="submit" id="submit" value="Alterar">
              <input type="submit" name="submit" id="submit" value="Excluir">
            </form> -->


            <form method="POST" action="buscar.php">
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label class="form" name="buscar" id="buscar" type="text" placeholder="BUSCAR" aria-label="Search" style="width: 15%; padding:5px;">USUARIOS CADASTRADOS:</label>
                    <button name="buscar" id="buscar" type="submit">ABRIR</button>
                    <!-- <input class="btn btn-secondary" type="submit" value="PESQUISAR">-->
                    <!--<button class="btn btn-secondary" type="button">BUSCAR</button> -->
                </div>
            </form>
            <br>
            <form action="usuarios.php" class="container" method="POST" style="padding: 60px;">
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $_POST['nome'] ?>">
                    <label for="nome">Nome</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="funcao" name="funcao" value="<?= $_POST['funcao'] ?>">
                    <label for="funcao">Função</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="date" class="form-control" id="data_admissao" name="data_admissao" value="<?= $_POST['data_admissao'] ?>">
                    <label for="data_admissao">Data Admissão</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $_POST['usuario'] ?>">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="senha" placeholder="senha" name="senha" value="<?= $_POST['senha'] ?>">
                    <label for="senha">Password</label>
                </div>
                <input class="btn btn-primary" type="submit" name="butao_cadastrar" value="CADASTRAR" id="butao_cadastrar">
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>