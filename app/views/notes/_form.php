<? $params = array_merge($_GET,$_POST); ?>
<form class="form-horizontal" role="form" action="/lessons/<?= $action ?>" method="POST">
  <div class="form-group"></div>
  <textarea id="content" rows="15"></textarea>
</form>


<script type="text/javascript">
  tinymce.init({
    selector:'#content',
    language: 'it',
    statusbar: true,
    plugins : 'advlist autolink autosave charmap code fullscreen hr image link lists pagebreak print preview searchreplace table textcolor wordcount',
    pagebreak_separator: "<!-- my page break -->",
    tools: "inserttable"
  });
</script>