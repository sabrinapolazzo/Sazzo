<?php

class Usuario{

    public function updateUsuario($nome,$senha,$imagem){
        $sql= MySql::conectar()->prepare("UPDATE `tb_admin.users` SET name = ?, password = ?, img = ? WHERE user = ?");
        if ($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))){
            return true;
        }else{
            return false;
        }
    }

    public static function userExists($user){
        
    }
}

?>