<div class="container">
  <div class="page-header">
    <h2>Elenco Appunti <small>L'elenco degli appunti aggiunti</small></h2>
  </div>
  <?php require_once('app/views/shared/_notifications.php') ?>
  <div id="edit-note"></div>
    <form class="col-lg-4 pull-right clearfix" style="padding-right: 0px;" role="form" id="search-form">
      <div class="input-group">
        <input id="search-query" type="text" class="form-control" name="search_query">
        <span class="input-group-btn">
          <button id="search-button" class="btn btn-default" type="button">
            <i class="fa fa-search fa-fw"></i> Cerca
          </button>
        </span>
      </div>
    </form>
    <p>
      <? if(isset($lesson)){ ?>
        <a href="/lessons/index?course=<?= $lesson->course_code ?>" class="btn btn-sm btn-default">
          <i class="fa fa-arrow-circle-left fa-fw"></i> Torna alle Lezioni
        </a>
      <? } ?>
      <a href=""></a>
      <? if(user_signed_in()){ ?>
        <? 
          $new_note_params = "";
          if(isset($lesson)){
            $new_note_params = "lesson=".$lesson->id."&course=".$lesson->course_code;
          } 
        ?>
        <a href="/notes/new_note?<?= $new_note_params ?>" class="btn btn-sm btn-primary">
          <i class="fa fa-plus-circle"></i> Aggiungi Appunti
        </a>
      <? } ?>
      <hr />
    </p>
    <div class="clearfix"></div>
    <div id="notes-list">
      <?php require_once("app/views/notes/_notes_list.php"); ?>
    </div>
</div>

<script type="text/javascript">
  function search_notes(){
    $.ajax({
      type: "GET",
      data: {search_query: $("#search-query").val()},
      url: "/notes/search",
      success: function(result){
        $("#notes-list").html(result);
      },
      error: function(){
        error("Qualcosa è andato storto nel tentativo di eseguire la ricerca!");
      }
    });
  }

  jQuery(function($){
    $(document).ready(function(){
      $("#search-button").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        search_notes();
      });

      $("#search-query").keyup(function(){
        search_notes();
      });

      $("#search-form").submit(function(e){
        e.preventDefault();
        e.stopPropagation();
      });
    });
  });
</script>