      <a href='<?php echo base_url ('abouts');?>'><div class='item'>ABOUT</div></a>
      <a href='<?php echo base_url ('cases');?>'><div class='item'>CASE STUDY</div></a>
<?php if ($tags = CaseTag::find ('all')) { ?>
        <div class='sub' data-key='cases'>  
    <?php foreach ($tags as $tag) { ?>
            <a href='<?php echo base_url ('cases');?>#<?php echo $tag->name;?>'><div class='item' data-v='<?php echo $tag->name;?>'><?php echo $tag->name;?></div></a>
   <?php  } ?>
        </div>
<?php } ?>
      <a href='<?php echo base_url ('news');?>'><div class='item'>NEWS</div></a>
      <a href='<?php echo base_url ('aromas');?>'><div class='item'>AROMA</div></a>
<?php if ($tags = AromaTag::find ('all')) { ?>
        <div class='sub' data-key='aromas'>  
    <?php foreach ($tags as $tag) { ?>
            <a href='<?php echo base_url (array ('aromas', 0, $tag->name));?>'><div class='item'><?php echo $tag->name;?></div></a>
   <?php  } ?>
        </div>
<?php } ?>
      <a href='<?php echo base_url ('contacts');?>'><div class='item'>CONTACT</div></a>