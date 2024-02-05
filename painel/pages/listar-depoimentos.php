<?php

if (isset($_GET['delete'])) {
    $idDelete = intval($_GET['delete']);
    Painel::delete('tb_site.testimonial', $idDelete);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'listar-depoimentos');
} else if (isset($_GET['order']) && isset($_GET['id'])) {
    Painel::order('tb_site.testimonial', $_GET['order'], $_GET['id']);
}

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 6;
$testimonial = Painel::selectAll('tb_site.testimonial', ($currentPage - 1) * $perPage, $perPage);

?>

<div class="metricas container bg-main-begePastel p-4 mb-3 mt-3 g-col-6">

    <h6 class="mb-3"><i class="fa fa-id-card-o"></i> Depoimentos Cadastrados</h6>
    <div class="wraper-table">
        <table class="table testimonial">
            <thead>
                <tr>
                    <th scope="col bg-main-mediumBlue">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($testimonial as $key => $value) {
                ?>
                    <tr>
                        <td></a><?php echo $value['name'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($value['date'])) ?></td>
                        <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-depoimento?id=<?php echo $value['id'] ?>" class="btn edit"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?delete=<?php echo $value['id'] ?>" class="btn delete"><i class="fa-solid fa-trash"></i></a></td>
                        <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=up&id=<?php echo $value['id'] ?>"><i class="fa-solid fa-angle-up"></i></a></td>
                        <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=down&id=<?php echo $value['id'] ?>"><i class="fa-solid fa-angle-down"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="...">
        <ul class="pagination pagination-sm justify-content-center">
            <?php
            $totalpages = ceil(count(Painel::selectAll('tb_site.testimonial')) / $perPage);

            for ($i = 1; $i <= $totalpages; $i++) {
                if ($i == $currentPage) {
                    echo ' <li class="page-item active" aria-current="page"><a class="page-link" href="' . INCLUDE_PATH_PAINEL . 'listar-depoimentos?page=' . $i . '">', $i . '</a></li>';
                } else {
                    echo ' <li class="page-item"><a class="page-link" href="' . INCLUDE_PATH_PAINEL . 'listar-depoimentos?page=' . $i . '">', $i . '</a></li>';
                }
            }
            ?>
        </ul>
    </nav>
</div>