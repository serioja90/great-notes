<div id="messages">
  <?php if(!errors_empty()){ ?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php
        foreach(get_errors() as $msg){
          echo $msg.'<br>';
        }
      ?>
    </div>
  <?php } ?>

  <?php if(!notice_empty()){ ?>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php
        foreach(get_notice() as $msg){
          echo $msg.'<br>';
        }
      ?>
    </div>
  <?php } ?>
</div>
<?php
  reset_errors();
  reset_notice();
?>
