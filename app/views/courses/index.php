<div class="container">
  <div>
    <div class="page-header">
      <h2>Elenco Corsi</h2>
    </div>
    <? require_once('app/views/shared/_notifications.php') ?>
    <? if(user_signed_in()){ ?>
      <a href="/courses/new_course" class="btn btn-sm btn-primary">
        <i class="fa fa-plus-circle fa-fw"></i> Aggiungi Corso
      </a>
    <? } ?>
    <? if(count($courses) > 0){ ?>
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Codice</th>
            <th>Nome</th>
            <th>Docente</th>
            <th>Lezioni</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($courses as $course){ ?>
            <tr>
              <td><?= $course->code ?></td>
              <td class="text-left"><?= $course->name ?></td>
              <td class="text-left"><?= $course->professor ?></td>
              <td><?= $course->lessons ?></td>
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="/lessons/index?course=<?=$course->code ?>" class="btn btn-default"><i class="fa fa-tasks fa-fw"></i> Lezioni</a>
                  <?php if(user_signed_in() && current_user()->is_admin()){ ?>
                    <a href="/courses/edit?course=<?= $course->code ?>" class="btn btn-default"><i class="fa fa-edit fa-fw"></i> Modifica</a>
                    <a  href="/courses/delete?course=<?= $course->code ?>" 
                      class="btn btn-default"
                      onclick="return confirm(
                        'Il corso \'<?= $course->code ?>\' verrà cancellato. Procedere comunque?'
                      );">
                      <i class="fa fa-trash-o fa-fw"></i> Cancella
                    </a>
                  <? } ?>
                </div>
              </td>
            </tr>
          <? } ?>
        </tbody>
      </table>
      <div class=""></div>
    <? }else{ ?>
      <h3><strong><span class="text-danger">Nessun corso trovato.</span></strong></h3>
    <? } ?>
  </div>
</div>