<div class='top'>
  <div class='t'>PRODUCT</div>
</div>

<div class='paginations'>
<?php echo $pagination;?>
</div>

<div class='units'>
<?php
  if ($products) {
    foreach ($products as $product) { ?>
      <div class='unit' data-tag="<?php echo $product->tag ? $product->tag->name : '';?>">
        <a href='<?php echo base_url (array ('product', $product->id));?>'>
          <img src="<?php echo $product->file_name->url ('200x200');?>">
          <div class='t'><?php echo $product->title;?></div>
          <div class='d'><?php echo $product->description;?></div>
        </a>
      </div>
<?php
    }
  } ?>
</div>