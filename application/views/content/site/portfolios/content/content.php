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
    <div class='t'><?php echo $portfolio->tag ? $portfolio->tag->name : '';?></div>
    <div class='s'>
      <div class='n'><?php echo $portfolio->title;?></div>
      <div class='l'> </div>
      <div class='a'><?php echo $portfolio->address;?></div>
    </div>
  </div>

  <div class='u'>
    <div class='l'>

      <div class='y'>都復思景馬營技軍手好獎用</div>
      <div class='p'>
        <div class='w'>都復思景馬營</div>
        <div class='x'> </div>
        <div class='v'>都復思景馬</div>
      </div>
      <div class='p'>
        <div class='w'>都復思景馬營</div>
        <div class='x'> </div>
        <div class='v'>都復思景馬</div>
      </div>

    </div>
    <div class='r'>

      <div class='y'>都復思景馬營技軍手好獎用</div>
      <div class='p'>
        <div class='w'>都復思景馬營</div>
        <div class='x'> </div>
        <div class='v'>都復思景馬</div>
      </div>
      <div class='p'>
        <div class='w'>都復思景馬營</div>
        <div class='x'> </div>
        <div class='v'>都復思景馬</div>
      </div>
      <div class='c'>都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用</div>
    </div>
  </div>
  
  <div class='q'>
    <div class='y'>都復思景馬營技軍手好獎用</div>
    <div class='p'>
      <div class='w'>都復</div>
      <div class='x'> </div>
      <div class='v'>都復思</div>
    </div>
    <div class='p'>
      <div class='w'>都復思營</div>
      <div class='x'> </div>
      <div class='v'>都馬</div>
    </div>
    <div class='c'>都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用都復思景馬營技軍手好獎用</div>
  </div>
