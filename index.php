<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="desenvolvedora,site,desenvolvimento de sites,js,css,html">
    <meta name="description" content="Desenvolvemos sites dinâmicos conforme a sua necessidade">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH; ?>imagens/favicon.png">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>style.css">
    <title>Projeto 01</title>
</head>

<body>

    <base base="<?php echo INCLUDE_PATH ?>" />
    <?php
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    switch ($url) {
        case 'depoimentos':
            echo '<target target="depoimentos" />';
            break;

        case 'servicos':
            echo '<target target="servicos" />';
            break;
    }
    ?>
     
    <div class="sucesso">Formulário enviado com sucesso</div>
    <div class="erro">Não conseguimos enviar o formulário</div>
    <div class="overlay-loading">
    <img src="<?php echo INCLUDE_PATH ?>imagens/ajax-load.gif">
    </div><!--overlay-loading-->

    <header>
        <div class="center">
            <div class="logo left"><a href="">L O G O M A R C A</a></div><!--logo-->
            <nav class="desktop rigth">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">HOME</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">DEPOIMENTOS</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">SERVIÇOS</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">CONTATO</a></li>
                </ul>
            </nav>
            <nav class="mobile rigth">
                <div class="icone-menu-mobile"><i style="color:white;" class="fa fa-bars"></i></div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">HOME</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">DEPOIMENTOS</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">SERVIÇOS</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">CONTATO</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>

    <div class="container-principal">
        <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        if (file_exists('pages/' . $url . '.php')) {
            include('pages/' . $url . '.php');
        } else {
            if ($url != 'depoimentos' && $url != 'servicos') {
                $page404 = true;
                include('pages/404.php');
            } else {
                include('pages/home.php');
            }
        }
        ?>
    </div>
    <footer <?php if (isset($page404) && $page404 == true) {
                echo 'class="fixed"';
            } ?>>
        <div class="center">
            <p>Todos os direitos reservados ©</p>
        </div><!--center-->
    </footer>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <?php
    if ($url == 'contato') {
    ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEQfU2Z0CfbH-UY6sKnvJmgW2CETBTiWo&callback=initMap"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
    <?php } ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/loadInterval.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/forms.js"></script>

</body>

</html>