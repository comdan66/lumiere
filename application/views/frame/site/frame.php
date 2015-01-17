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

    <div class='slide_c'>
      <div id='right_slide' class='close'>
  <?php echo render_cell ('site_cells', 'menus');?>
      </div>
      <div id='slide_cover'></div>
    </div>
    <div id='container'>

      <div id='header' class='clearfix'>
        <a href='<?php echo base_url ();?>'>
          <div class='logo'>
            <img src='<?php echo base_url (array ('resource', 'site', 'img', 'wlogo.png'));?>'>
          </div>
        </a>

        <div class='info'>
          <img class='pc' src='<?php echo base_url (array ('resource', 'site', 'img', 'title_bg.jpg'));?>' />
          <img class='mv' src='<?php echo base_url (array ('resource', 'site', 'img', 'mtitle_bg.jpg'));?>' />
          <div class='title'><?php echo isset ($page_key) ? strtoupper ($page_key):'';?></div>
          <div class='option'>
            <img src='<?php echo base_url (array ('resource', 'site', 'img', 'menu_iocn.png'));?>'>
          </div>
        </div>
      </div>

      <div id='content'>
        <div class='footer'>
          <div class='icons clearfix'>
            <div class='icon'><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path d="M15 4.129h-2.856c-0.338 0-0.715 0.444-0.715 1.039v2.062h3.571v2.94h-3.571v8.83h-3.372v-8.829h-3.057v-2.941h3.057v-1.73c0-2.481 1.722-4.5 4.086-4.5h2.857v3.129z" fill="#444444"></path></svg></div>
            <div class='line'></div>
            <div class='icon'><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><path d="M15.996 15.457l16.004-7.539v-3.918h-32v3.906zM16.004 19.879l-16.004-7.559v15.68h32v-15.656z" fill="#444444"></path></svg></div>
          </div>
          <div class='info'>© 2014 SMA Co.,Ltd.</div>
        </div>
        <div class='slider'>
    <?php echo render_cell ('site_cells', 'menus');?>
        </div>
        <div class='content'>
    <?php echo isset ($content) ? $content : '';?>
        </div>
      </div>
    </div>
  </body>
</html>