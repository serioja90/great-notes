<?php foreach($lessons as $item){ ?>
  <option value="<?= $item->id ?>">
    <?= date("Y-m-d, l",strtotime($item->date)) ?> (<?= $item->lesson_start ?> - <?= $item->lesson_end ?>)
  </option>
<?php } ?>
