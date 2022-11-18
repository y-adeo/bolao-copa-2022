<?php
session_start();
include_once('../conexao_db2.php');


$funcionario = mysqli_real_escape_string($conect, $_POST['nome_funcionario']);
$user_login = mysqli_real_escape_string($conect, $_POST['user_login']);
$user_senha = mysqli_real_escape_string($conect, $_POST['user_senha']);

$query = "select count(*) as total from funcionario where user_login = '$user_login'";
$result = mysqli_query($conect, $query);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro_func.php');
    exit();
}

$sql = "INSERT INTO funcionario (nome, user_login, user_senha) VALUES ('$funcionario', '$user_login', '$user_senha')";

if($conect->query($sql) === true){
    $_SESSION['usuario_cadastrado'] = true;
    header('Location: cadastro_func.php');
}
$conect->close();
exit();
?>