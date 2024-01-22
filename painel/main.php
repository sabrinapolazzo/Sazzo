<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php 
if(isset($_GET['loggout'])){
    Painel::loggout();
};
?>

<!DOCTYPE html>
<html lang="en" class="main">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <title>Painel de controle</title>
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet">
</head>

<body class="main">
    <section class="panel flex row-2">
<aside class="flex">

</aside>
    <header class="flex">
    <div class="center">
        <div class="loggout flex">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </header>
</div>
</section>
</body>

</html>