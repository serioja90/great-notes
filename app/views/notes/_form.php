<? $params = array_merge($_GET,$_POST); ?>
<form class="form-horizontal" role="form" action="/notes/<?= $action ?>" method="POST">
  <input type="hidden" name="note" value="<?= isset($note) ? $note->id : '' ?>" />
  <div class="form-group">
    <label class="control-label col-sm-2">Corso:</label>
    <div class="controls col-sm-10">
      <select id="courses-list" name="course" class="form-control" required>
        <? foreach ($courses as $course) { ?>
          <option value="<?= $course->code ?>" 
            <? if(isset($params['course'])){ ?>
              <?= $params['course'] == (string)($course->code) ? 'selected' : '' ?>
            <? } else if (isset($lesson)){ ?>
              <?= $lesson->course_code == (string)($course->code) ? 'selected' : '' ?>
            <? } ?>
          >
            <?= $course->name ?> (<?= $course->code ?>)
          </option>
        <? } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Lezione:</label>
    <div class="controls col-sm-10">
      <select id="lessons-list" name="lesson" class="form-control" required>
        <? foreach ($lessons as $lesson) { ?>
          <option value="<?= $lesson->id ?>"
            <? if(isset($params['lesson'])){ ?>
              <?= $params['lesson'] == (string)($lesson->id) ? 'selected' : '' ?>
            <? } else if (isset($note)){ ?>
              <?= $note->lesson_id == (string)($lesson->id) ? 'selected' : '' ?>
            <? } ?>
          >
            <?= date("Y-m-d, l",strtotime($lesson->date)) ?> (<?= $lesson->lesson_start ?> - <?= $lesson->lesson_end ?>)
          </option>
        <? } ?>
      </select>
    </div>
  </div>
  <? $content = (isset($params['content']) ? $params['content'] : (isset($note) ? $note->content : '')) ?>
  <textarea id="content" name="content" rows="15"><?= $content ?></textarea>
  <div class="form-actions">
    <hr>
    <div class="text-right">
      <a href="/notes/index" class="btn btn-default btn-sm">
        <i class="fa fa-ban fa-fw"></i> Annulla
      </a>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> Salva</a>
    </div>
  </div>
</form>

<script type="text/javascript">
  jQuery(function($){
    $(document).ready(function(){
      tinymce.init({
        selector:'#content',
        language: 'it',
        statusbar: true,
        plugins : 'advlist autolink autosave charmap code fullscreen hr image link lists pagebreak print preview searchreplace table textcolor wordcount',
        pagebreak_separator: "<!-- my page break -->",
        tools: "inserttable"
      });

      $("#courses-list").change(function(){
        $.ajax({
          type: "GET",
          data: {course: $("#courses-list option:selected").val()},
          url: "/notes/refresh_lessons",
          success: function(response){
            $("#lessons-list").html(response);
          },
          error: function(){
            error("Qualcosa è andato storto al tentativo di aggiornare la lista delle lezioni!");
          }
        });
      });
    });
  });
</script>