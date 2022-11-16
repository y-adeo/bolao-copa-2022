<?php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    include_once("conexao_db.php");
    session_start();


    $path_img = 'assets/img/fotos/';

    $dateNow = date('m');
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon-50x50.png" sizes="32x32" />
    <link rel="icon" href="assets/img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="assets/img/favicon.png" />
    <meta name="msapplication-TileImage" content="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/styles/root/reset-basic.css">
    <link rel="stylesheet" href="assets/styles/index.css">
    <link rel="stylesheet" href="assets/styles/nav.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <title>INTRANET - Falavinha Next</title>
</head>


<body>
    <div class="container">
        <header>
            <nav class = "upBar"> <!--Barra de pesquisa-->
                        
                <div class="leftNav">
                    <a href="index.php">
                        <img src="assets/img/logo-beta.png" id="logofalavinha" alt="Logo Falavinha">
                    </a> 
                    <ul id="listaMenu">
                        <li class="navmenu-li">
                            <a href="index.php" class="hvr-underline-reveal">
                                Início
                            </a>
                        </li>

                        <li class="navmenu-li">
                            <a href="publicacoes.php" class="hvr-underline-reveal">
                                Publicações
                            </a>
                        </li>

                        <li class="navmenu-li">
                            <a href="calendario.php" class="hvr-underline-reveal">
                                Calendário
                            </a>
                        </li>

                        <li class="navmenu-li">
                            <a href="agendamento.php" class="hvr-underline-reveal">
                                Agendamento
                            </a>
                        </li>

                        <li class="navmenu-li">
                            <a href="login.php" class="hvr-underline-reveal">
                                Login
                            </a>
                        </li>
                       
                    </ul>
                </div>

                <div class="rightNav">
                    <div id="searchBar"> <!--Pesquise por colaborador-->
                        <form action="listColaborador.php" method="get" id="formSearchBar"> 
                            <input type="search" name="txtBusca" id="txtBusca" placeholder="Pesquise por um colaborador" list="nomeColaborador">
                            <input type="submit" value="Buscar" id="btnBusca">
                        </form>
                        

                        <datalist id="nomeColaborador">
                            <option value="Todos Funcionários" id="itemCor"></option>
                            <?php 
                                $colab_list = "SELECT * FROM tb_colaborador";
                                $colaborador_list = mysqli_query($conecta, $colab_list);
                                while($row_colab = mysqli_fetch_assoc($colaborador_list)){
                                    $nome = $row_colab['nome_colaborador'];
                                    $id = $row_colab['id_colaborador'];
                            ?>

                            <option value="<?php echo $nome;?>"></option>

                            <?php 
                                }
                            ?>
                            
                        </datalist>
                    </div>
                </div>
            </nav>
        </header>
        
        <div class="background">
            <div class="transbox">
                <p>This is some text.</p>
            </div>
        </div>
        

        <main>
            <!--Boas Vindas-->
            <div class = "primeiraFaixa">
                <div class="boasVindas">
                    <img class="imgBoasVindas" src="assets/img/img-boas-vindas2.png">
                    <ul class="textoBoasVindas">
                        <h1 class="h1">Olá,</h1> 
                        <h2 class="h2">Que bom te ver por aqui!</h2>
                        <p class="p">Essa é a nossa Intranet, aqui você ficará por dentro de <br> tudo que acontece na  <a class="linkFal"href="https://falavinhanext.com.br/?gclid=CjwKCAjwm8WZBhBUEiwA178UnGnD6iCAu9PCd42SFpIqozK63yZBpqu9DoMHD7k_-wtArxJdoQ8lZRoC9e4QAvD_BwE" target="_blank">Falavinha Next!</a></p>
                    </ul>
                </div> 

                <!-- Nav Rápida -->
                <!-- Caixa de Ideias -->
            </div>

            <div class= "segundaFaixa">
                <div class="noticia"> <!--Notícias-->
                    <?php 
                        $result_listar = "SELECT * FROM tb_noticias ORDER BY noticias_id DESC";
                        $resultado_listar = mysqli_query($conecta, $result_listar);
                        $row_listar = mysqli_fetch_assoc($resultado_listar);
                        $id = $row_listar['noticias_id'];
                        $titulo = $row_listar['titulo'];
                        $texto = $row_listar['texto_full'];
                        $image = $row_listar['image_noticia'];
                    ?>

                    <div class="leftBlock">
                        <h1 id="titleNoticias">
                            <?php echo $titulo ?>
                        </h1>
                        <img src="assets/img/img_db/<?php echo $image?>" onerror="this.src = 'assets/img/fundo-colab.jpg'" id="img-circular">
                    

                        <div id="rightBlock">
                            <!-- <h2 id="titleNoticias">
                                <?php echo utf8_decode($titulo)
                                 ?>
                            </h2> -->

                            <p id="textNoticia">
                                <?php echo mb_strimwidth("utf8_encode($texto)", 0, 151, "..."); ?>
                            </p>


                            <div class="containerNoticia">
                                <div class="centroNoticia">
                                    <button id="btnLerNoticia" onclick="window.location.href='noticia.php?id=<?php echo $id?>'">
                                        <h1 class="postCompleto">Post Completo</h1>
                                        <!-- <svg width="180px" height="60px" viewBox="0 0 180 60"           class="border">
                                            <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                                            <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                                        </svg>  -->

                                        
                                    </button>
                                </div>
                            </div>






                            <!-- <button id="btnLerNoticia" onclick="window.location.href='noticia.php?id=<?php echo $id?>'">
                                Post Completo
                            </button> -->
                        </div>
                    </div>    
                </div>
                            
                <div class="avisos"> <!--Avisos-->
                    <h4 class="subTitle">
                        Avisos
                    </h4>
                    <?php 
                        $result_mural = "SELECT * FROM tb_muralaviso ORDER BY id_avisos DESC LIMIT 5";
                        $resultado_mural = mysqli_query($conecta, $result_mural);
                        while($row_mural = mysqli_fetch_assoc($resultado_mural)) {
                        $texto = $row_mural['texto'];
                        $cor = $row_mural['cor'];
                    ?>
                    <div class="cardAviso" style="border-left: 3px solid <?php echo $cor ?>">
                        <p>
                            <?php echo utf8_encode($texto);?>
                        </p>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div> 
            
            <div class="terceiraFaixa">
                <div class="doc5S">
                    <h1 class="titulo">Você conhece os 5S?</h1>
                    <p class="descricao">O 5S é uma metodologia que se propõe a 
                        organizar espaços, 
                        para que o trabalho possa ser executado de forma 
                        eficiente, eficaz e segura. 
                    </p>
                    <img class="img5S" src="assets/img/desenho-mesa-trabalho.png">
                    
                </div>
            
                <div id="eventos">
                    <h4 class="subTitle">
                        Eventos
                    </h4>

                    <div class="cardsEventos">
                        <?php 
                            $result_evento = "SELECT * FROM tb_calendario LIMIT 4";
                            $resultado_evento = mysqli_query($conecta, $result_evento);
                            while($row_evento = mysqli_fetch_assoc($resultado_evento)) {
                                    $descricao = $row_evento['descricao_evento'];
                                    $data = $row_evento['data_evento'];
                        ?>

                        <div class="dataEvento">
                            <p class="dia">
                                <?php
                                    $horaFormat = new DateTime($data); 
                                    echo $horaFormat->format('d');
                                ?>
                            </p>

                            <p class="mes">
                                <?php
                                    $horaFormat = new DateTime($data);
                                    $nomeMes = $horaFormat->format('m');
                                    $result_mes = "SELECT * FROM tb_mes WHERE id_mes = '$nomeMes'";
                                    $resultado_mes = mysqli_query($conecta, $result_mes);
                                    $row_mes = mysqli_fetch_assoc($resultado_mes);
                                    $mes = isset($row_mes['nomeAbr']);
                                    echo "/".$nomeMes;
                                ?>
                            </p>

                            <p class="descricao"><?php echo utf8_encode($descricao)?></p>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>    
        </main>

        <aside>
            <div class="navRapida">
                <div class="linha1">
                    <button id="linksRapidos"><button class="btnPubli"><a href="publicacoes.php"><img class="imgNoticias" src="assets/img/icon-jornal.png" alt="Acesso a Notícias"></a></button></button>

                    <button id="linksRapidos"><button class="btnBlib"><a href="manutencao.php"> <img class="imgBiblioteca" src="assets/img/icon-biblioteca.png" alt="Acesso a Biblioteca"></a></button></button>

                    <button id="linksRapidos"><button class="btnCopa"><a href="copa/login.php"><img class= "imgCopa" src="assets/img/icon-copa.png" alt="Acesso à pág. Copa"></a></button></button>


                    <!-- <button id="linksRapidos"><button class="btnCopa"><a href="manutencaocopa.php"><img class= "imgCopa" src="assets/img/icon-copa.png" alt="Acesso à pág. Copa"></a></button></button> -->

                    <!-- <div class="noticias"> <a href="publicacoes.php"><img class="imgNoticias" src="assets/img/icon-jornal.png" alt="Acesso a Notícias"></a> 
                    </div>
                    
                    <div class="biblioteca"> <a href="biblioteca.php"> <img class="imgBiblioteca" src="assets/img/icon-biblioteca.png" alt="Acesso a Biblioteca"></a>
                    </div>
                    
                    <div class="copa">  <a href=""><img class= "imgCopa" src="assets/img/icon-copa.png" alt="Acesso à pág. Copa"></a>  </div> -->

                </div>
                <div class="linha2">
                    
                    <button id="linksRapidos"><button class="btnParc"><a href="manutencao.php"> <img class="imgParcerias" src="assets/img/icon-parceria.png" alt="Parcerias"></a></button></button>

                    <button id="linksRapidos"><button class="btnCalen"><a href="calendario.php"> <img class="imgCalendario" src="assets/img/icon-calendario.png" alt="Calendario"></a></button></button>

                    <button id="linksRapidos"><button class="btnAgend"><a href="agendamento.php"> <img class="imgAgendamentos" src="assets/img/icon-agendamento.png" alt="Agendamentos"></a></button></button>

                    <!-- <div class="Parcerias"> <a href=""> <img class="imgParcerias" src="assets/img/icon-parceria.png" alt="Parcerias"></a>
                    </div>
                    
                    <div class="Calendario"> <a href="calendario.php"> <img class="imgCalendario" src="assets/img/icon-calendario.png" alt="Calendario"></a>
                    </div>
                    
                    <div class="Agendamentos"> <a href="agendamento.php"> <img class="imgAgendamentos" src="assets/img/icon-agendamento.png" alt="Agendamentos"></a>
                    </div> -->

                </div>
            </div>

            <div class="youtube">
                <h1>YouTube</h1>
                <p>Você sabia que estamos presentes no YouTube? Lá temos vários vídeos formativos.
                    Tire um tempinho e corre lá deixar um Like!
                </p>
                <a class="linkYoutube">
                    <iframe width="90%" height="auto" src="https://www.youtube.com/embed/8GjmmcF2-aE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </a>

            </div>
            
            <div class="caixaIdeias">
                <h1> Tem uma ideia legal? Conta pra gente!</h1>
                <p> Esse espaço foi criado para que possa compartilhar suas sugestões, 
                    reclamações e opiniões. Não precisa de timidez, a identificação é totalmente opcional!
                </p>
                <button id="btnCaixaIdeias" onclick="">
                    <a href="feedback.php">Clique aqui e escreva sua mensagem</a> 
                </button>                                 
            </div>

            <div id="aniversariantes">
                <div id="sideLeft">
                    <h1 class="tituloAniver">Parabéns!!</h1>
                    <h4 class="subTitle titleAviso">
                        <?php 
                            $result_title = "SELECT * FROM tb_colaborador WHERE month(aniversario )= $dateNow  and status = 'A'";
                            $resultado_title = mysqli_query($conecta, $result_title);
                            $row_title = mysqli_fetch_assoc($resultado_title);
                            $mesNome = 'teste'; // $row_title['nome_colaborador']; // Problema no Array / Verificar no Banco de Dados
                        ?>
                         
                    </h4>

                    <!-- <img class="imgFundoAniversario" src="assets/img/card-aniver.png"> -->

                    <div class="swiper swiper2">
                        <div class="swiper-wrapper">
                            <?php 
                                $result_carousel = "SELECT * FROM tb_colaborador WHERE MONTH(aniversario) = '$dateNow'";
                                $resultado_carousel = mysqli_query($conecta, $result_carousel);
                                while($row_carousel = mysqli_fetch_assoc($resultado_carousel)) {
                                $imageCarousel = $row_carousel['image_colaborador'];
                                $nome = $row_carousel['nome_colaborador'];
                                $niver = $row_carousel['aniversario'];
                            ?>
                            <div class="swiper-slide">
                                <img src="<?php echo 'assets/img/fotos/'.$imageCarousel //$imageCarousel;?>" class="imgAniversario" >
                                <p class="textsAniversariantes"><?php echo $nome; ?></p>
                                <p class="textsAniversariantesData">
                                    <?php 
                                        $horaFormat = new DateTime($niver); 
                                        echo $horaFormat->format('d/m');
                                    ?>
                                </p>
                            </div>

                            <?php 
                                }
                            ?>
                                    
                        </div>                  
                    </div>
                </div>

                <!-- Lista de aniversariantes na lateral do card -->
            </div>

            <div>

                <!-- Lista de aniversariantes na lateral do card -->
                <!-- <div id="sideRight">
                    <div id="listBirthdays">
                        <?php 
                            $result_carousel = "SELECT * FROM tb_colaborador WHERE MONTH(aniversario) = '$dateNow'";
                            $resultado_carousel = mysqli_query($conecta, $result_carousel);
                            while($row_carousel = mysqli_fetch_assoc($resultado_carousel)) {
                            $imageCarousel = 'assets/img/fotos/anny.jpg';
                            $nome = $row_carousel['nome_colaborador'];
                            $niver = $row_carousel['aniversario'];
                        ?>
                        <div class="item">
                            <h5 class="nameItemBirthday">
                                <?php echo $nome; ?>
                            </h5>

                            <p class="dateItemBirthday">
                                <?php 
                                    $horaFormat = new DateTime($niver); 
                                    echo $horaFormat->format('d/m');
                                ?>
                            </p>
                        </div>

                        <?php
                            }
                        ?>
                        
                    </div>
                </div> --> 
            </div>
        </aside> 
        
        <footer>
            <p id="txtFooter">© 2022 - Falavinha Next - Todos os direitos reservados</p>
            <img src="assets/img/avbranca.png">

            <!-- <div id="redesSociais">
                <h3 id="titleRedesSociais">Fique por dentro das novidades!</h3>
                <p id="subTitleRedesSociais">Siga nossa redes sociais</p>
                <div id="logosRedesSociais">
                    <a href="https://www.youtube.com/channel/UCQ_Eb9CrstxaCrJQ3ON128w" target="_blank" class="linksLogos" onMouseOver="descriptionLogo()">
                        <img src="assets/img/icons/youtubeLogo.png" alt="Logo Youtube">
                    </a>

                    <a href="https://www.linkedin.com/company/falavinha-next/mycompany/" target="_blank" class="linksLogos">
                        <img src="assets/img/icons/linkedin.png" alt="Logo Linkedin">
                    </a>

                    <a href="https://www.facebook.com/FalavinhaNext/" target="_blank" class="linksLogos">
                        <img src="assets/img/icons/facebook.png" alt="Logo Facebook">
                    </a>

                    <a href="https://www.instagram.com/falavinhanext/" target="_blank" class="linksLogos">
                        <img src="assets/img/icons/instagram.png" alt="Logo Instagram">
                    </a>
                </div>
            </div> -->
        </footer>

        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="assets/slick/slick.min.js"></script>
        <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
        <script src="assets/scripts/main.js"></script>
        <script>
            // Lê quantidade caracter e altera o tamanho
            let titulotxt = document.querySelector("#titleNoticias").innerText;
            let tamanhotxt = titulotxt.length;
                    
            if(tamanhotxt > 46) {
                let tamanho = document.querySelector("#titleNoticias");
                tamanho.style = "font-size: 18px";
            }
            console.log(tamanhotxt);
        </script>
        <script>
            $(document).ready(function(){
                $('.carousel').slick({
                    dots: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    cssEase: 'linear'
                });
            });

        </script>
        <script>
            const swiper = new Swiper('.swiper1', {
                loop: true,
                lazy: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                centeredSlides: true,
                effect: "creative",
                creativeEffect: {
                    prev: {
                        shadow: true,
                        translate: [0, 0, -400],
                    },
                    next: {
                        translate: ["100%", 0, 0],
                    },
                },
            });
        </script>
        <script>
            const swiper2 = new Swiper('.swiper2', {
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                lazy: true,
                centeredSlides: true,
            });
        </script>
    </div>    

    
        
</body>



</html>




    <!-- <hr class="lineSeparationGeral"> -->

    
        <!-- Area principal -->
        <div id="areaInformacao">
            <!-- <div id="acessoRapido">
                <h4 class="subTitle titleAviso">
                    Acesso Rápido
                    <hr class="lineBottomSubTitle">
                </h4>
                <div id="cardsConfigAcessoRapido">
                    <div class="cardAcessoRapido">
                        <a href="https://falavinhanext.com.br/access/">
                            <img src="assets/img/icons/falavinha-logo.png" alt="" class="imgCardAcessoRapido">    
                        </a>
                        <div class="titleCardAcessoRapido">
                            Portal Falavinha
                        </div>
                    </div>

                    <div class="cardAcessoRapido">
                        <a href="linksUteis.php">
                            <img src="assets/img/icons/linksUteis.png" alt="" class="imgCardAcessoRapido linksUteisConfigImg">    
                        </a>
                        <div class="titleCardAcessoRapido titleLinksUteis">
                            Links Úteis
                        </div>
                    </div>

                    <div class="cardAcessoRapido">
                        <a href="documentosImportantes.php">
                            <img src="assets/img/icons/documentos.png" alt="" class="imgCardAcessoRapido documentosConfigImg">    
                        </a>
                        <div class="titleCardAcessoRapido titleDocumentos">
                            Documentos
                        </div>
                    </div>

                    <div class="cardAcessoRapido">
                        <a href="#">
                            <img src="assets/img/icons/teste.png" alt="" class="imgCardAcessoRapido testeConfigImg">    
                        </a>
                        <div class="titleCardAcessoRapido titleTeste">
                            Teste
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div id="aniversariantes">
                <div id="sideLeft">
                    <h4 class="subTitle titleAviso">
                        <?php 
                            $result_title = "SELECT * FROM tb_colaborador WHERE month(aniversario )= $dateNow  and status = 'A'";
                            $resultado_title = mysqli_query($conecta, $result_title);
                            $row_title = mysqli_fetch_assoc($resultado_title);
                            $mesNome = 'teste'; // $row_title['nome_colaborador']; // Problema no Array / Verificar no Banco de Dados
                        ?>
                        Aniversariantes 
                        <hr class="lineBottomSubTitle">
                    </h4>

                    <div class="swiper swiper2">
                        <div class="swiper-wrapper">
                            <?php 
                                $result_carousel = "SELECT * FROM tb_colaborador WHERE MONTH(aniversario) = '$dateNow'";
                                $resultado_carousel = mysqli_query($conecta, $result_carousel);
                                while($row_carousel = mysqli_fetch_assoc($resultado_carousel)) {
                                $imageCarousel = $row_carousel['image_colaborador'];
                                $nome = $row_carousel['nome_colaborador'];
                                $niver = $row_carousel['aniversario'];
                            ?>
                            <div class="swiper-slide">
                                <img src="<?php echo 'assets/img/fotos/'.$imageCarousel //$imageCarousel;?>" class="imgAniversario" >
                                <p class="textsAniversariantes"><?php echo $nome; ?></p>
                                <p class="textsAniversariantes">
                                    <?php 
                                        $horaFormat = new DateTime($niver); 
                                        echo $horaFormat->format('d/m/Y');
                                    ?>
                                </p>
                            </div>

                            <?php 
                                }
                            ?>
                                
                        </div>                  
                    </div>
                </div>

                <div id="sideRight">
                    <div id="listBirthdays">
                        <?php 
                            $result_carousel = "SELECT * FROM tb_colaborador WHERE MONTH(aniversario) = '$dateNow'";
                            $resultado_carousel = mysqli_query($conecta, $result_carousel);
                            while($row_carousel = mysqli_fetch_assoc($resultado_carousel)) {
                            $imageCarousel = 'assets/img/fotos/anny.jpg';
                            $nome = $row_carousel['nome_colaborador'];
                            $niver = $row_carousel['aniversario'];
                        ?>
                        <div class="item">
                            <h5 class="nameItemBirthday">
                                <?php echo $nome; ?>
                            </h5>

                            <p class="dateItemBirthday">
                                <?php 
                                    $horaFormat = new DateTime($niver); 
                                    echo $horaFormat->format('d/m/Y');
                                ?>
                            </p>
                        </div>

                        <?php
                            }
                        ?>
                    
                    </div>
                </div>
            </div> -->

            <!-- <div id="eventos">
                <h4 class="subTitle">
                    Eventos
                    <hr class="lineBottomSubTitle">
                </h4>

                <div class="cardsEventos">
                            <?php 
                                $result_evento = "SELECT * FROM tb_calendario LIMIT 4";
                                $resultado_evento = mysqli_query($conecta, $result_evento);
                                while($row_evento = mysqli_fetch_assoc($resultado_evento)) {
                                    $descricao = $row_evento['descricao_evento'];
                                    $data = $row_evento['data_evento'];
                            ?>

                            <div class="dataEvento">
                                <p class="dia">
                                    <?php
                                        $horaFormat = new DateTime($data); 
                                        echo $horaFormat->format('d');
                                    ?>
                                </p>

                                <p class="mes">
                                    <?php
                                        $horaFormat = new DateTime($data);
                                        $nomeMes = $horaFormat->format('m');
                                        $result_mes = "SELECT * FROM tb_mes WHERE id_mes = '$nomeMes'";
                                        $resultado_mes = mysqli_query($conecta, $result_mes);
                                        $row_mes = mysqli_fetch_assoc($resultado_mes);
                                        $mes = isset($row_mes['nomeAbr']);
                                        echo "/".$nomeMes;
                                    ?>
                                </p>

                                <p class="descricao"><?php echo $descricao?></p>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
            </div> -->
        </div>

            <!-- Vantagens Falavinha -->
            <!-- <div class="vantagensPage"> 
                <h1 id="titleVantagens">Vantagens Falavinha</h1>
                
                <div class="areasGrid">
                    <div class="boxTxtVantagens">
                        <div id="textVantagens">
                            <h3>Você Sabia?</h3>
                            <div id="cardTextVantagens">
                                <p>
                                    Sendo um colaborador Falavinha Next, você tem direito a diversas <strong>Vantagens</strong>! 
                                    É isso mesmo que você leu.<br> Temos muitos parceiros de diversos segmentos que disponibilizam 
                                    incríveis descontos em serviços ou produtos. Não perca tempo, entre em contato com a recepção 
                                    e tire suas dúvidas.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="boxImageVantagens">
                        <img src="assets/img/person_vantagens.png" alt="Menina loira com as mãos em baixo queixo em posição de dúvida" id="imgVantagens">
                    </div>

                    <div class="BoxCardsVantagens">
                        <div class="tamnVantagens">
                            <div class="carousel">
                                <div>
                                    <img src="assets/img/carousel/academia.png" alt="img1" class="imgCarousel" />
                                    <p class="txtCarousel"><strong>Academia</strong> - Estilo de vida</p>
                                </div>

                                <div>
                                    <img src="assets/img/carousel/difrango.png" alt="img2" class="imgCarousel" />
                                    <p class="txtCarousel">La Casa Di Frango</p>
                                </div>

                                <div>
                                    <img src="assets/img/carousel/fisioterapeuta.png" alt="img3" class="imgCarousel"/>
                                    <p class="txtCarousel"><strong>Fisioterapeuta</strong> - Dr. João Paulo</p>
                                </div>

                                <div>
                                    <img src="assets/img/carousel/influx.png" alt="img4" class="imgCarousel" />
                                    <p class="txtCarousel">inFlux</p>
                                </div>

                                <div>
                                    <img src="assets/img/carousel/uninter.png" alt="img5" class="imgCarouselUninter" />
                                    <p class="txtCarousel">Uninter</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- FeedBack -->
            <!-- <div id="feedBackClientes">
                <h1 id="titleFeedBack">
                    Feedback
                </h1>

                <div id="cardsTexts">
                    <?php 
                        $result_feedBack = "SELECT * FROM tb_feedbackclientes LIMIT 3";
                        $resultado_feedBack = mysqli_query($conecta, $result_feedBack);
                        while($row_feedBack = mysqli_fetch_assoc($resultado_feedBack)) {
                            $img = $row_feedBack['img'];
                            $text = $row_feedBack['textColab'];
                            $nome = $row_feedBack['nome'];
                    ?>
                    <div class="column">
                        <img src="assets/img/imgClientes/<?php echo $img?>" class="imgColumn">
                        <p class="txtFeedBack mensagemCliente">
                            <?php echo $text?>
                        </p>
                        <p class="txtFeedBack nameClient">
                            <?php echo $nome?>
                        </p>
                    </div>

                    <?php 
                        }
                    ?>
                </div>
                
                <p id="fraseBottom">
                    “As grandes coisas nos negócios nunca são feitas por 
                    uma pessoa só. Elas são feitas por um time.” – Steve Jobs
                </p>
            </div> -->

            <!-- Sugestão -->
            <!-- <div id="sugestao">
                <p id="mensagemSetor">
                Quais são as suas primeiras impressões da Intranet Falavinha?
                </p>
                
                <p id="sugestaoMsg">
                    Você tem alguma ideia brilhante para melhorar a nossa plataforma? Aproveite e deixe sua <strong>sugestão</strong>, <strong>crítica</strong> ou <strong>elogio</strong> abaixo.
                </p>

                <form action="https://formsubmit.co/joao.silva@falavinha.com.br" method="POST" id="formSugestao">
                    <input type="hidden" name="_next" value="http://localhost/intranet/index.php">
                    <div class="row1">
                        <div id="campoNameForm">
                            <span class="titleForm">Nome e sobrenome</span>
                            <input type="text" name="Nome" id="name_form" placeholder="Nome e sobrenome" required>
                        </div>
                        
                        <div id="setorForm">
                            <span class="titleForm">Setor</span>
                            <select name="Setor" id="sugestao_intranet" required>
                                <option selected disabled hidden>Setor</option>
                                <option value="inteligencia">Inteligência</option>
                                <option value="administrativo">Administrativo</option>
                                <option value="comercial">Comercial</option>
                                <option value="dp">DP</option>
                                <option value="contabil">Contábil</option>
                                <option value="empresarial">Empresarial</option>
                                <option value="societario">Societário</option>
                                <option value="marketing">Marketing</option>

                            </select>
                        </div>
                    </div>

                    <div class="row2">
                        <span class="titleForm">Sugestão</span>
                        <textarea name="Mensagem" id="txtSugestao" placeholder="Qual sua ideia para melhorar o nosso portal?" required></textarea>
                    </div>

                    <div class="row3">
                        <button type="submit" id="btnForm">
                            Enviar
                        </button>
                    </div>
                </form>

            </div> -->

            <!-- Redes Sociais -->
            <!-- <div id="redesSociais">
                <h3 id="titleRedesSociais">Fique por dentro das novidades!</h3>
                <p id="subTitleRedesSociais">Siga nossa redes sociais</p>
                <div id="logosRedesSociais">
                    <a href="https://www.youtube.com/channel/UCQ_Eb9CrstxaCrJQ3ON128w" target="_blank" class="linksLogos" onMouseOver="descriptionLogo()">
                        <img src="assets/img/icons/youtubeLogo.png" alt="Logo Youtube">
                    </a>

                    <a href="https://www.linkedin.com/company/falavinha-next/mycompany/" target="_blank" class="linksLogos">
                        <img src="assets/img/icons/linkedin.png" alt="Logo Linkedin">
                    </a>

                    <a href="https://www.facebook.com/FalavinhaNext/" target="_blank" class="linksLogos">
                        <img src="assets/img/icons/facebook.png" alt="Logo Facebook">
                    </a>

                    <a href="https://www.instagram.com/falavinhanext/" target="_blank" class="linksLogos">
                        <img src="assets/img/icons/instagram.png" alt="Logo Instagram">
                    </a>
                </div>
            </div> -->
        
    


        
        
        
        
    <!-- Scripts -->