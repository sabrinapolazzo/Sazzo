
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
        <h2>Sabrina C. Polazzo</h2>
        <P>Há um ano e meio, mergulhei de cabeça no fascinante mundo da programação, iniciando minha jornada rumo ao desenvolvimento web full stack. Neste período de aprendizado intenso, descobri uma paixão ardente pelo desafiador universo do back-end.<br>

            Meu foco e determinação me conduziram às entranhas dos servidores e bancos de dados, onde a lógica se entrelaça para formar sistemas robustos. Minha jornada no back-end é marcada pela mestria na linguagem PHP, uma ferramenta poderosa para dar forma à funcionalidade de aplicativos web.<br>

            Entretanto, meu interesse não se restringe apenas ao código do servidor. Sou uma habilidosa front-end, navegando com destreza pelos domínios do JavaScript, jQuery, HTML e CSS. Minha compreensão holística do desenvolvimento web me permite criar interfaces intuitivas e dinâmicas, elevando a experiência do usuário.<br>

            Meu entusiasmo vai além do código; abraço desafios com um sorriso, sempre em busca de aprimorar minhas habilidades e explorar novos horizontes tecnológicos. Meu comprometimento com a excelência me impulsiona a seguir as últimas tendências e melhores práticas, garantindo que meus projetos não apenas atendam, mas superem as expectativas.<br></P>
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
            <h3><i class="fa-brands fa-css3-alt"></i></h3>
            <h4>CSS3</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias tempora praesentium ex veniam voluptate expedita consequatur temporibus eos maxime,
                voluptatum architecto inventore quaerat laborum dicta! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, a! Lorem, ipsum dolor sit amet
                consectetur adipisicing elit. Quod, reprehenderit.</p>
        </div><!--box-especialidades-->
        <div class="box-especialidades w33 left">
            <h3><i class="fa-brands fa-html5"></i></h3>
            <h4>HTML5</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias tempora praesentium ex veniam voluptate expedita consequatur temporibus eos maxime,
                voluptatum architecto inventore quaerat laborum dicta! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, a! Lorem, ipsum dolor sit amet
                consectetur adipisicing elit. Quod, reprehenderit.</p>
        </div><!--box-especialidades-->
        <div class="box-especialidades w33 left">
            <h3><i class="fa-brands fa-js"></i></h3>
            <h4>JavaScript</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias tempora praesentium ex veniam voluptate expedita consequatur temporibus eos maxime,
                voluptatum architecto inventore quaerat laborum dicta! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, a! Lorem, ipsum dolor sit amet
                consectetur adipisicing elit. Quod, reprehenderit.</p>
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
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque magnam quasi qui dolor atque. Sit, officiis. Assumenda rerum, at voluptatum aspernatur maxime magni reiciendis eos debitis
                        suscipit totam voluptas eligendi nisi, amet qui et doloribus? Corporis molestiae numquam eum iste?</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque magnam quasi qui dolor atque. Sit, officiis. Assumenda rerum, at voluptatum aspernatur maxime magni reiciendis eos debitis
                        suscipit totam voluptas eligendi nisi, amet qui et doloribus? Corporis molestiae numquam eum iste?</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque magnam quasi qui dolor atque. Sit, officiis. Assumenda rerum, at voluptatum aspernatur maxime magni reiciendis eos debitis
                        suscipit totam voluptas eligendi nisi, amet qui et doloribus? Corporis molestiae numquam eum iste?</li>
                </ul>
            </div><!--servicos-->
        </div><!--w50-->
        <div class="clear"></div>
    </div><!--center-->
</section><!--extras-->