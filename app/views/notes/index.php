<div class="container">
  <div class="page-header">
    <h2>Ultimi Appunti <small>Gli ultimi appunti aggiunti</small></h2>
  </div>
  <?php require_once('app/views/shared/_notifications.php') ?>
  <div id="edit-note"></div>
    <?php if(user_signed_in()){ ?>
      <p>
        <a href="/notes/new_note" class="btn btn-sm btn-primary">
          <i class="fa fa-plus-circle"></i> Aggiungi Appunti
        </a>
      </p>
    <?php } ?>
    <?php require_once("app/views/notes/_notes_list.php"); ?>
</div>