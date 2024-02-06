<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            if (Painel::update($_POST,false)) {
                Painel::alertUpdate('success', 'A edição do depoimento foi feita com sucesso!');
                $siteConfig = Painel::select('tb_site.config',false,false);
            } else {
                Painel::alertUpdate('erro', 'Campos vazios não são permitidos.');
            }
        }

        ?>
        <h6 class="mb-3"><i class="fa fa-pen-to-square"></i> Editar Site</h6>
        <div class="mb-3">
            <label for="title" class="form-label">Título do site</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo $siteConfi['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="name_author" class="form-label">Nome do Autor</label>
            <textarea id="name_author" name="name_author" class="form-control" cols="30" rows="10"><?php echo $siteConfig['name_author'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="description_author" class="form-label">Data de atualização</label>
            <input type="text" id="escription_author" name="escription_author" class="form-control" value="<?php echo $siteConfig['escription_author'] ?>">
        </div>

        <div class="mt-3 flex justify-content-center">
            <input type="hidden" name="name_table" value="tb_site.config">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Atualizar!">
        </div>
    </div>
</form>