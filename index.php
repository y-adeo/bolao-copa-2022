<?php
session_start();
$nome_user = $_SESSION['usuario'];
$id_user = $_SESSION['id'];
include('verifica.php');
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link rel="icon" href="assets/img/bolaCopa.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/index.css">
    <title>Menu</title>
    
    <!-- <link rel="stylesheet" href="assets/styles_copa/nav.css"> -->
</head>


<body>
    <div class="container">
        <div class="titulo">
            <p>Prepare suas Apostas<br>
            O Bolão Falavinha Começou!</p>
        </div>

        <div class="row">

            <div class="col-md-6 col-sm-12">
                <button class="btn btn-primaryJ"><a class="nav-link active" aria-current="page" href="list_jogos.php">Jogos</a></button>
            </div>

            <div class="col-md-6 col-sm-12">
                <button class="btn btn-primaryA"><a class="nav-link active" aria-current="page" href="minhas_apostas.php">Minhas Apostas</a>
                </button>
            </div>

            <div class="col-md-6 col-sm-12">
                <button class="btn btn-primaryK"><a class="nav-link active" aria-current="page" href="rank.php">Rank</a>
                </button>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <button class="btn btn-primaryG"><a class="nav-link active" aria-current="page" href="grupos.php">Grupos</a></button>
            </div>

            <div class="col-md-6 col-sm-12">
                <button class="btn btn-primaryR"><a class="nav-link active" aria-current="page" href="regras.php">Regras</a></button>
            </div>

            <div class="col-md-6 col-sm-12">
                <button class="btn btn-primaryL"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></button>
            </div>

            
        </div>

        <!-- <footer>
            <p class="txtFooter">© 2022 - Falavinha Next
            Todos os direitos reservados</p>
            <img class="imgLogoFala" src="assets/img/logoBranca.png">
        </footer> -->


    </div>
</body>
<?php  include('footer.php');?>
