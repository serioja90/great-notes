<? $params = array_merge($_GET,$_POST); ?>
<form class="form-horizontal" role="form" action="/lessons/<?= $action ?>" method="POST">
  <input type="hidden" name="course" value="<?= $params['course'] ?>" />
  <div class="form-group">
    <label class="col-sm-3 control-label">Data:</label>
    <div class="col-sm-4">
      <div class="input-group col-sm-5" data-datepicker="true">
        <input name="date" type="text" class="form-control" readonly required/>
        <a class="input-group-addon btn btn-sm btn-default"><i class="fa fa-calendar fa-fw"></i></a>
      </div>
      <span class="help-block">
        <p class="text-info">Selezionare la data della lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Inizio:</label>
    <div class="col-sm-4">
      <span class="help-block">
        <p class="text-info">Indicare l'inizio della lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Fine:</label>
    <div class="col-sm-4">
      <span class="help-block">
        <p class="text-info">Indicare la fine della lezione.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Aula:</label>
    <div class="col-sm-4">
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
      // $('*[data-datepicker="true"] input[type="text"]').datepicker({
      //   format: "yyyy-mm-dd",
      //   todayBtn: true,
      //   orientation: "top left",
      //   autoclose: true,
      //   todayHighlight: true
      // });
      // $(document).on('touch click', '*[data-datepicker="true"] .input-group-addon', function(e){
      //   $('input[type="text"]', $(this).parent()).focus();
      // });

    });
  });
</script>

<div class='well'>
    <div class="form-group">
        <div class='input-group date' id='datetimepicker2'>
            <input type='text' class="form-control" />
            <span class="input-group-addon"><span class="glyphicons glyphicons-calendar"></span>
            </span>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker();
    });
</script>