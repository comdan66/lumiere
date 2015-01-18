<div class='to'>
  <div class='tt'>PRODUCT</div>
</div>

<div class='t'>
  <div class='l'><?php echo $scent->title;?></div>
  <div class='r'>
    <div class='f'><?php echo $scent->date->format ('Y年m月d日更新');?></div>
    <div class='o'></div>
  </div>
</div>

<div class='tm'>
  <div class='e'>
    <div class='o'></div>
    <div class='f'><?php echo $scent->date->format ('Y.m.d');?></div>
  </div>
  <div class='s'>
    <div class='l'><?php echo $scent->title;?></div>
    <div class='r'>
      <div class="fb-like" data-href="<?php echo base_url (array ('scent', $scent->id));?>" data-width="120" data-send="false" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
  </div>
</div>

<div class='m'>
  <?php
  if ($scent->blocks) {
    foreach ($scent->blocks as $block) {
      if ($block->type == 'file_name') {?>
        <div class='i'><img src="<?php echo $block->file_name->url ();?>"></div>
  <?php
      } else if ($block->type == 'title') { ?>
        <div class='tt'><?php echo $block->title;?></div>
  <?php
      } else if ($block->type == 'content') { ?>
        <div class='cc'><?php echo $block->content;?></div>
  <?php
      } else if ($block->type == 'youtube') { ?>
        <div class='i'>
          <iframe src="http://www.youtube.com/embed/<?php echo $block->youtube;?>?&showinfo=1&autohide=1&autoplay=0" frameborder="0" allowfullscreen width="800" height="450"></iframe>
        </div>
  <?php
      }
    }
  } ?>
</div>
<div class='b'>
  <div class='u back'><a href='<?php echo base_url (array ('scents'));?>'></a></div>
  <div class='u'>
    <div class="fb-like" data-href="<?php echo base_url (array ('scent', $scent->id));?>" data-width="120" data-send="false" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
  </div>
</div>