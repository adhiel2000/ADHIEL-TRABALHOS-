<?php

if (!empty($_GET['id'])) {

    include_once('banco.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT  * FROM  PRODUTO WHERE IDPRODUTO=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {

            $nome = $user_data['NOME'];
            $descricao = $user_data['DESCRICAO'];
            $tipo = $user_data['TIPO'];
            $fornecedor = $user_data['FORNECEDOR'];
            $qtd = $user_data['QTD'];
            $id_fornecedor = $user_data['ID_FORNECEDOR'];
        }

    }
    else 
    {
        header('Location: produtos.php');
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
        <span class="email">Usuario: <?= $_SESSION['email'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="estoque.php" class="preto">voltar</a>
    </nav>
    <main class="principal">
            <form action="saveEdit_estoque.php" method="POST" class="container" style="padding: 60px;">
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="number" class="form-control" id="qtd" name="qtd" value="<?php echo $qtd ?>">
                    <label for="qtd">QUANTIDADE RECEBIDA</label>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input class="btn btn-primary" type="submit" name="butao_alterar" value="ALTERAR" id="butao_alterar">
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>