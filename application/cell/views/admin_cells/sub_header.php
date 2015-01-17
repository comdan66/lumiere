<header class="grid col-full">
  <hr>
<?php
  if (identity ()->user ()) { ?>
    <p class="fleft">台灣嗅覺香氛行銷協會</p>
    <strong>
      <a href="<?php echo base_url (array ('admin', 'login'));?>" class="alignright">SMA(<?php echo identity ()->user ()->account;?>)</a>
    </strong>
<?php
  } ?>
</header>