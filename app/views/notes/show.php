<div class="container">
  <div class="page-header">
    <h2>
      Visualizzazione Appunti
      <small>
        <?= $course->name ?> (<?= $course->code ?>) - [<?= $lesson->date ?> - <?= $lesson->classroom ?>]
      </small>
    </h2>
  </div>
  <?php require_once('app/views/shared/_notifications.php') ?>
  <a href="/notes/index" type="button" class="btn btn-sm btn-default">
    <i class="fa fa-arrow-circle-left fa-fw"></i> Torna agli Appunti
  </a>
  <hr />
  <?= $note->content ?>
  <div class="clearfix"></div>
  <hr />
  <a href="/notes/index" type="button" class="btn btn-sm btn-default">
    <i class="fa fa-arrow-circle-left fa-fw"></i> Torna agli Appunti
  </a>
</div>