<?php 
  $usuariosOnline = Painel::listarUsuariosOnline();
  $visitasTotais = Site::PegaVisitasTotais();
  $visitasHoje = Site::PegaVisitasHoje()
?>

<div class="metricas container text-center bg-main-begePastel p-4 mb-3 mt-3">
    <h6 class="mb-3"><i class="fa fa-home"></i> Painel de controle - <?php echo NOME_EMPRESA ?></h6>
    <div class="metricas row">
        <div class="col online bg-main-lightBlue">
            <h6>Usuários Online</h6>
            <p><?php echo count($usuariosOnline);?></p>
        </div>
        <div class="col visits-total bg-main-mediumBlue">
            <h6>Total de Visitas</h6>
            <p><?php echo $visitasTotais ?></p>
        </div>
        <div class="col todays-visits bg-main-DeepBlue">
            <h6>Visitas Hoje</h6>
            <p><?php echo $visitasHoje ?></p>
        </div>
    </div>
</div><!--box-metricas-->

<div class="metricas container text-center bg-main-begePastel p-4 mb-3 mt-3">

<h6 class="mb-3"><i class="fa fa-rocket"></i> Usuários Online</h6>

<table class="table">
  <thead>
    <tr>
      <th scope="col bg-main-mediumBlue">Endereço IP</th>
      <th scope="col">Última Ação</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach ($usuariosOnline as $key => $value) {
?>
    <tr>
      <td><?php echo $value['ip']?></td>
      <td><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']))?></td>
    </tr>
    <?php }?>
  </tbody>
</table>

</div>