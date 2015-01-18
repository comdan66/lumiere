  <div class='to'>
    <div class='tt'>PRODUCT</div>
  </div>

  <div class='back'>
    <a href='<?php echo base_url (array ('products'));?>'></a>
    <div class="fb-like" data-href="<?php echo base_url (array ('product', $product->id));?>" data-width="120" data-send="false" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
  </div>

  <div class='b'>
    <img src="<?php echo $product->file_name->url ('855x350');?>" />
  </div>

  <div class='i'>
    <div class='t'><?php echo $product->tag ? $product->tag->name : '';?></div>
    <div class='s'>
      <div class='n'><?php echo $product->title;?></div>
    </div>
  </div>

  <div class='u'>
    <div class='l'>
<?php if ($product->first_type_1_block) { ?>
        <div class='y'><?php echo $product->first_type_1_block->title;?></div>
  <?php if ($product->first_type_1_block->items) {
          foreach ($product->first_type_1_block->items as $item) { ?>
            <div class='p'>
              <div class='w'><?php echo $item->title;?></div>
              <div class='x'> </div>
              <div class='v'><?php echo $item->content;?></div>
            </div>
    <?php }
        }
      } ?>
    </div>
    <div class='r'>
<?php if ($product->blocks) {
        foreach ($product->blocks as $block) {
          if ($block->id != $product->first_type_1_block->id) {
            if ($block->type == '1') { ?>
              <div class='y'><?php echo $block->title;?></div>
        <?php if ($block->items) {
                foreach ($block->items as $item) { ?>
                  <div class='p'>
                    <div class='w'><?php echo $item->title;?></div>
                    <div class='x'> </div>
                    <div class='v'><?php echo $item->content;?></div>
                  </div>
          <?php }
              }
            } else if ($block->type == '2') {
              if ($block->items) {
                if ($item->title) { ?>
                  <div class='y'><?php echo $item->title;?></div>
          <?php }
                foreach ($block->items as $item) {?>
                  <div class='c'><?php echo $item->content;?></div>
      <?php     }
              }
            }
          }
        }
      } ?>
    </div>
  </div>
  
  <div class='q'>
<?php
    if ($product->blocks) {
      foreach ($product->blocks as $block) {
        if ($block->type == '1') { ?>
          <div class='y'><?php echo $block->title;?></div>
    <?php if ($block->items) {
            foreach ($block->items as $item) { ?>
              <div class='p'>
                <div class='w'><?php echo $item->title;?></div>
                <div class='x'> </div>
                <div class='v'><?php echo $item->content;?></div>
              </div>
      <?php }
          }
        } else if ($block->type == '2') {
          if ($block->items) {
            if ($item->title) { ?>
              <div class='y'><?php echo $item->title;?></div>
      <?php }
            foreach ($block->items as $item) {?>
              <div class='c'><?php echo $item->content;?></div>
  <?php     }
          }
        }
      }
    } ?>
  </div>
