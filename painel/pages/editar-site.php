<?php
$siteConfig = Site::listData('tb_site.config');
?>

<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            if (Painel::update($_POST,true)) {
                Painel::alertUpdate('success', 'A edição do depoimento foi feita com sucesso!');
                $siteConfig = Site::listData('tb_site.config');
            } else {
                Painel::alertUpdate('erro', 'Campos vazios não são permitidos.');
            }
        }

        ?>
        <h6 class="mb-3"><i class="fa fa-pen-to-square"></i>Editar Site</h6>
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

        <div class="mb-3">
            <label for="icon1" class="form-label">Ícone 1</label>
            <input id="icon1" name="icon1" class="form-control" value="<?php echo $siteConfig['icon1'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="subtitle1" class="form-label">Subtítulo 1</label>
            <input id="subtitle1" name="subtitle1" class="form-control" value="<?php echo $siteConfig['subtitle1'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="description1" class="form-label">Descrição 1</label>
            <textarea id="description1" name="description1" cols="30" rows="10" class="form-control"><?php echo $siteConfig['description1'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="icon2" class="form-label">Ícone 2</label>
            <input id="icon2" name="icon2" class="form-control" value="<?php echo $siteConfig['icon2'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="subtitle2" class="form-label">Subtítulo 2</label>
            <input id="subtitle2" name="subtitle2" class="form-control" value="<?php echo $siteConfig['subtitle2'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="description2" class="form-label">Descrição 2</label>
            <textarea id="description2" name="description2" cols="30" rows="10" class="form-control"><?php echo $siteConfig['description2'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="icon3" class="form-label">Ícone 3</label>
            <input id="icon3" name="icon3" class="form-control" value="<?php echo $siteConfig['icon3'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="subtitle3" class="form-label">Subtítulo 3</label>
            <input id="subtitle3" name="subtitle3" class="form-control" value="<?php echo $siteConfig['subtitle3'] ?>"></input>
        </div>
        <div class="mb-3">
            <label for="description3" class="form-label">Descrição 3</label>
            <textarea id="description3" name="description3" cols="30" rows="10" class="form-control"><?php echo $siteConfig['description3'] ?></textarea>
        </div>
       

        <div class="mt-3 flex justify-content-center">
            <input type="hidden" name="name_table" value="tb_site.config">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Atualizar!">
        </div>
    </div>
</form>