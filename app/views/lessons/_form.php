<? $params = array_merge($_GET,$_POST); ?>
<form class="form-horizontal" role="form" action="/lessons/<?= $action ?>" method="POST">
  <? if(isset($lesson)){ ?>
    <input type="hidden" name="id" value="<?= $lesson->id ?>" />
  <? } ?>
  <input type="hidden"
         name="course"
         value="<?= (isset($params['course']) ? $params['course'] : (isset($lesson) ? $lesson->course_code : '')) ?>" 
         />
  <div class="form-group">
    <label class="col-sm-3 control-label">Data Lezione:</label>
    <div class="col-sm-4">
      <div class='input-group date col-sm-5' id='date'>
        <input type='text'
               class="form-control"
               name="date"
               data-format="YYYY-MM-DD"
               value="<?= (isset($params['date']) ? $params['date'] : (isset($lesson) ? $lesson->date : '')) ?>"
               required />
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
      <div class='input-group date col-sm-5' id='lesson_start'>
        <input type='text'
               class="form-control"
               name="lesson_start"
               data-format="HH:mm"
               value="<?= (isset($params['lesson_start']) ? $params['lesson_start'] : (isset($lesson) ? $lesson->lesson_start : '')) ?>"
               required />
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
      <div class='input-group date col-sm-5' id='lesson_end'>
        <input type='text'
               class="form-control"
               name="lesson_end"
               data-format="HH:mm"
               value="<?= (isset($params['lesson_end']) ? $params['lesson_end'] : (isset($lesson) ? $lesson->lesson_end : '')) ?>"
               required />
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
      <input type='text'
             class="form-control"
             name="classroom"
             value="<?= (isset($params['classroom']) ? $params['classroom'] : (isset($lesson) ? $lesson->classroom : '')) ?>"
             required />
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
      $("#lesson_start, #lesson_end").datetimepicker({
        pickDate: false
      });
    });
  });
</script>