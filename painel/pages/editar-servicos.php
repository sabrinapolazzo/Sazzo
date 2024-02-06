<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $servicos = Painel::select('tb_site.servicos', 'id=?', array($id));
} else {
    Painel::alertUpdate('erro', 'Você precisa passar o parametro ID');
    die();
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="metricas container text-left bg-main-begePastel p-4 p-4 mb-3 mt-3">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            if (Painel::update($_POST)) {
                Painel::alertUpdate('success', 'A edição do serviço foi feita com sucesso!');
                $servicos = Painel::select('tb_site.servicos', 'id=?', array($id));
            } else {
                Painel::alertUpdate('erro', 'Campos vazios não são permitidos.');
            }
        }

        ?>
        <h6 class="mb-3"><i class="fa fa-pen-to-square"></i> Editar Serviços</h6>

        <div class="mb-3">
            <label for="servico" class="form-label">Serviço</label>
            <textarea id="servico" name="servico" class="form-control" cols="30" rows="10"><?php echo $servicos['servico'] ?></textarea>
        </div>

        <div class="mt-3 flex justify-content-center">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="name_table" value="tb_site.servicos">
            <input class="form-control w-25 bg-primary-color text-light text-center" name="acao" type="submit" value="Atualizar!">
        </div>
    </div>
</form>