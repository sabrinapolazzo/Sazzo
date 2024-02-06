<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {

            if (Painel::insert($_POST)) {
                Painel::alertUpdate('success', 'O cadastro do serviço foi feito com sucesso!');
            } else {
                Painel::alertUpdate('erro', 'Campos vazios não são permitidos');
            }
        }


        ?>
        <h6 class="mb-3"><i class="fa-regular fa-clipboard"></i> Cadastrar Servicos</h6>
        <div class="mb-3">
            <label for="servico" class="form-label">Serviço</label>
            <textarea id="servico" name="testimonial" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="mt-3 flex justify-content-center">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="name_table" value="tb_site.servicos">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Cadastrar!">
        </div>
    </div>
</form>