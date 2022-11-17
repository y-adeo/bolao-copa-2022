<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link rel="stylesheet" href="assets/styles/index.css">
    <link rel="stylesheet" href="assets/styles/Ok.css">
  <title>Sucesso</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['resultado_feito'])){
 echo 
'<div class="container">
  <div class="box_sucesso">
      <h1 class="aviso">Resultado do jogo adicionado</h1>
  <button type="button" class="btn btn_ok">
    <a class="nav-link" href="Admin/jogos_result.php">Voltar</a>
  </button>
  </div>
</div>';
unset($_SESSION['resultado_feito']);
}
elseif (isset($_SESSION['aposta_feita'])){
  echo 
  '<div class="container">
    <div class="box_sucesso">
        <h1 class="aviso">Palpite registrado</h1>
    <button type="button" class="btn btn_ok">
      <a class="nav-link" href="list_jogos.php">Voltar</a>
    </button>
    </div>
  </div>';
unset($_SESSION['aposta_feita']);
}
elseif(isset($_SESSION['senha_alterada'])){
echo 
'<div class="container">
  <div class="box_sucesso">
      <h1 class="aviso">Senha alterada</h1>
  <button type="button" class="btn btn_ok">
    <a class="nav-link" href="login.php">Voltar</a>
  </button>
  </div>
</div>';
  unset($_SESSION['senha_alterada']);
}
?>
</body>
</html>
<?php  include('footer.php');?>
