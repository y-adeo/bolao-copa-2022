<?php  include('navbar.php');?>
<?php
include_once("conexao_db2.php");
$id = $_SESSION['id'];
$query = 
"select 
f.nome as nomes,
f.id_funcionario as IdDb,
(case 
when sum(p.pontos) is null then 0
else sum(p.pontos) end) as pontos
from funcionario f
left join pontuacao p on p.id_funcionario = f.id_funcionario
where f.id_funcionario != 1
group by f.nome
order by pontos desc, nomes";

$result = mysqli_query($conect,$query);
$lacofor = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="assets/styles/rank.css">
    <title>Rank</title>
</head>
<body>  
    <div class="container">
        <h1 class="titulo">Rank</h1>
        <div class="row">
        <div class="col-md-12 rank_element card">
                <div class="row">
                    <div class="col-md-3 div_rank">
                        <p>Posição</p>
                    </div>
                    <div class="col-md-6 div_nome">
                        <p>Nome</p>
                    </div>
                    <div class="col-md-3 div_pontos">
                        <p>Pontos</p>
                    </div>
                </div>
            </div>
            <?php
            for($i = 1; $i <= $lacofor; $i++){
                $rows = mysqli_fetch_assoc($result);
                echo 
            '<div class="col-md-12';
            if($id == $rows['IdDb']){
                echo ' rank_element_me';
            }else{
                echo ' rank_element card';
            }
            echo '">
                <div class="row">
                    <div class="col-md-3 div_rank">
                    <p>'.$i.'</p>
                    </div>
                    <div class="col-md-6 div_nome">
                    <p>'.utf8_encode($rows['nomes']).'</p>
                    </div>
                    <div class="col-md-3 div_pontos">
                    <p>'.$rows['pontos'].'</p>
                    </div>
                </div>
            </div>';
            }  
            ?>
        </div>
    </div>
</body>
</html>
<?php  include('footer.php');?>
