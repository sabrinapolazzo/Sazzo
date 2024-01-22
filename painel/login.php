<!DOCTYPE html>
<html lang="en" class="login">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <title>Painel de controle</title>
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet">
</head>

<body class="login">
    <div class="box-login">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="login" placeholder="Login...">
            <input type="password" name="password" placeholder="Senha...">
            <input type="submit" name="acao" value="Logar!">
            <?php
            if (isset($_POST['acao'])) {
                $user = $_POST['login'];
                $password = $_POST['password'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ? ");
                $sql->execute(array($user, $password));
                if ($sql->rowCount() == 1) {
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    header('Location: ' . INCLUDE_PATH_PAINEL);
                    die();
                } else {
                    echo '<div style="color:red;margin-top:20px;font-style: italic;text-transform:lowercase; class="erro-box"> <i class="fa fa-times"></i> Usuário ou senha incorretos !</div>';
                }
            }

            ?>
        </form>
    </div><!-- box-login -->
</body>

</html>