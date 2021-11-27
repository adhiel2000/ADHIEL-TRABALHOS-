<?php
/*
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

if ($_POST['email']) {
    $usuarios = [
        [
            "nome" => "Adhiel Barbalho",
            "email" => "adhiel@gmail.com",
            "senha" => "1234567",
        ],
        [
            "nome" => "Beatriz Soares",
            "email" => "beatriz@gmail.com",
            "senha" => "7654321",
        ],
    ];

    foreach ($usuarios as $usuario) {
        $emailValido = $email === $usuario['email'];
        $senhaValida = $senha === $usuario['senha'];

        if ($emailValido && $senhaValida) {
            $_SESSION['erros'] = null;
            $_SESSION['usuario'] = $usuario['nome'];
            $exp = time() + 60 * 60 * 24 * 30;
            setcookie('usuario', $usuario['nome'], $exp);
            header('Location: index.php');
        }
    }

    if (!$_SESSION['usuario']) {
        $_SESSION['erros'] = ['Usuário/Senha inválido!'];
    }
}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https: //fonts.googleapis.com/css2? family = Oswald: wght @ 300 & display = swap " rel=" stylesheet ">
    <link rel="stylesheet" href="css\estilo.css">
    <link rel="stylesheet" href="css\exercicio.css">
    <link rel="stylesheet" href="css\login2.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TCC</title>
</head>

<body class="login">
    <header class="cabecalho">
        <h1>Seja bem vinho</h1>
    </header>
    <main class="principal">
        <div class="conteudo">
            <?php
            
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo 'Email invalido', '<br>';
            }

          
            if (count($_POST) > 0) {
                if (!filter_input(INPUT_POST, "email")) {
                    echo 'Email é obrigatório!', '<br>';
                }
            }
            
            ?>
            <h3>Indetifique-se</h3>
            <?php if ($_SESSION['erros']) : ?>
                <div class="erros">
                    <?php foreach ($_SESSION['erros'] as $erro) : ?>
                        <p><?= $erro ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif 
            ?>
            <form action="teste_login.php" method="post">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="<?= $_POST['email'] ?>">
                </div>
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" value="<?= $_POST['senha'] ?>">
                </div>
                <!--
                <div>
                    <label for="funcao">FUNÇAO</label>
                    <input type="text" name="funcao" id="funcao" value="<?= $_POST['funcao'] ?>">
                </div>-->
                <input class="btn btn-primary" type="submit" name="submit" value="entrar" style="width: 120%;">
                    
                <!--<button>Entrar</button> -->
            </form>
        </div>
    </main>
    <footer class="rodape">
        Sitema Recebimento Estoque <?php $hoje = date('d/m/Y');
                                    echo $hoje; ?>
    </footer>
</body>

</html>