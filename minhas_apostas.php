<?php  include('navbar.php');?>
<?php
include_once("conexao_db2.php");
//session_start();
$id_user = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/card.css">
    <title>Minhas Apostas</title>
</head>
<body>
    
    <div class="container">
        <h1 class="titulo">Palpites</h1>
        <?php
        include('jogos_s.php'); 
        ?>
        <hr class="div_jogo">
        <?php
        include('jogos_n.php'); 
        ?>
    </div>
</body>
</html>
<?php  include('footer.php');?>
