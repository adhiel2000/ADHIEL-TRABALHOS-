<?php



if (isset($_POST['buscar'])) {
    include_once('banco.php');

    $sql = "SELECT * FROM fornecedor ORDER BY idfornecedor ASC";

    $result = $conexao->query($sql);

    //print_r($resultado);
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
<style>
    body {
        background: linear-gradient(to right);
        color: white;
        text-align: center;
    }

    .table-bg {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 15px 15px 0 0;
    }
</style>


<body class="email">
    <header class="cabecalho">
        <h1>NOME DA EMPRESA</h1>
    </header>
    <nav class="navegacao">
        <span class="email">Usuario: <?= $_SESSION['email'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="fornecedores.php" class="preto">voltar</a>
    </nav>
    <main class="principal">
        <div class="conteudo" style="background: black;">

            <table class="table text-white table-bg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">RAZÃO SOCIAL</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">BAIRRO</th>
                        <th scope="col">CEP</th>
                        <th scope="col">MUNICIPIO</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody style="color: white;">
                    <?php
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['IDFORNECEDOR'] . "</td>";
                        echo "<td>" . $user_data['CNPJ'] . "</td>";
                        echo "<td>" . $user_data['RAZAO_SOCIAL'] . "</td>";
                        echo "<td>" . $user_data['ENDERECO'] . "</td>";
                        echo "<td>" . $user_data['BAIRRO'] . "</td>";
                        echo "<td>" . $user_data['CEP'] . "</td>";
                        echo "<td>" . $user_data['MUNICIPIO'] . "</td>";
                        echo "<td>" . $user_data['ESTADO'] . "</td>";
                        echo "<td>" . $user_data['EMAIL'] . "</td>";
                        echo "<td>" . $user_data['TELEFONE'] . "</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='editarfornecedor.php?id=$user_data[IDFORNECEDOR]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete_fornecedor.php?id=$user_data[IDFORNECEDOR]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
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