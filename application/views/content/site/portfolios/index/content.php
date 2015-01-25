<div class='top'>
  <div class='t'>PORTFOLIO</div>
</div>

<div class='paginations'>
<?php echo $pagination;?>
</div>

<div class='units'>
<?php
  if ($portfolios) {
    foreach ($portfolios as $portfolio) { ?>
      <div class='unit' data-tag="<?php echo $portfolio->tag ? $portfolio->tag->name : '';?>">
        <a href='<?php echo base_url (array ('portfolio', $portfolio->id));?>'>
          <img src="<?php echo $portfolio->first_pic ? $portfolio->first_pic->file_name->url ('200x200') : '';?>">
          <div class='t'><?php echo $portfolio->title;?></div>
          <div class='d'>
            <?php echo $portfolio->address;?> | <?php echo $portfolio->level;?>坪
          </div>
        </a>
      </div>
<?php
    }
  } ?>
</div>