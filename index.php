<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="desenvolvedora,site,desenvolvimento de sites,js,css,html">
    <meta name="description" content="Desenvolvemos sites dinâmicos conforme a sua necessidade">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>style.css">
    <title>Projeto 01</title>
</head>

<body>

    <header>
        <div class="center">
            <div class="logo left"><a href="">L O G O M A R C A</a></div><!--logo-->
            <nav class="desktop rigth">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">HOME</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">SOBRE</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">SERVIÇOS</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">CONTATO</a></li>
                </ul>
            </nav>
            <nav class="mobile rigth">
                <div class="icone-menu-mobile"><i style="color:white;" class="fa fa-bars"></i></div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">HOME</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">SOBRE</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">SERVIÇOS</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">CONTATO</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>

    <?php
      $url = isset($_GET['url']) ? $_GET['url'] : 'home';

      if(file_exists('pages/'.$url.'.php')){
        include('pages/'.$url.'.php');
      }else{
        include('pages/404.php');
      }
    ?>

    <footer>
        <div class="center">
            <p>Todos os direitos reservados ©</p>
        </div><!--center-->
    </footer>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
</body>

</html>