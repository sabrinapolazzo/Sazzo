<section class="banner-principal">
    <div class="overlay"></div>
    <div class="center">
        <form method="post">
            <h2>Qual o seu melhor E-mail?</h2>
            <input type="email" name="email" autocomplete="on" required>
            <input type="hidden" name="identificador" value="form_home">
            <input type="submit" name="acao" value="Cadastrar!">
        </form>
    </div><!--center-->
</section><!--banner principal-->

<section class="descricao-autor center">
    <div class="w50 flex">
        <h2><?php echo $infoSite['name_author'] ?></h2>
        <p><?php echo $infoSite['about_author'] ?><br></p>
    </div><!--w50-->
    <div class="w50 flex">
        <img class="rigth" src="<?php echo INCLUDE_PATH; ?>imagens\imagem-autor.jpg" alt="Imagem Autor">
    </div><!--w50-->
    <div class="clear"></div>
</section><!--descricao-autor-->

<section class="especialidades">
    <div class="center">
        <h2 class="title">Especialidades</h2>
        <div class="box-especialidades w33 left">
            <h3><i class="<?php echo $infoSite['icon1'] ?>"></i></h3>
            <h4><?php echo $infoSite['subtitle1'] ?></h4>
            <p><?php echo $infoSite['description1'] ?></p>
        </div><!--box-especialidades-->
        <div class="box-especialidades w33 left">
            <h3><i class="<?php echo $infoSite['icon2'] ?>"></i></h3>
            <h4><?php echo $infoSite['subtitle2'] ?></h4>
            <p><?php echo $infoSite['description2'] ?></p>
        </div><!--box-especialidades-->
        <div class="box-especialidades w33 left">
            <h3><i class="<?php echo $infoSite['icon3'] ?>"></i></h3>
            <h4><?php echo $infoSite['subtitle3'] ?></h4>
            <p><?php echo $infoSite['description3'] ?></p>
        </div><!--box-especialidades-->
        <div class="clear"></div>
    </div><!--center-->
</section><!--especialidades-->

<section class="extras">
    <div class="center">
        <div id="depoimentos" class="w50 left depoimentos-container">
            <h2 class="title">Depoimentos dos nossos clientes</h2>

            <?php
            $limit = 3;
            $order = 'date';
            $table = 'tb_site.testimonial';
            $testimonial = Site::listData($table, $limit, $order);
            foreach ($testimonial as $key => $value) {
            ?>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"<?php echo $value['testimonial']; ?>"</p>
                    <p class="nome-autor"><?php echo $value['name']; ?> - <?php echo date('d/m/Y', strtotime($value['date'])) ?></p>
                </div><!--depoimentos-singles-->
            <?php
            }
            ?>

        </div><!--w50-->
        <div id="servicos" class="w50 left servicos-container">
            <h2 class="title">Serviços</h2>
            <div class="servicos">
                <ul>
                    <?php
                    $limit = 5;
                    $order = 'order_id';
                    $table = 'tb_site.servicos';
                    $servico = Site::listData($table, $limit, $order);
                    foreach ($servico as $key => $value) {
                    ?>
                        <li><?php echo $value['servico']; ?></li>
                    <?php } ?>
                </ul>
            </div><!--servicos-->
        </div><!--w50-->
        <div class="clear"></div>
    </div><!--center-->
</section><!--extras-->