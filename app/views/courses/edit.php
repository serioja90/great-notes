<div class="container">
  <div class="page-header">
    <h2>Modifica Corso <small><?= $course->name ?></small></h2>
  </div>
  <? require_once('app/views/shared/_notifications.php') ?>
  <?
    $action = 'update';
    include("_form.php");
  ?>
</div>