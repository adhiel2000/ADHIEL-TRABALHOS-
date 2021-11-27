<?php
/*
session_start();

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['email'];
*/
if (isset($_POST['butao_cadastrar'])) {
    //print_r($_POST['nome']);
    //print_r('<br>');
    //print_r($_POST['funcao']);
    //print_r('<br>');
    //print_r($_POST['data admissao']);
    // print_r('<br>');

    include_once('banco.php');
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $fornecedor = $_POST['fornecedor'];
    $qtd = $_POST['qtd'];
    $id_fornecedor = $_POST['id_fornecedor'];

    $result = mysqli_query($conexao, "INSERT INTO PRODUTO(NOME,DESCRICAO,TIPO,FORNECEDOR,QTD,ID_FORNECEDOR) 
        VALUES('$nome','$descricao','$tipo', '$fornecedor','$qtd','$id_fornecedor')");
}





/*
if ($_COOKIE['email']) {
    $_SESSION['email'] = $_COOKIE['email'];
}
if (!$_SESSION['email']) {
    header('Location: login.php');
*/
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
        <a href="index.php" class="preto">voltar</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <form method="POST" action="lista_produto.php">
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label style="padding-right: 20px;">PRODUTOS CADASTRADOS:</label>
                    <button name="buscar" id="buscar" type="submit">ABRIR</button>
                </div>
            </form>
            <br>
            <form action="produtos.php" method="POST" class="container" style="padding: 60px;">
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $_POST['nome'] ?>">
                    <label for="nome">NOME</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $_POST['descricao'] ?>">
                    <label for="descricao">DESCRIÇÃO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $_POST['tipo'] ?>">
                    <label for="tipo">TIPO</label>
                </div>
                
                <select style="padding: 15px; margin-bottom: 20px;" class="form-select" aria-label="Default select example" id="fornecedor" name="fornecedor" value="<?= $_POST['fornecedor'] ?>">
                    <option>FORNECEDORES</option>
                    <?php
                    include_once('banco.php');
                    $result_fornecedor = "SELECT * FROM FORNECEDOR";
                    $resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);
                    while ($row_fornecedor = mysqli_fetch_assoc($resultado_fornecedor)) { ?>
                        <option value="<?php echo $row_fornecedor['RAZAO_SOCIAL']; ?>"><?php echo $row_fornecedor['RAZAO_SOCIAL']; ?>
                        </option> <?php
                                }

                                    ?>

                </select>

                <!--
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="<?= $_POST['fornecedor'] ?>">
                    <label for="fornecedor">FORNECEDOR</label>
                </div>
-->
                <!--
                <div class="form-floating" style="margin-bottom: 30px;">
                    <select class="form-select" id="inputGroupSelect01">
                        <option value="1"></option>
                    </select>
                    <label for="floatingInput">FORNECEDOR</label>
                </div>
                -->
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="number" class="form-control" id="qtd" name="qtd" value="<?= $_POST['qtd'] ?>">
                    <label for="qtd">QUANTIDADE RECEBIDA</label>
                </div>

                <select style="padding: 15px; margin-bottom: 20px;" class="form-select" aria-label="Default select example" id="id_fornecedor" name="id_fornecedor" value="<?= $_POST['fornecedor'] ?>">
                    <option>IDFORNECEDORES</option>
                    <?php
                    include_once('banco.php');
                    $result_idfornecedor = "SELECT * FROM FORNECEDOR";
                    $resultado_idfornecedor = mysqli_query($conexao, $result_idfornecedor);
                    while ($row_idfornecedor = mysqli_fetch_assoc($resultado_idfornecedor)) { ?>
                        <option value="<?php echo $row_idfornecedor['IDFORNECEDOR']; ?>"><?php echo 'FORNECEDOR: ' . $row_idfornecedor['RAZAO_SOCIAL']; echo '---->'; echo ' TEM O ID---->  '. $row_idfornecedor['IDFORNECEDOR']; ?>
                        </option> <?php
                                }

                                    ?>

                </select>



                <!--
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="id_fornecedor" name="id_fornecedor" value="<?= $_POST['id_fornecedor'] ?>">
                    <label for="fornecedor">ID DO FORNECEDOR</label>
                </div>
                            -->
                <input class="btn btn-primary" type="submit" name="butao_cadastrar" value="CADASTRAR" id="butao_cadastrar">
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>