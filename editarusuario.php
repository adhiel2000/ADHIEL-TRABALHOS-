<?php

if (!empty($_GET['id'])) {

    include_once('banco.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT  * FROM  USUARIO WHERE IDUSUARIO=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {

            $nome = $user_data['NOME'];
            $funcao = $user_data['FUNCAO'];
            $data_admissao = $user_data['ADMISSAO'];
            $login = $user_data['USUARIOCADASTRO'];
            $senha = $user_data['SENHACADASTRO'];
        }
        print_r($nome);

    }
    else 
    {
        header('Location: usuarios.php');
    }
}



?>


<?php

session_start();

if ($_COOKIE['email']) {
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
        <a href="usuarios.php" class="preto">voltar</a>
    </nav>
    <main class="principal">
        <div class="conteudo">


            <form action="saveEdit_usuario.php" class="container" method="POST" style="padding: 60px;">
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">
                    <label for="nome">Nome</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="funcao" name="funcao" value="<?php echo $funcao ?>">
                    <label for="funcao">Função</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="date" class="form-control" id="data_admissao" name="data_admissao" value="<?php echo $data_admissao ?>">
                    <label for="data_admissao">Data Admissão</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $login ?>">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="senha" placeholder="senha" name="senha" value="<?php echo $senha ?>">
                    <label for="senha">Password</label>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input class="btn btn-primary" type="submit" name="butao_alterar" value="ALTERAR" id="butao_alterar">
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>