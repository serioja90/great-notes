<? $params = array_merge($_GET,$_POST); ?>
<form class="form-horizontal" role="form" action="/lessons/<?= $action ?>" method="POST">
  <input type="hidden" name="course" value="<?= $params['course'] ?>" />
  <div class="form-group">
    <label class="col-sm-3 control-label">Data Lezione:</label>
    <div class="col-sm-4">
      <div class='input-group date col-sm-5' id='date'>
        <input type='text' class="form-control" name="date" data-format="YYYY-MM-DD" required />
        <span class="input-group-addon">
          <span class="glyphicons glyphicons-calendar"></span>
        </span>
      </div>
      <span class="help-block">
        <p class="text-info">Selezionare la data della lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Inizio Lezione:</label>
    <div class="col-sm-4">
      <div class='input-group date col-sm-5' id='start'>
        <input type='text' class="form-control" name="start" data-format="hh:mm" required />
        <span class="input-group-addon">
          <span class="glyphicons glyphicons-calendar"></span>
        </span>
      </div>
      <span class="help-block">
        <p class="text-info">Indicare l'inizio della lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Fine Lezione:</label>
    <div class="col-sm-4">
      <div class='input-group date col-sm-5' id='end'>
        <input type='text' class="form-control" name="end" data-format="hh:mm" required />
        <span class="input-group-addon">
          <span class="glyphicons glyphicons-calendar"></span>
        </span>
      </div>
      <span class="help-block">
        <p class="text-info">Indicare la fine della lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Aula:</label>
    <div class="col-sm-4">
      <input type='text' class="form-control" name="classroom" required />
      <span class="help-block">
        <p class="text-info">Indicare l'aula dove si svolgerà la lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-actions">
    <hr>
    <div class="col-sm-offset-3">
      <a href="/lessons/index?course=<?= $params['course'] ?>" class="btn btn-default btn-sm">
        <i class="fa fa-ban fa-fw"></i> Annulla
      </a>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> Salva</a>
    </div>
  </div>
</form>

<script type="text/javascript">
  jQuery(function($){
    $(document).ready(function(){
      $("#date").datetimepicker({
        pickTime: false
      });
      $("#start, #end").datetimepicker({
        pickDate: false
      });
    });
  });
</script>