<?php
session_start();
$nome_user = $_SESSION['nome_usuario'];
$id_user = $_SESSION['id'];
include('verifica.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link rel="icon" href="assets/img/bolaCopa.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/styles/nav.css">
    <script src="https://kit.fontawesome.com/fe30f843d3.js" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-lg nav_edit">
    <div class="container-fluid">

      <!--IMAGEM LOGO-->
      <a class="navbar-brand-fluid" href="#">
        <img src="" alt="">
      </a>
      
      <!--MENU HAMBURGUER-->
      <button 
        class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--ITENS MENU/LINKS NAV-->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <img src="assets/img/taca1.png" class="logo" alt="">
          
          <li class="nav-item">
            <a class="nav-link nav-color " aria-current="page" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link nav-color " aria-current="page" href="rank.php">Rank</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="minhas_apostas.php">Meus Palpites</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="list_jogos.php">Jogos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="alterasenha.php">Alterar senha</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="logout.php">Logout</a>
          </li>

          <li class="nav-item-nome">
              <p  class="nav-link disabled"> <i class="fa-solid fa-user"> </i> <?php echo $nome_user;?> </p>
          </li>

          <?php
          if($id_user == 1){
            echo '<li class="nav-item">
                    <a class="nav-link" href="Admin/Admin_Index.php"> Admin </a>
                  </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>