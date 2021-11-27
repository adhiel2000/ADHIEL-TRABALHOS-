<?php

include_once('banco.php');

$sql = "SELECT P.IDPRODUTO,P.NOME, P.DESCRICAO, P.TIPO, P.QTD, F.RAZAO_SOCIAL
    FROM PRODUTO P
    INNER JOIN FORNECEDOR F
    ON F.IDFORNECEDOR = P.ID_FORNECEDOR;";

$result = $conexao->query($sql);

//print_r($resultado);

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
    <naav class="navegacao">
    <span class="email" style="padding-right: 30px; color:black;">Usuario: <?= $_SESSION['email'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="index.php" class="preto">voltar</a>
    </naav>
    <main class="principal">
        <div class="conteudo" style="background: black;">


            <table class="table text-white table-bg">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">QTD</th>
                        <th scope="col">ALTERAR QTD</th>
                        <th scope="col">RAZAO_SOCIAL</th>
                    </tr>
                </thead>
                <tbody style="color: white;">
                    <?php
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['NOME'] . "</td>";
                        echo "<td>" . $user_data['DESCRICAO'] . "</td>";
                        echo "<td>" . $user_data['TIPO'] . "</td>";
                        echo "<td>" . $user_data['QTD'] . "</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='editarestoque.php?id=$user_data[IDPRODUTO]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            </td>";
                        echo "<td>" . $user_data['RAZAO_SOCIAL'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </main>
    <footer class="rodape"></footer>
</body>

</html>