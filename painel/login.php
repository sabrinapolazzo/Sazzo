<?php

require('../vendor/autoload.php');

if (isset($_COOKIE['remember'])) {
    $user = $_COOKIE['user'];
    $password = $_COOKIE['password'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ? ");
    $sql->execute(array($user, $password));
    if ($sql->rowCount() == 1);
    $info = $sql->fetch();
    $_SESSION['login'] = true;
    $_SESSION['user'] = $user;
    $_SESSION['name'] = $info['name'];
    $_SESSION['type_user'] = $info['type_user'];
    $_SESSION['password'] = $password;
    $_SESSION['img'] = $info['img'];
    die();
}

?>

<!DOCTYPE html>
<html lang="en" class="login">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH; ?>imagens/favicon.png">
    <title>Painel de controle</title>
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet">
</head>

<body class="login">
    <div class="box-login">
        <h2>Login</h2>
        <?php

        $clientID = "343541106905-8k37g51dfbh8tpqbsh63ci78bvgmkuhk.apps.googleusercontent.com";
        $clientSecret = "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";
        $redirectUri = 'http://localhost/Sazzo/painel/main.php';

        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope('email profile');

        $oauth2 = new Google_Service_Oauth2($client);

        if (!isset($_GET['code'])) {
            $authUrl = $client->createAuthUrl();
            echo '<div class="login-google">
            <a class="link-google" href="' . $authUrl . '"><i class="fa-brands fa-google"> Logar com Google</i></a>
          </div>';
        } else {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

            if (!isset($token['error'])) {
                $client->setAccessToken($token['access_token']);
                $_SESSION['access_token'] = $token['access_token'];

                // Define o tipo de usuário
                $type_user = 0;

                // Pega os dados todos os dados do usuário
                $userInfo = $oauth2->userinfo->get();

                // Pega os dados específicos para fazer o insert ou select no banco
                $userId = $userInfo->getId();
                $userEmail = $userInfo->getEmail();
                $userName = $userInfo->getName();
                $file = $userInfo->getPicture();

                Painel::uploadFileGoogle($file, $userId);

                // Verifica se há um usuário
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users_google` WHERE id_google = ?");
                $sql->execute(array($userId));

                if ($sql->rowCount() == 1) {
                    $info = $sql->fetch();
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['name'] = $info['name'];
                    $_SESSION['type_user'] = $info['type_user'];
                    $_SESSION['img'] = $info['img'];
                } else {
                    $profilePicture = $userId . '_profile_picture.jpg';
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.users_google` VALUES (null,?,?,?,?,?) ");
                    $sql->execute(array($userId, $userEmail, $userName, $profilePicture, $type_user));


                    // Agora, faça uma nova consulta para obter as informações recém-inseridas
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users_google` WHERE id_google = ?");
                    $sql->execute(array($userId));
                    $info = $sql->fetch();
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['name'] = $info['name'];
                    $_SESSION['type_user'] = $info['type_user'];
                    $_SESSION['img'] = $info['img'];
                }
            }
        }
        ?>

        <form method="POST">
            <input type="text" name="login" placeholder="Login...">
            <input type="password" name="password" placeholder="Senha...">
            <input type="submit" name="acao" value="Logar!">
            <div class="remember flex">
                <input type="checkbox" id="remember" name="remember">
                <p for="remember" class="lembrar">Lembrar-me</p>
            </div>
            <?php
            if (isset($_POST['acao'])) {
                $user = $_POST['login'];
                $password = $_POST['password'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.users` WHERE user = ? AND password = ? ");
                $sql->execute(array($user, $password));
                if ($sql->rowCount() == 1) {
                    $info = $sql->fetch();
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['name'] = $info['name'];
                    $_SESSION['type_user'] = $info['type_user'];
                    $_SESSION['password'] = $password;
                    $_SESSION['img'] = $info['img'];
                    if (isset($_POST['remember'])) {
                        setcookie('remember', true, time() + (60 * 60 * 24), '/');
                        setcookie('user', $user, time() + (60 * 60 * 24), '/');
                        setcookie('user', $password, time() + (60 * 60 * 24), '/');
                    }

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