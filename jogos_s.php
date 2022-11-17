<?php
include_once("conexao_db2.php");

$apostas = 
"select 
j.equipe_A eA,
j.equipe_B eB,
j.data_jogo data,
j.hora_jogo hora,
j.imagem_jogo,
r.placar_A rA,
r.placar_B rB,
a.palpite_A pA,
a.palpite_B pB,
p.pontos pontos,
a.id_funcionario
from pontuacao p
left join jogos j on p.id_jogo = j.id_jogo
left join resultado r on r.id_jogo = p.id_jogo
left join apostas a on a.id_jogo = p.id_jogo and a.id_funcionario = p.id_funcionario
where p.id_funcionario = ".$id_user.'
order by data_jogo,hora_jogo';

//$result =  mysqli_query($conect, $apostas);
$resultado = $conect->query($apostas);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <div class="row">
        <?php
            while($row = mysqli_fetch_assoc($resultado)){
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
                        <h4 class="resultado">Resultado</h4>
                        <h5 class="resultado_num">'.$row['rA'] .' X '.$row['rB'].'</h5>
                        <h5 class="pontos">pontos: '.$row['pontos'].'</h5>
                    </div> 
                </div>
            </div>';
            }
        ?>
    </div>
</body>
</html>