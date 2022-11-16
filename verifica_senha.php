<?php
include("conexao_db2.php");
session_start();

$nome_user = $_SESSION['usuario']; // aqui eu estou tentando pegar a variavel de sessão do usuario
$id = $_SESSION['id']; // id user
//$senha_banco = $_SESSION['senha']; // pegando senha do usuario do banco

if(empty($_POST['senha_nova']) || empty($_POST['confirme_senha'])){
    header("Location: alterasenha.php");
    exit();
}

//$senha = isset($_POST['senha'])?$_POST['senha']:"";
$senha_nova = isset($_POST['senha_nova'])?$_POST['senha_nova']:"";
$confirme_senha = isset($_POST['confirme_senha'])?$_POST['confirme_senha']:"";


if($senha_nova != $confirme_senha)
{
     $_SESSION['senhas_diferentes'] = true;
     header('Location: alterasenha.php');
     exit();
}

if($senha_nova === $confirme_senha)
$query = "UPDATE funcionario SET user_senha = '$senha_nova' WHERE id_funcionario = '$id'";
//$result = mysqli_query($conect, $query);

if($conect->query($query) === true){
     $_SESSION['senha_alterada'] = true;
 }

$conect->close();

header('Location: Ok.php');
exit();
?>