<? if(isset($notes) && count($notes) > 0){ ?>
  <? foreach($notes as $note ){ ?>
    <div class="panel panel-success">
      <div class="panel-heading">
        <strong><?= $note->name ?> (<?= $note->code ?>)</strong> - [<?= $note->date ?> - <?= $note->classroom ?>]
      </div>
      <div class="panel-body">
        <?= substr($note->content,0,100) ?>
      </div>
        <table class="table table-bordered">
          <tr>
            <td class="col-xs-4">Aggiunto da: <span class="label label-info"><?= $note->username ?></span></td>
            <td class="col-xs-4">
              Aggiunto il:
              <span class="label label-info">
                <?= date('Y-m-d H:i:s',strtotime($note->created_at)) ?>
              </span>
            </td>
            <td class="col-xs-4">
              Ultima Modifica:
              <span class="label label-info">
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