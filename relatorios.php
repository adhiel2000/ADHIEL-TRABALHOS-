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
        <span class="usuario">Usuario: <?= $_SESSION['usuario'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="index.php" class="preto">voltar</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <form class="container" style="padding: 60px;">
                <div class="form" style="margin-bottom: 30px; display: flex;">    
                <input class="form" type="date" placeholder="Search" aria-label="Search" style="width: 50%; padding:5px;">
                <button class="btn btn-secondary" type="submit">BUSCAR</button>
                </div>
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label class="container" for="staticName">NOME PRODUTO</label>
                    <input type="text" class="form-control-plaintext" id="floatingInput" value="PRODUTO" disabled>
                </div>
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label class="container" for="staticName">DESCRIÇÃO:</label>
                    <input type="text" class="form-control-plaintext" id="floatingInput" value="DESCRIÇÃO DO PRODUTO" disabled>
                </div>
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label class="container" for="staticName">TIPO:</label>
                    <input type="text" class="form-control-plaintext" id="floatingInput" value="TIPO DO PRODUTO" disabled>
                </div>
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label class="container" for="staticName">FORNECEDOR:</label>
                    <input type="text" class="form-control-plaintext" id="floatingInput" value="FORNECEDOR" disabled>
                </div>
                <button type="button" class="btn btn-secondary">EXPORTAR RELATÓRIO</button>
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>