<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <?php echo isset ($meta) ? $meta:'';?>

    <title><?php echo isset ($title) ? $title : '';?></title>

<?php echo isset ($css) ? $css : '';?>

<?php echo isset ($js) ? $js : '';?>
  </head>
  <body lang="zh-tw">
    <?php echo isset ($hidden) ? $hidden : '';?>

    <div id='supersize'>
<?php if ($banners = Banner::find ('all')) {
        foreach ($banners as $banner) { ?>
          <input type='hidden' value='<?php echo $banner->file_name->url ();?>' />
  <?php }
      } ?>
    </div>
    
    <div id='container'></div>

    <div class='header'>
      <div class='container'>
        <div class='l'>
          <a href='<?php echo base_url ();?>'>
            <img src='<?php echo base_url (array ('resource', 'site', 'img', 'logo.png'));?>' />
          </a>
        </div>
        <div class='r'>
          <div class='i'><a href='<?php echo base_url (array ('services'));?>'>SERVICE</a></div>
          <div class='i'><a href='<?php echo base_url (array ('portfolios'));?>'>PORTFOLIO</a></div>
          <div class='i'><a href='<?php echo base_url (array ('products'));?>'>PRODUCT</a></div>
          <div class='i'><a href='<?php echo base_url (array ('scents'));?>'>SCENTS</a></div>
          <div class='i'><a href='<?php echo base_url (array ('abouts'));?>'>ABOUT</a></div>
        </div>
      </div>
    </div>

    <div class='footer'>
      <div class='container'>
        <div class='t'>綠迷國際有限公司</div>
        <div class='b'>
          <div class='l'>芳香治療專用精油供應 ‧ 香氣行銷專用配方香氛<span>Tel:+886-2-8773-5040</span><span>Fax:+886- 2-2711-3370</span></div>
          <div class='r'>© 2014 Lumiere International Lte.</div>
        </div>
      </div>
    </div>

  </body>
</html>