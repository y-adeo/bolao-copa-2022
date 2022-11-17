<?php
    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $db_nome = "copa_falavinha"; 
    
    $conect = mysqli_connect($servidor, $usuario, $senha, $db_nome);

    // if($conect->connect_errno){
    //     echo "conexao n efetuada";
    // }
    // else{
    //     echo "conexaocerto";
    // }
?>