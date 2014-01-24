<div id="messages">
  <? if(!errors_empty()){ ?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <? 
        foreach(get_errors() as $msg){
          echo $msg.'<br>';
        } 
      ?>
    </div>
  <? } ?>

  <? if(!notice_empty()){ ?>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <? 
        foreach(get_notice() as $msg){
          echo $msg.'<br>';
        } 
      ?>
    </div>
  <? } ?>
</div>
<?
  reset_errors();
  reset_notice();
?>