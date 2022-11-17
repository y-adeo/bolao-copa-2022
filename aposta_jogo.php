<?php  include('navbar.php');?>
<?php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
?>
<?php
 $id = $_GET['id'];
 include_once("conexao_db2.php");

 $jogo = "SELECT 
 j.id_jogo id,
 j.equipe_A,
 j.equipe_B,
 j.grupo,
 j.data_jogo,
 j.hora_jogo,
 j.hora,
 j.imagem_jogo
 FROM jogos j
 WHERE id_jogo = ".$id;
 $resultado = $conect->query($jogo);
 $row = mysqli_fetch_assoc($resultado);


 $date = new DateTime($row['data_jogo']);
 $data_jogoformat = $date->format('Y-m-d');
 $hora = $row['hora'];
 $datetime1 = date_create('now');
 $datetime2 = date_create($data_jogoformat. ' '.$hora.':00');
 $interval = date_diff($datetime1, $datetime2);
 $interval_days = intval($interval->format('%D'));
 $interval_hours = intval($interval->format('%H'));
 $interval_minutes = intval($interval->format('%i'));
 

if($datetime1 > $datetime2 || $interval_days == 0 &&  $interval_hours == 0 && $interval_minutes <= 15){
    header('Location: list_jogos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/root/fonts.css">
    <link rel="stylesheet" href="assets/styles/index.css">
    <link rel="stylesheet" href="assets/styles/detalhe_palpite.css">
    <title>Apostar</title>
</head>

<body>
<?php  $_SESSION['id'] ?>


    <div class="container">
        <div class="box_palpite"> 
            <img src=<?php echo '"assets/img/jogos/'.$row['imagem_jogo'].'"' ?> alt=""  class="imagem_jogo_detail">
            <h3 class="titulo_jogo"><?php echo $row['equipe_A'] ." X " .$row['equipe_B']?></h3>

            <form method="POST" action="verifica_aposta.php?id_jogo=<?php echo $id ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="label_jogo"><?php echo $row['equipe_A'];?></label>
                    <input type="number" class="form-control" id = "aposta1" name= "aposta1"
                    max = '20'  min = '0' required placeholder="Aposta">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="label_jogo"><?php echo $row['equipe_B'];?></label>
                    <input type="number" class="form-control" id = "aposta2" name= "aposta2"
                    max = '20'  min = '0' placeholder="Aposta">
                </div>
                </br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn_palpitar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Palpitar
                </button>
                <?php
                if(isset($_SESSION['aposta_existe'])){
                    echo '
                    <div class="alert alert-danger erro_aposta" role="alert">
                        Você já apostou neste jogo!
                    </div>';
                    }
                unset($_SESSION['aposta_existe']);
                ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal_palpite">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Aposta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você realmente quer palpitar neste jogo?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                                <button type="submit" class="btn btn_palpitar_modal">Apostar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_SESSION['aposta_existe'])){
                echo '
                <div class="alert alert-danger erro_aposta" role="alert">
                    Você já apostou neste jogo!
                </div>';
            }
            unset($_SESSION['aposta_existe']);
            ?>
        </div>
    </div>
</body>
</html>
