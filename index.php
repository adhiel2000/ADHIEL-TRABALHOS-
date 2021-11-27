<?php

session_start();
if($_COOKIE['email']) {
    $_SESSION['email'] = $_COOKIE['email'];
}
if(!$_SESSION['email']) {
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
    <title>TCC</title>
</head>

<body>
    <header class="cabecalho">
        <h1>NOME DA EMPRESA</h1>
    </header>
    <nav class="navegacao">
        <span class="usuario">Usuario: <?= $_SESSION['email'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            
            <?php require_once('menu.php'); ?>
        </div>
    </main>
    <footer class="rodape">
        Sitema Recebimento Estoque <?php $hoje = date('d/m/Y');
                                    echo $hoje; ?>
    </footer>
</body>

</html>