<div class="container">
  <div class="page-header">
    <h2>Aggiunta Appunti</h2>
  </div>
  <? require_once('app/views/shared/_notifications.php') ?>
  <?
    $action = 'create';
    include("_form.php");
  ?>
</div>