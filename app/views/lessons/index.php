<div class="container">
  <div class="page-header">
    <h2>Elenco Lezioni <small><span class="text-info">'<?= $course->name ?>'</span></small></h2>
  </div>
  <? if(user_signed_in()){ ?>
    <a href="/courses/index" class="btn btn-sm btn-default">
      <i class="fa fa-arrow-circle-left fa-fw"></i> Torna ai Corsi
    </a>
    <a href="/lessons/new_lesson?course=<?= $course->code ?>" class="btn btn-sm btn-primary">
      <i class="fa fa-plus-circle fa-fw"></i> Aggiungi Lezione
    </a>
  <? } ?>
  <? if(count($lessons) > 0){ ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Giorno</th>
          <th>Inizio</th>
          <th>Fine</th>
          <th>Aula</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  <? }else{ ?>
    <h3><strong><span class="text-danger">Nessuna lezione trovata per il corso '<?= $course->name ?>'.</span></strong></h3>
  <? } ?>
</div>