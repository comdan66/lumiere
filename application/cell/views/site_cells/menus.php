  <div class='items'>
    <div class='item'><a href='<?php echo base_url (array ());?>'>HOME</a></div>
    <div class='item'><a href='<?php echo base_url (array ('abouts'));?>'>ABOUT</a></div>
    <div class='item'><a href='<?php echo base_url (array ('scents'));?>'>SCENTS</a></div>
<?php if ($tags = ScentTag::find ('all')) { ?>
        <div class='sub' data-key='scents'>
    <?php foreach ($tags as $tag) { ?>
            <div class='item'><a href='<?php echo base_url ('scents');?>#<?php echo $tag->name;?>'><?php echo $tag->name;?></a></div>
   <?php  } ?>
        </div>
<?php } ?>
    <div class='item'><a href='<?php echo base_url (array ('products'));?>'>PRODUCT</a></div>
<?php if ($tags = ProductTag::find ('all')) { ?>
        <div class='sub' data-key='products'>
    <?php foreach ($tags as $tag) { ?>
            <div class='item'><a href='<?php echo base_url ('products');?>#<?php echo $tag->name;?>'><?php echo $tag->name;?></a></div>
   <?php  } ?>
        </div>
<?php } ?>
    <div class='item'><a href='<?php echo base_url (array ('portfolios'));?>'>PORTFOLIO</a></div>
<?php if ($tags = PortfolioTag::find ('all')) { ?>
        <div class='sub' data-key='portfolios'>
    <?php foreach ($tags as $tag) { ?>
            <div class='item'><a href='<?php echo base_url ('portfolios');?>#<?php echo $tag->name;?>'><?php echo $tag->name;?></a></div>
   <?php  } ?>
        </div>
<?php } ?>
    <div class='item'><a href='<?php echo base_url (array ('services'));?>'>SERVICE</a></div>
  </div>