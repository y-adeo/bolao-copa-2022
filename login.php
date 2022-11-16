<?php
session_start();
include_once ('conexao_db2.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/bolaCopa.png">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/login.css">
    <script src="https://kit.fontawesome.com/fe30f843d3.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>    
    <div class="container">
        <form action="verifica_login.php" method="POST"> 
        <h1 class='titulo'>Login</h1><br>
            <div class="altera">
                <?php
                if(isset($_SESSION['erro'])):
                ?>
                <span class='erro'>Erro: usuário ou senha incorretas </span>
                <?php
                endif;
                unset($_SESSION['erro']);
                ?>
                <div>
                    <i class="fa-solid fa-user"></i> 
                    <label>Usuario:</label><br>
                    <input id="nome_login" name="usuario" required type="text" placeholder="Usuário"/>
                </div>
                <br>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <label>Senha:</label><br>
                    <input id="senha_login" name="senha" required type="password" placeholder="Senha"  minlength='5' maxlength='10'/>
                </div>
                <br>
                <div>
                    <button type="submit">Logar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>