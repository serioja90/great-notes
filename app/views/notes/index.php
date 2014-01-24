<div class="container">
  <div class="page-header">
    <h2>Elenco Appunti <small>L'elenco degli appunti aggiunti</small></h2>
  </div>
  <?php require_once('app/views/shared/_notifications.php') ?>
  <div id="edit-note"></div>
    <p>
      <? if(isset($lesson)){ ?>
        <a href="/lessons/index?course=<?= $lesson->course_code ?>" class="btn btn-sm btn-default">
          <i class="fa fa-arrow-circle-left fa-fw"></i> Torna alle Lezioni
        </a>
      <? } ?>
      <a href=""></a>
      <?php if(user_signed_in()){ ?>
        <? 
          $new_note_params = "";
          if(isset($lesson)){
            $new_note_params = "lesson=".$lesson->id."&course=".$lesson->course_code;
          } 
        ?>
        <a href="/notes/new_note?<?= $new_note_params ?>" class="btn btn-sm btn-primary">
          <i class="fa fa-plus-circle"></i> Aggiungi Appunti
        </a>
      <?php } ?>
    </p>
    <?php require_once("app/views/notes/_notes_list.php"); ?>
</div>