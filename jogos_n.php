<?php
include_once("conexao_db2.php");

$apostas = 
"select 
j.equipe_A eA,
j.equipe_B eB,
j.data_jogo data,
j.hora_jogo hora,
j.imagem_jogo,
a.palpite_A pA,
a.palpite_B pB,
r.id_jogo jogo
from apostas a
left join jogos j on a.id_jogo = j.id_jogo
left join resultado r on r.id_jogo = j.id_jogo
where id_funcionario = ".$id_user."
order by data_jogo";

//$result =  mysqli_query($conect, $apostas);
$resultado = $conect->query($apostas);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <div class="row">
        <?php
            while($row = mysqli_fetch_assoc($resultado)){
                if($row['jogo'] != null){
                    echo '';
                }else{
                    $date = new DateTime($row['data']);
            echo
            '<div class="col-md-4">
            <img src="assets/img/jogos/'.$row['imagem_jogo'].'" class="card-img-top" style="padding:10px 0 0 0;">
                <div class="card card_jogo">
                    <div class="card-body">
                        <h6 class="titulo_jogo">'.utf8_encode($row['eA'] .' X '.$row['eB']).'</h6>
                        <h4 class="data_jogo">'.$date->format('d/m').'</h4>
                        <h4 class="hora_jogo">'.$row['hora'].'</h4>
                        <h4 class="palpite">Palpite</h4>
                        <h5 class="palpite_num">'.$row['pA'] .' X '.$row['pB'].'</h5>
                    </div> 
                </div>
            </div>';
            }
        }
        
        ?>
    </div>
</body>
</html>