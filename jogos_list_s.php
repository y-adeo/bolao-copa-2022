<?php
    include_once("conexao_db2.php");
    $jogos = "SELECT * FROM jogos j
    left join resultado r on j.id_jogo = r.id_jogo
    order by data_jogo
    ";
    $result =  mysqli_query($conect, $jogos);
    $resultado = $conect->query($jogos);

    while($row = mysqli_fetch_assoc($resultado))
    {
        if($row['id_resultado'] == null){

        }else{
        $date = new DateTime($row['data_jogo']);
    echo 
    '<div class="col-md-4 col-sm">
        
        <div class="card">
        <img src="assets/img/bxa.jpg" class="card-img-top img_card" style="padding:10px 0 0 0;">
            <div class="card-body card_jogo">
                <h5 class="titulo_jogo">'.$row['equipe_A'] . " X " .$row['equipe_B'].'</h5>
                <h5 class="grupo_jogo">'.$row['grupo'].'</h5>
                <h4 class="data_jogo">'.$date->format('d/m/Y').'</h4>
                <h4 class="hora_jogo">'.$row['hora_jogo'].'</h4>
                <h4 class="resultado">Resultado</h4>
                <h5 class="resultado_num">'.$row['placar_A'] .' X '.$row['placar_B'].'</h5>
            </div>
        </div>
    </div>';
        }
    }
?>