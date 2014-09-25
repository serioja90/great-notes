<?php $params = array_merge($_GET,$_POST); ?>
<form class="form-horizontal" role="form" action="/courses/<?= $action ?>" method="POST">
  <div class="form-group">
    <label class="col-sm-3 control-label">Codice Corso:</label>
    <div class="col-sm-4">
      <input type="text"
             class="form-control input-sm"
             name="code"
             placeholder="Codice Corso"
             value="<?= (isset($params['code']) ? $params['code'] : (isset($course) ? $course->code : '')) ?>"
             <?= (isset($course) ? 'readonly' : '') ?>>
      <span class="help-block">
        <p class="text-info">
          Inserire qui il codice del corso che si desidera creare, che deve essere univoco, in quanto
          verrà usato come identificativo del corso.
        </p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Nome Corso:</label>
    <div class="col-sm-4">
      <input type="text"
             class="form-control input-sm"
             name="name"
             placeholder="Nome Corso"
             value="<?= (isset($params['name']) ? $params['name'] : (isset($course) ? $course->name : '')) ?>">
      <span class="help-block">
        <p class="text-info">Inserire qui il nome descrittivo del corso.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Nome Docente:</label>
    <div class="col-sm-4">
      <input type="text"
             class="form-control input-sm"
             name="professor"
             placeholder="Nome Docente"
             value="<?= (isset($params['professor']) ? $params['professor'] : (isset($course) ? $course->professor : '')) ?>">
      <span class="help-block">
        <p class="text-info">Inserire qui il nome del docente che tiene il corso.</p>
      </span>
    </div>
  </div>
  <div class="form-actions">
    <hr>
    <div class="col-sm-offset-3">
      <a href="/courses/index" class="btn btn-default btn-sm"><i class="fa fa-ban fa-fw"></i> Annulla</a>
      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> Salva</a>
    </div>
  </div>
</form>
