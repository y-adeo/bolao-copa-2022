<?php
include('navbar_admin.php');
include_once('../conexao_db2.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionario</title>
</head>
<body>
    <form method="POST" action="verifica_cadastro.php">
        <?php
        if(isset($_SESSION['usuario_existe'])):
        ?>
        <p>Usuario ja existe!!</p>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>
        <?php
        if(isset($_SESSION['usuario_cadastrado'])):
        ?>
        <p><a href="Admin_index.php">Voltar</a> Usuário cadastrado com sucesso!!!</p>
        <?php
        endif;
        unset($_SESSION['usuario_cadastrado']);
        ?>
        <p class = "form-group">
            <label>Funcionario</label>
            <input type="text" name = nome_funcionario required placeholder = "Nome funcionário">
        </p>
        <p class = "form-group">
            <label>Usuário</label>
            <input type="text" name = user_login required placeholder = "Usuário login">
        </p>
        <p class = "form-group">
            <label>Senha</label>
            <input type="password" name = user_senha required placeholder = "Senha" maxlength='16' minlength='5'>
        </p>
        <p class = "form-group">
            <button>Enviar</button>
        </p>
    </form>
</body>
</html>