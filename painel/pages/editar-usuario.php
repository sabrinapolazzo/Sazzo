<form method="post" enctype="multipart/form-data">
  <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
  <?php 
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      // enviar formulários
        Painel::alertUpdate('success','Atualizado com sucesso');
    }else{
      Painel::alertUpdate('erro','Houve uma falha ao enviar os dados do formulário');
    }
  ?>
    <h6 class="mb-3"><i class="fa fa-rocket"></i> Editar usuários</h6>
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" id="name" name="name" class="form-control" autocomplete="off" value="<?php echo $_SESSION['name']; ?>">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Senha</label>
      <input type="password" id="password" name="password" class="form-control" autocomplete="off" required value="<?php echo $_SESSION['password']; ?>">
    </div>

    <div class="mb-3">
      <label for="img" class="form-label">Imagem de perfil</label>
      <input class="form-control" id="img" name="img" type="file" required>
      <input class="form-control" name="img_atual" type="hidden" value=" <?php echo $_SESSION['img']; ?> ">
    </div>

    <div class="mt-3 flex justify-content-center">
      <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Atualizar!">
    </div>
  </div>
</form>