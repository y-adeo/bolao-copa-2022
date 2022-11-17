<?php
session_start();
error_reporting();

$idfunc = $_SESSION['id'];
$id = $_GET['id_jogo'];
$palpiteA = $_POST['aposta1'];
$palpiteB = $_POST['aposta2'];

Apostar($idfunc,$id,$palpiteA,$palpiteB);

function Apostar($idf,$idj,$pa,$pb){
include_once('conexao_db2.php');
$query = "select count(*) as total from apostas where id_funcionario = '{$idf}' and id_jogo = '{$idj}'"; 
$result = mysqli_query($conect, $query);
$row = mysqli_fetch_assoc($result);

if($row['total'] >= 1){
    $_SESSION['aposta_existe'] = true;
    header('Location: aposta_jogo.php?id='.$idj);
    exit;
}

$sql = "INSERT INTO apostas (id_funcionario, id_jogo, palpite_A, palpite_B, data_aposta) VALUES ('$idf', '$idj', '$pa', '$pb', NOW())";

if($conect->query($sql) === true){
    $_SESSION['aposta_feita'] = true;
    header('Location: Ok.php');
}
$conect->close();
exit();
}
?>