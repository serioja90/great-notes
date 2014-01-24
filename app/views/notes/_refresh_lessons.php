<? $params = array_merge($_GET,$_POST); ?>
<? foreach($lessons as $item){ ?>
  <option value="<?= $item->id ?>">
    <?= $item->date ?> (<?= $item->lesson_start ?> - <?= $item->lesson_end ?>)
  </option>
<? } ?>