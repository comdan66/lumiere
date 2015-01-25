  <div class='top'>
    <div class='t'>PORTFOLIO</div>
  </div>
  <div class='back'>
    <a href='<?php echo base_url (array ('portfolios'));?>'></a>
    <div class="fb-like" data-href="<?php echo base_url (array ('portfolio', $portfolio->id));?>" data-width="120" data-send="false" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
  </div>

  <div id='m_prophotobox'>
      <div class="bs-example">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators hidden-xs">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>

          <div class="carousel-inner">
      <?php if ($portfolio->pics) {
              foreach ($portfolio->pics as $i => $pic) { ?>
                <div class="item<?php echo !$i ? ' active' : '';?>">
                  <img src="<?php echo $pic->file_name->url ('855x575');?>" width="100%">
                </div>
        <?php }
            }?>
          </div>

          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left hidden-xs"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right hidden-xs"></span>
          </a>
        </div>
      </div>
  </div>

  <div id="prophotobox">
    <img src="" width="100%" id="BIG">
    <div id="SMALL" class='clearfix'>
<?php if ($portfolio->pics) {
        foreach ($portfolio->pics as $i => $pic) { ?>
          <img src="<?php echo $pic->file_name->url ('64x64');?>" data-url="<?php echo $pic->file_name->url ('855x575');?>" width="100%" />
        <?php }
      }?>
    </div>
  </div>

  <div class='i'>
<?php
    if ($portfolio->tag) { ?>
      <div class='t'><?php echo $portfolio->tag->name;?></div>  
<?php
    } ?>
    <div class='s'>
      <div class='n'><?php echo $portfolio->title;?></div>
      <div class='l'> </div>
      <div class='a'><?php echo $portfolio->address;?></div>
    </div>
  </div>

  <div class='u'>
    <div class='l'>
<?php if ($portfolio->first_type_1_block) { ?>
        <div class='y'><?php echo $portfolio->first_type_1_block->title;?></div>
  <?php if ($portfolio->first_type_1_block->items) {
          foreach ($portfolio->first_type_1_block->items as $item) { ?>
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
<?php if ($portfolio->blocks) {
        foreach ($portfolio->blocks as $block) {
          if ($block->id != $portfolio->first_type_1_block->id) {
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
    if ($portfolio->blocks) {
      foreach ($portfolio->blocks as $block) {
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