<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {

            if (Painel::insert($_POST)) {
                Painel::alertUpdate('success', 'O cadastro do depoimento foi feito com sucesso!');
            } else {
                Painel::alertUpdate('erro', 'Campos vazios não são permitidos');
            }
        } 


        ?>
        <h6 class="mb-3"><i class="fa fa-id-card-o"></i> Cadastrar Depoimentos</h6>
        <div class="mb-3">
            <label for="name" class="form-label">Nome da Pessoa</label>
            <input type="text" id="name" name="name" class="form-control" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="testimonial" class="form-label">Depoimento</label>
            <textarea id="testimonial" name="testimonial" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Data de atualização</label>
            <input type="date" id="date" name="date" class="form-control">
        </div>

        <div class="mt-3 flex justify-content-center">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="name_table" value="tb_site.testimonial">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Cadastrar!">
        </div>
    </div>
</form>