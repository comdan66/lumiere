<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo isset ($meta) ? $meta:'';?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta property="fb:admins" content="100000100541088" />
    <meta property="fb:app_id" content="330210770498177" />

    <title><?php echo isset ($title) ? $title : '';?></title>

<?php echo isset ($css) ? $css : '';?>

<?php echo isset ($js) ? $js : '';?>

  </head>
  <body lang="zh-tw">
    <?php echo isset ($hidden) ? $hidden : '';?>
    
    <div id='container'>
      <div class='header'>
        <div class='logo'>
          <a href='<?php echo base_url ();?>'>
            <img src='<?php echo base_url (array ('resource', 'site', 'img', 'p_logo.png'));?>' />
          </a>
        </div>
        <div class='title'><?php echo isset ($page_title) ? $page_title : '';?></div>
        <div class='option'>
          <img src='<?php echo base_url (array ('resource', 'site', 'img', 'menu_iocn.png'));?>' />
        </div>
      </div>
      <div id='right_slide' class='close'>
  <?php echo render_cell ('site_cells', 'menus');?>
      </div>
      <div id='slide_cover'></div>

      <div class='slider'>
        <div class='logo'>
          <a href='<?php echo base_url ();?>'>
            <img src='<?php echo base_url (array ('resource', 'site', 'img', 'plogo.png'));?>' />
          </a>
        </div>
  <?php echo render_cell ('site_cells', 'menus');?>
        
        <div class='footer hide'>
          <div class='t'>
            <div class='icon'>
              <a href="mailto:aroma@lumiere.tw"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><path d="M15.996 15.457l16.004-7.539v-3.918h-32v3.906zM16.004 19.879l-16.004-7.559v15.68h32v-15.656z" fill="#444444"></path></svg></a>
            </div>
          </div>
          <div class='b'>
            © 2014 Lumiere International Lte.
          </div>
        </div>
      </div>

      <div class='content'>
  <?php echo isset ($content) ? $content : '';?>
      </div>
    </div>

  </body>
</html>