<div class='top'>
  <div class='t'>SCENTS</div>
</div>

<div class='paginations'>
<?php echo $pagination;?>
</div>

<div class='units'>
<?php
  if ($scents) {
    foreach ($scents as $scent) { ?>
      <div class='unit'>
        <div class='l'>
          <img src="<?php echo $scent->file_name->url ('150x150');?>" />
        </div>
        <div class='r'>
          <div class='d'>
            <div class='o'></div>
            <div class='f'><?php echo $scent->date->format ('Y.m.d');?></div>
          </div>
          <div class='t'>
            <a href="<?php echo base_url (array ('scent', $scent->id));?>"><?php echo $scent->title;?></a>
          </div>
          <div class='c'><?php echo mb_strimwidth (strip_tags ($scent->content), 0, 150, '…', 'UTF-8');?></div>
          <div class='m'><a href="<?php echo base_url (array ('scent', $scent->id));?>">>> 了解更多</a></div>
        </div>
      </div>
<?php
    }
  } ?>
</div>