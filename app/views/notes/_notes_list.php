<? if(isset($notes) && count($notes) > 0){ ?>
  <? foreach($notes as $note ){ ?>
    <div class="panel panel-default">
      <div class="btn-group pull-right clearfix">
        <a href="/notes/show?note=<?= $note->id ?>" class="btn btn-sm btn-default">
          <i class="fa fa-search-plus fa-fw"></i> Visualizza
        </a>
        <? if(user_signed_in() && ($note->user_id==current_user()->id || current_user()->is_admin())){ ?>
          <a href="/notes/edit?note=<?= $note->id ?>" class="btn btn-sm btn-default">
            <i class="fa fa-edit fa-fw"></i> Modifica
          </a>
          <a href="/notes/delete?note=<?= $note->id ?>" class="btn btn-sm btn-default"
            onclick="return confirm('Sei sicuro di voler cancellare gli appunti selezionati?');">
            <i class="fa fa-trash-o fa-fw"></i> Cancella
          </a>
        <? } ?>
      </div>
      <div class="panel-heading">
        <strong><?= $note->name ?> (<?= $note->code ?>)</strong> - [<?= $note->date ?> - <?= $note->classroom ?>]
      </div>
      <div class="panel-body">
        <? $content = strip_tags($note->content) ?>
        <?= substr($content,0,500) ?> <?= strlen($content) > 500 ? '...' : '' ?>
      </div>
      <table class="table table-bordered panel-footer">
        <tr class="small">
          <td class="col-xs-4 small">
            Aggiunto da: 
            <span class="text-primary small">
              <?= $note->username ?>
            </span>
          </td>
          <td class="col-xs-4 small">
            Aggiunto il:
            <span class="text-primary small">
              <?= date('Y-m-d H:i:s',strtotime($note->created_at)) ?>
            </span>
          </td>
          <td class="col-xs-4 small">
            Ultima Modifica:
            <span class="text-primary small">
              <?= date('Y-m-d H:i:s',strtotime($note->updated_at)) ?>
            </span>
          </td>
        </tr>
      </table>
    </div>
  <? } ?>
<? }else{ ?>
  <h3>
    <strong>
      <span class="text-danger">
        Nessun appunto trovato!
      </span>
    </strong>
  </h3>
<? } ?>