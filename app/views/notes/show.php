<div class="container">
  <div class="page-header">
    <h2>
      Visualizzazione Appunti
      <small>
        <?= $course->name ?> (<?= $course->code ?>) - [<?= $lesson->date ?> - <?= $lesson->classroom ?>]
      </small>
    </h2>
  </div>
  <button type="button" class="btn btn-sm btn-default" onclick="history.back();"><i class="fa fa-arrow-circle-left fa-fw"></i> Torna agli Appunti</button>
  <hr />
  <?= $note->content ?>
  <hr />
  <button type="button" class="btn btn-sm btn-default" onclick="history.back();"><i class="fa fa-arrow-circle-left fa-fw"></i> Torna agli Appunti</button>
</div>