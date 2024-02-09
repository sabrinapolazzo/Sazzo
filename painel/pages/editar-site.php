<?php
$siteConfig = Site::listData('tb_site.config');
?>

<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica se os dados são para atualização do site ou para inserção de specials
            if (isset($_POST['site_data'])) {
                // Atualiza os dados do site
                if (Painel::update($_POST['site_data'], true)) {
                    Painel::alertUpdate('success', 'Os dados do site foram atualizados com sucesso!');
                    // Recarrega os dados do site após a atualização
                    $siteConfig = Site::listData('tb_site.config');
                } else {
                    Painel::alertUpdate('erro', 'Erro ao atualizar os dados do site.');
                }
            }
            if (isset($_POST['specials_data'])) {
                // Insere os novos specials
                if (Painel::insert($_POST['specials_data'])) {
                    Painel::alertUpdate('success', 'Os specials foram inseridos com sucesso!');
                } else {
                    Painel::alertUpdate('erro', 'Erro ao inserir os specials.');
                }
            }
        }

        ?>
        <h6 class="mb-3"><i class="fa fa-pen-to-square"></i>Editar Site</h6>
        <div class="site-data">
        <div class="mb-3">
            <label for="title" class="form-label">Título do site</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo $siteConfig['title'] ?>">
        </div>
        <div class="mb-3">
            <label for="name_author" class="form-label">Nome do Autor</label>
            <input id="name_author" name="name_author" class="form-control" value="<?php echo $siteConfig['name_author'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="about_author" class="form-label">Sobre o Autor</label>
            <textarea id="about_author" name="about_author" class="form-control" cols="30" rows="10"><?php echo $siteConfig['about_author'] ?></textarea>
        </div>
        </div>

        <h5 class="mt-5 text-center"><i class="fa fa-pen-to-square"></i>Boxes do site</h5>
        <button id="btn-specials-plus" style="width: 30px;" class="btn specials-plus bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-plus"></i></button>

        <div class="specials grid">
            <?php
            $Specials = Site::listData('tb_admin.specials', 6, 'id');
            foreach ($Specials as $key => $value) {
            ?>
                <div class="box-specials w-90 bg-terciary-color mb-5 p-3">
                    <button id="btn-specials-minus" style="width: 30px;color:black;" class="btn specials-minus bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-minus"></i></button>
                    <div class="mb-3 text-light">
                        <label for="icon" class="form-label">Ícone</label>
                        <input id="icon1" name="icon" class="form-control " value="<?php echo $value['icon'] ?>"></input>
                    </div>
                    <div class="mb-3 text-light">
                        <label for="subtitle" class="form-label">Subtítulo</label>
                        <input id="subtitle" name="subtitle" class="form-control" value="<?php echo $value['subtitle'] ?>"></input>
                    </div>
                    <div class="mb-3 text-light">
                        <label for="subtitle" class="form-label">Descrição</label>
                        <input id="subtitle" name="subtitle" class="form-control" value="<?php echo $value['description'] ?>"></input>
                    </div>
                </div>
            <?php } ?>
        </div>


        <div class="mt-3 flex justify-content-center">
            <input type="hidden" name="name_table" value="tb_site.config">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Atualizar!">
        </div>
    </div>
</form>