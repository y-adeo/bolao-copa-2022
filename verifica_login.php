<?php
session_start();
include('conexao_db2.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login.php');
    exit();
}      
$usuario = mysqli_real_escape_string($conect, $_POST['usuario']); 
$senha = mysqli_real_escape_string($conect, $_POST['senha']);
    
$query = "SELECT id_funcionario as id, user_login, nome from funcionario where user_login = '{$usuario}' and user_senha = '{$senha}'";
$result = mysqli_query($conect, $query);
$user = mysqli_fetch_assoc($result);
$row = mysqli_num_rows($result);
    
if($row == 1){
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id'] = $user['id'];
    $_SESSION['nome_usuario'] = $user['nome'];

    if($user['id'] == 1){
        header('Location: Admin/Admin_Index.php');
        exit;
    }else{
    header('Location: index.php');
    exit;
    }
}else {
    $_SESSION['erro'] = true;
    header('Location: login.php');
    exit;
}
?>