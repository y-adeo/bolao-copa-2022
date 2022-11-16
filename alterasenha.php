<?php  include('navbar.php');?>
<?php
include_once("conexao_db2.php");

//$sua_senha = $_SESSION['senha'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link rel="stylesheet" href="assets/styles/login.css">
    <title>Alterar Senha</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="verifica_senha.php">
        <h1 class='titulo'>Altera senha</h1>    
            <div class="altera">
                <?php
                if(isset($_SESSION['senhas_diferentes'])):
                ?>
                <span class='erro'>Erro: Senhas diferentes! </span>
                <?php
                endif;
                unset($_SESSION['senhas_diferentes']);
                ?>
                <div>
                    <i class="fa-sharp fa-solid fa-lock"></i>
                    <label>Senha Nova:</label><br>
                    <input type="password" name="senha_nova" required placeholder="Senha Nova" maxlength='16' minlength='5'>
                </div>
                <br>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <label>Confirme Senha:</label><br>
                    <input type="password" name="confirme_senha" required placeholder="Confirma Senha" maxlength='16' minlength='5'>
                </div>
                <br>
                <div>
                    <button type="submit">Alterar</button>
                </div>
            </div>    
        </form>
    </div>    
</body>
</html>
