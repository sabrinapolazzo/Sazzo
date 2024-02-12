<?php
$siteConfig = Site::listData('tb_site.config');

if (isset($_GET['delete'])) {
    $idDelete = intval($_GET['delete']);
    Painel::delete('tb_admin.specials', $idDelete);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'editar-site');
}
$successShown = false;
$successShown1 = false;
?>

<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Verifica se os dados são para atualização do site ou para inserção de specials
            if (isset($_POST['site_data'])) {
                // Atualiza os dados do site
                if (Painel::update($_POST['site_data'],true)) {
                    Painel::alertUpdate('success', 'Os dados do site foram atualizados com sucesso!');
                } else {
                    Painel::alertUpdate('erro', 'Erro ao atualizar os dados do site.');
                }
            }

            //Verifica se os dados são para atualização do site ou para inserção de specials
            if (isset($_POST['box_specials'])) {
                foreach ($_POST['box_specials'] as $special) {
                    // Atualiza os dados do site
                    if (Painel::update($special, false)) {
                        if (!$successShown) {
                            Painel::alertUpdate('success', 'Os dados das boxes foram atualizados com sucesso!');
                            // Define a variável de sinalização como verdadeira para indicar que a mensagem foi mostrada
                            $successShown = true;
                        }
                    } else {
                        Painel::alertUpdate('erro', 'Erro ao atualizar os dados do site.');
                    }
                }
            }
            //Post para novos inserts
            if (isset($_POST['box_insert'])) {
                foreach ($_POST['box_insert'] as $insertData) {
                    // Atualiza os dados do site
                    if (Painel::insertfirst($insertData)) {
                        if (!$successShown1) {
                            Painel::alertUpdate('success', 'Os novos dados foram inseridos com sucesso!');
                            // Define a variável de sinalização como verdadeira para indicar que a mensagem foi mostrada
                            $successShown1 = true;
                        }
                    } else {
                        Painel::alertUpdate('erro', 'Erro ao atualizar os dados do site.');
                    }
                }
            }
        }

        ?>
        <h6 class="mb-3"><i class="fa fa-pen-to-square"></i>Editar Site</h6>
        <div class="site-data">
            <div class="mb-3">
                <label for="title" class="form-label">Título do site</label>
                <input type="text" id="site_data[title]" name="title" class="form-control" value="<?php echo $siteConfig['title'] ?>">
            </div>
            <div class="mb-3">
                <label for="name_author" class="form-label">Nome do Autor</label>
                <input id="name_author" name="site_data[name_author]" class="form-control" value="<?php echo $siteConfig['name_author'] ?>"></input>
            </div>
            <div class="mb-3">
                <label for="about_author" class="form-label">Sobre o Autor</label>
                <textarea id="about_author" name="site[about_author]" class="form-control" cols="30" rows="10"><?php echo $siteConfig['about_author'] ?></textarea>
            </div>
            <input type="hidden" name="site_data[name_table]" value="tb_site.config">
        </div>

        <h5 class="mt-5 text-center"><i class="fa fa-pen-to-square"></i>Boxes do site</h5>
        <button id="btn-specials-plus" style="width: 30px;" class="btn specials-plus bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-plus"></i></button>

        <div class="specials grid">
            <?php
            $Specials = Site::listData('tb_admin.specials', 6, 'id');
            foreach ($Specials as $key => $value) {
            ?>
                <div class="box-specials w-90 bg-terciary-color mb-5 p-3">
                    <a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site?delete=<?php echo $value['id'] ?>" style="width: 30px; color:black;" class="btn specials-minus-delete bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-minus"></i></a>
                    <div class="mb-3 text-light">
                        <label for="icon_<?php echo $value['id']; ?>" class="form-label">Ícone</label>
                        <input id="icon_<?php echo $value['id']; ?>" name="box_specials[<?php echo $value['id']; ?>][icon]" class="form-control" value="<?php echo $value['icon']; ?>">
                    </div>
                    <div class="mb-3 text-light">
                        <label for="subtitle_<?php echo $value['id']; ?>" class="form-label">Subtítulo</label>
                        <input id="subtitle_<?php echo $value['id']; ?>" name="box_specials[<?php echo $value['id']; ?>][subtitle]" class="form-control" value="<?php echo $value['subtitle']; ?>">
                    </div>
                    <div class="mb-3 text-light">
                        <label for="description_<?php echo $value['id']; ?>" class="form-label">Descrição</label>
                        <input id="description_<?php echo $value['id']; ?>" name="box_specials[<?php echo $value['id']; ?>][description]" class="form-control" value="<?php echo $value['description']; ?>">
                    </div>
                    <input type="hidden" name="box_specials[<?php echo $value['id']; ?>][id]" value="<?php echo $value['id']; ?>">
                    <input type="hidden" name="box_specials[<?php echo $value['id']; ?>][name_table]" value="tb_admin.specials">
                </div>
            <?php } ?>
        </div>


        <div class="mt-3 flex justify-content-center">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Atualizar!">
        </div>
    </div>
</form>