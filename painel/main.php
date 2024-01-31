<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (isset($_GET['loggout'])) {
    Painel::loggout();
}
?>

<!DOCTYPE html>
<html lang="en" class="main">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH; ?>imagens/favicon.png">
    <title>Painel de controle</title>
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet">
</head>

<body class="main">
    <section class="panel row-2">
        <aside>
            <div class="box-usuario">

                <?php
                if ($_SESSION['img'] == '') {
                ?>
                    <div class="avatar-usuario">
                        <i class="fa fa-user"></i>
                    </div>
                <?php } else { ?>
                    <div class="img-usuario">
                        <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>">
                    </div>
                <?php } ?>
                <div class="nome-usuario">
                    <p><?php echo $_SESSION['name'] ?></p>
                    <p><?php echo getUser($_SESSION['type_user']) ?></p>
                </div>
            </div>
            <div class="items-menu">
                <h2>Cadastros</h2>
                <a <?php menuSelecionado('cadastrar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimentos">Cadastrar depoimentos</a>
                <a <?php menuSelecionado('cadastrar-servicos'); ?> href="">Cadastrar serviços</a>
                <a <?php menuSelecionado('cadastrar-especialidades'); ?> href="">Cadastrar especialidades</a>
                <h2>Gestão</h2>
                <a <?php menuSelecionado('listar-depoimentos'); ?> href="">Listar Depoimentos</a>
                <a <?php menuSelecionado('listar-servicos'); ?> href="">Listar Serviços</a>
                <h2>Administração do Painel</h2>
                <a <?php menuSelecionado('adicionar-usuario'); ?> <?php permissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuários</a>
                <a <?php menuSelecionado('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuários</a>
                <h2>Configuração Geral</h2>
                <a <?php menuSelecionado('editar-site'); ?> href="">Editar Site</a>

            </div>
        </aside>

        <div class="flex components-menu">
            <header class="flex">
                <div class="space-center flex mt-2">
                    <div class="menu-btn flex">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="loggout flex">
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                    </div>
            </header>

            <?php
                Painel::loadPage();
            ?>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>painel/js/forms.js"></script>
</body>

</html>