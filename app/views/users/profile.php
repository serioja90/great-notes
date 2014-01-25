<div class="container">
  <div class="page-header">
    <h2>Profilo Utente <small><?= $user->username ?></small></h2>
  </div>
  <dl class="dl-horizontal">
    <dt>Ruolo:</dt>
    <dd><?= $role->role ?></dd>
    <dt>Username:</dt>
    <dd><?= $user->username ?></dd>
    <dt>Email:</dt>
    <dd><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></dd>
    <dt>Appunti Aggiunti:</dt>
    <dd><?= count($notes) ?></dd>
  </dl>
</div>