<?php
session_start();

//INSERINDO OS VALORES PARA O BANCO DO FORMULARIO
if (isset($_POST['butao_fornecedor'])) {
    //print_r($_POST['nome']);
    //print_r('<br>');
    //print_r($_POST['funcao']);
    //print_r('<br>');
    //print_r($_POST['data admissao']);
    // print_r('<br>');

    include_once('banco.php');
    $cnpj = $_POST['cnpj'];
    $razao_social = $_POST['razao_social'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $resultfor = mysqli_query($conexao, "INSERT INTO FORNECEDOR(CNPJ,RAZAO_SOCIAL,ENDERECO,BAIRRO,CEP,MUNICIPIO,ESTADO,EMAIL,TELEFONE) 
    VALUES('$cnpj','$razao_social','$endereco', '$bairro','$cep','$municipio','$estado','$email','$telefone')");
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
    <span class="email" style="padding-right: 30px; color:black;">Usuario: <?= $_SESSION['email'] ?></span>
        <a href="logout.php" class="preto">Sair</a>
        <a href="index.php" class="preto">voltar</a>
    </naav>
    <main class="principal">
        <div class="conteudo">
            <!--<form action="formulario">
              
              <div class="inputBox">
                  <label for="cnpj" class="labeliIput">CNPJ</label>
                  <input type="number" name="cnpj" id="cnpj" class="inputUser" required>
              </div>
              <div class="inputBox">
                  <input type="text" name="razao_social" id="razao_social" class="inputUser" required>
                  <label for="razao_social" class="labeliIput">Razão Social</label>
              </div>
              <div class="inputBox">
                  <input type="text" name="endereco" id="endereco" class="inputUser" required>
                  <label for="endereco" class="labeliIput">Endereço</label>
              </div>
              <div class="inputBox">
                  <input type="text" name="bairro" id="bairro" class="inputUser" required>
                  <label for="bairro" class="labeliIput">bairro</label>
              </div>
              <div class="inputBox">
                  <input type="number" name="cep" id="cep" class="inputUser" required>
                  <label for="cep" class="labeliIput">CEP</label>
              </div>
              <div class="inputBox">
                  <input type="text" name="municipio" id="municipio" class="inputUser" required>
                  <label for="municipio" class="labeliIput">Municipio</label> 
              </div>
              <div class="inputBox">
                  <input type="text" name="estado" id="estado" class="inputUser" required>
                  <label for="estado" class="labeliIput">Estado</label>
              </div>
              <div class="inputBox">
                  <input type="email" name="email" id="email" class="inputUser" required>
                  <label for="email" class="labeliIput">Email</label>
              </div>
              <div class="inputBox">
                  <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                  <label for="telefone" class="labeliIput">Telefone</label>
              </div>
              <input type="submit" name="submit" id="submit" value="Cadastrar">
              <input type="submit" name="submit" id="submit" value="Alterar">
              <input type="submit" name="submit" id="submit" value="Excluir">
            </form> -->
            <form method="POST" action="listar_fornecedor.php">
                <div class="form" style="margin-bottom: 30px; display: flex;">
                    <label style="padding-right: 20px;">FORNECEDORES CADASTRADOS:</label>
                    <button name="buscar" id="buscar" type="submit">ABRIR</button>
                    <!-- <input class="btn btn-secondary" type="submit" value="PESQUISAR">-->
                    <!--<button class="btn btn-secondary" type="button">BUSCAR</button> -->
                </div>
            </form>
            <form action="fornecedores.php" class="container" method="POST" style="padding: 60px;">
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?= $_POST['cnpj'] ?>" >
                    <label for="cnpj">CNPJ</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="razao_social" name="razao_social"  value="<?= $_POST['razao_social'] ?>">
                    <label for="razao_social">RAZÃO SOCIAL</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="endereco" name="endereco"  value="<?= $_POST['endereco'] ?>">
                    <label for="endereco">ENDEREÇO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="bairro" name="bairro"  value="<?= $_POST['bairro'] ?>">
                    <label for="bairro">BAIRRO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="cep" name="cep"  value="<?= $_POST['cep'] ?>">
                    <label for="cep">CEP</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="text" class="form-control" id="municipio" name="municipio"  value="<?= $_POST['municipio'] ?>">
                    <label for="municipio">MUNICIPIO</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <select class="form-select" id="estado" name="estado">
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
                    <input type="email" class="form-control" id="email" name="email"  value="<?= $_POST['email'] ?>">
                    <label for="email">EMAIL</label>
                </div>
                <div class="form-floating" style="margin-bottom: 30px;">
                    <input type="tel" class="form-control" id="telefone" name="telefone"  value="<?= $_POST['telefone'] ?>">
                    <label for="telefone">TELEFONE</label>
                </div>
                <input class="btn btn-primary" type="submit" name="butao_fornecedor" value="CADASTRAR" id="butao_cadastrar">
            </form>
        </div>
    </main>
    <footer class="rodape"></footer>
</body>

</html>