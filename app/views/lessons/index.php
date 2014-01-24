<div class="container">
  <div class="page-header">
    <h2>Elenco Lezioni <small><span class="text-info">'<?= $course->name ?>'</span></small></h2>
  </div>
  <? require_once('app/views/shared/_notifications.php') ?>
  <? if(user_signed_in()){ ?>
    <a href="/courses/index" class="btn btn-sm btn-default">
      <i class="fa fa-arrow-circle-left fa-fw"></i> Torna ai Corsi
    </a>
    <a href="/lessons/new_lesson?course=<?= $course->code ?>" class="btn btn-sm btn-primary">
      <i class="fa fa-plus-circle fa-fw"></i> Aggiungi Lezione
    </a>
  <? } ?>
  <? if(count($lessons) > 0){ ?>
    <table class="table table-bordered table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th>ID</th>
          <th>Giorno</th>
          <th>Inizio</th>
          <th>Fine</th>
          <th>Aula</th>
          <th>Appunti</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        <? foreach($lessons as $lesson){ ?>
          <tr>
            <td><?= $lesson->id ?></td>
            <td><?= date("Y-m-d, l",strtotime($lesson->date)) ?></td>
            <td><?= $lesson->lesson_start ?></td>
            <td><?= $lesson->lesson_end ?></td>
            <td><?= $lesson->classroom ?></td>
            <td><span class="badge"><?= $lesson->notes ?></span></td>
            <td>
              <div class="btn-group btn-group-xs">
                <a href="/notes/index?lesson=<?= $lesson->id ?>" class="btn btn-mini btn-default">
                  <i class="fa fa-clipboard fa-fw"></i> Appunti
                </a>
                <? if(user_signed_in()){ ?>
                  <a href="/lessons/edit?course=<?= $lesson->course_code ?>&id=<?= $lesson->id ?>" class="btn btn-mini btn-default">
                    <i class="fa fa-edit fa-fw"></i> Modifica
                  </a>
                  <a href="/lessons/delete?course=<?= $lesson->course_code ?>&id=<?= $lesson->id ?>" class="btn btn-mini btn-default"
                     onclick="return confirm('Sei sicuro di voler cancellare la lezione selezionata?');">
                    <i class="fa fa-trash-o fa-fw"></i> Cancella
                  </a>
                <? } ?>
              </div>
            </td>
          </tr>
        <? } ?>
      </tbody>
    </table>
  <? }else{ ?>
    <h3><strong><span class="text-danger">Nessuna lezione trovata per il corso '<?= $course->name ?>'.</span></strong></h3>
  <? } ?>
</div>