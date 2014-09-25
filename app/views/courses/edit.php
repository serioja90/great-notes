<div class="container">
  <div class="page-header">
    <h2>Modifica Corso <small><?= $course->name ?></small></h2>
  </div>
  <?php require_once('app/views/shared/_notifications.php') ?>
  <?php
    $action = 'update';
    include("_form.php");
  ?>
</div>
