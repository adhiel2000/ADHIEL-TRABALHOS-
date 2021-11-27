<?php

if (!empty($_GET['id'])) {

    include_once('banco.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT  * FROM  FORNECEDOR WHERE IDFORNECEDOR=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {

            $cnpj = $user_data['CNPJ'];
            $razao_social = $user_data['RAZAO_SOCIAL'];
            $endereco = $user_data['ENDERECO'];
            $bairro = $user_data['BAIRRO'];
            $cep = $user_data['CEP'];
            $municipio = $user_data['MUNICIPIO'];
            $estado = $user_data['ESTADO'];
            $email = $user_data['EMAIL'];
            $telefone = $user_data['TELEFONE'];
        }
        print_r($cnpj);

    }
    else 
    {
        header('Location: fornecedores.php');
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
    <naav class="navegacao">
        <span class="usuario">Usuario: <?= $_SESSION['usuario'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="index.php" class="preto">voltar</a>
    </naav>
    <main class="principal">
        <div class="conteudo">
            <form action="saveEdit_fornecedor.php" class="container" method="POST" style="padding: 60px;">
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="cnpj" name="cnpj"  value="<?php echo $cnpj ?>" >
                    <label for="cnpj">CNPJ</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="razao_social" name="razao_social"   value="<?php echo $razao_social ?>">
                    <label for="razao_social">RAZÃO SOCIAL</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="endereco" name="endereco"   value="<?php echo $endereco ?>">
                    <label for="endereco">ENDEREÇO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="bairro" name="bairro"   value="<?php echo $bairro ?>">
                    <label for="bairro">BAIRRO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="cep" name="cep"   value="<?php echo $cep ?>">
                    <label for="cep">CEP</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="municipio" name="municipio"   value="<?php echo $municipio ?>">
                    <label for="municipio">MUNICIPIO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <select class="form-select" id="estado" name="estado"  value="<?php echo $estado ?>">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RR">RR</option>
                        <option value="RO">RO</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                    <label for="estado">ESTADO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="email" class="form-control" id="email" name="email"   value="<?php echo $email ?>">
                    <label for="email">EMAIL</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="tel" class="form-control" id="telefone" name="telefone"   value="<?php echo $telefone ?>">
                    <label for="telefone">TELEFONE</label>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input class="btn btn-primary" type="submit" name="butao_alterar" value="ALTERAR" id="butao_alterar">
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>