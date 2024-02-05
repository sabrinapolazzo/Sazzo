<?php

permissaoPagina(2);

?>

<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      // enviar formulários
      $login = $_POST['login'];
      $nome = $_POST['name'];
      $senha = $_POST['password'];
      $cargo = $_POST['cargo'];
      $imagem = $_FILES['img'];
     
      if ($login == '') {
        Painel::alertUpdate('erro', 'O login está vazio!');
      }else if($cargo == ''){
        Painel::alertUpdate('erro', 'O cargo precisa estar selecionado!');
      }else if($senha == ''){
        Painel::alertUpdate('erro', 'A senha está vazia!');
      }else if($nome == ''){
        Painel::alertUpdate('erro', 'O nome está vazio!');
      }else if($imagem['name'] == ''){
        Painel::alertUpdate('erro', 'Adicione uma imagem!');
      }else{
        if($cargo >= $_SESSION['type_user']){
          Painel::alertUpdate('erro', 'Você não tem permissão para selecionar esse cargo!');
        }else if(Painel::imagemValida($imagem) == false){
            Painel::alertUpdate('erro','O formato especificado não é válido');
        }else if(Usuario::userExists($login)){
          Painel::alertUpdate('erro','Usuário já está em uso. Por favor selecione outro nome!');
        }else{
          // adicionar ao banco de dados
          $usuario = new Usuario();
          $imagem = Painel::uploadFile($imagem);
          $usuario->addUsers($login,$nome,$senha,$cargo,$imagem);
          Painel::alertUpdate('success', 'O cadastro do usuário '.$login.' foi feito com sucesso!');
        }
      }

    }
    ?>
        <h6 class="mb-3"><i class="fa fa-rocket"></i> Editar usuários</h6>
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" id="login" name="login" class="form-control" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password" class="form-control" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="Cargo" class="form-label">Tipo de usuário</label>
            <select id="cargo" name="cargo" class="form-control">
                <?php  
                foreach (Painel::$cargos as $key => $value) {
                    if($key <= $_SESSION['type_user']) echo '<option value="'.$key.'">'.$value.'</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Imagem de perfil</label>
            <input class="form-control" id="img" name="img" type="file">
            <input class="form-control" name="img_atual" type="hidden" value=" <?php echo $_SESSION['img']; ?> ">
        </div>

        <div class="mt-3 flex justify-content-center">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Adicionar!">
        </div>
    </div>
</form>