
<form class="form-horizontal" role="form" action="/courses/<?= $action ?>" method="POST">
  <div class="form-group">
    <label class="col-sm-3 control-label">Codice Corso:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control input-sm" name="code" placeholder="Codice Corso">
      <span class="help-block">
        <p class="text-info">
          Inserire qui il codice univoco del corso che si desidera creare, da usare come identificativo del corso.
        </p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Nome Corso:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control input-sm" name="name" placeholder="Nome Corso">
      <span class="help-block">
        <p class="text-info">Inserire qui il nome descrittivo del corso.</p>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Nome Docente:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control input-sm" name="professor" placeholder="Nome Docente">
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