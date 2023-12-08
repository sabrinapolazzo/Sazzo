<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="desenvolvedora,site,desenvolvimento de sites,js,css,html">
    <meta name="description" content="Desenvolvemos sites dinâmicos conforme a sua necessidade">
    <script src="https://kit.fontawesome.com/82a94bfb1a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Projeto 01</title>
</head>

<body>

    <header>
        <div class="center">
            <div class="logo left">L O G O M A R C A</div><!--logo-->
            <nav class="desktop rigth">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">SOBRE</a></li>
                    <li><a href="#">SERVIÇOS</a></li>
                    <li><a href="#">CONTATO</a></li>
                </ul>
            </nav>
            <nav class="mobile rigth">
                <div class="icone-menu-mobile"><i style="color:white;" class="fa-solid fa-bars"></i></div>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">SOBRE</a></li>
                    <li><a href="#">SERVIÇOS</a></li>
                    <li><a href="#">CONTATO</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>

    <section class="banner-principal">
        <div class="overlay"></div>
        <div class="center">
            <form action="">
                <h2>Qual o seu melhor E-mail?</h2>
                <input type="email" name="e-mail" required>
                <input type="submit" name="acao" value="Cadastrar!">
            </form>
        </div><!--center-->
    </section><!--banner principal-->

    <section class="descricao-autor center">
        <div class="w50 flex">
            <h2>Sabrina C. Polazzo</h2>
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, obcaecati quibusdam repellat voluptates necessitatibus adipisci
                perferendis corrupti reiciendis eius, molestias, unde officiis sed odit maxime tempora magni id modi numquam! Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Debitis in inventore nam blanditiis nobis unde vel molestias ipsam placeat officiis minus, cupiditate recusandae. Sequi commodi laboriosam fuga rem, perferendis consequuntur.</P>
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, obcaecati quibusdam repellat voluptates necessitatibus adipisci
                perferendis corrupti reiciendis eius, molestias, unde officiis sed odit maxime tempora magni id modi numquam! Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Debitis in inventore nam blanditiis nobis unde vel molestias ipsam placeat officiis minus, cupiditate recusandae. Sequi commodi laboriosam fuga rem, perferendis consequuntur.</P>
        </div><!--w50-->
        <div class="w50 flex">
            <img class="rigth" src="imagens\imagem-autor.jpg" alt="Imagem Autor">
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
            <div class="w50 left depoimentos-container">
                    <h2 class="title">Depoimentos dos nossos clientes</h2>
                    <div class="depoimentos-single">
                        <p class="depoimento-descricao">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, nobis blanditiis alias exercitationem molestias aspernatur temporibus a voluptate cupiditate sequi
                            dicta quos ducimus quas explicabo ratione consequatur quis rem culpa? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, dolorem at! Aperiam numquam
                            libero aut laboriosam iste autem nemo itaque porro ducimus eos. Ratione voluptatem ea quisquam possimus, eaque molestiae."</p>
                        <p class="nome-autor">Lorem Ipsum</p>
                    </div><!--depoimentos-singles-->
                    <div class="depoimentos-single">
                        <p class="depoimento-descricao">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, nobis blanditiis alias exercitationem molestias aspernatur temporibus a voluptate cupiditate sequi
                            dicta quos ducimus quas explicabo ratione consequatur quis rem culpa? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, dolorem at! Aperiam numquam
                            libero aut laboriosam iste autem nemo itaque porro ducimus eos. Ratione voluptatem ea quisquam possimus, eaque molestiae."</p>
                        <p class="nome-autor">Lorem Ipsum</p>
                    </div><!--depoimentos-singles-->
                    <div class="depoimentos-singls">
                        <p class="depoimento-descricao">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, nobis blanditiis alias exercitationem molestias aspernatur temporibus a voluptate cupiditate sequi
                            dicta quos ducimus quas explicabo ratione consequatur quis rem culpa? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, dolorem at! Aperiam numquam
                            libero aut laboriosam iste autem nemo itaque porro ducimus eos. Ratione voluptatem ea quisquam possimus, eaque molestiae."</p>
                        <p class="nome-autor">Lorem Ipsum</p>
                    </div><!--depoimentos-singles-->
                </div><!--w50-->
                <div class="w50 left servicos-container">
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

    <footer>
        <div class="center">
            <p>Todos os direitos reservados ©</p>
        </div><!--center-->
    </footer>
</body>

</html>