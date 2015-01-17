
<aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">
  <menu>
    <div id="wrapper">
      <ul class="menu">
        <li class="item1"><a href="#">Banner</a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'banners'));?>">Create/Update Banner</a></li>
          </ul>
        </li>

        <li class="item3"><a href="#"><span>Scents</span></a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'scents'));?>">Scent list</a></li>
            <li class="subitem2"><a href="<?php echo base_url (array ('admin', 'scents', 'tags'));?>">Scent tag</a></li>
            <li class="subitem3"><a href="<?php echo base_url (array ('admin', 'scents', 'create'));?>">Create Scent</a></li>
          </ul>
        </li>

        <li class="item3"><a href="#"><span>Products</span></a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'products'));?>">Product list</a></li>
            <li class="subitem2"><a href="<?php echo base_url (array ('admin', 'products', 'tags'));?>">Product tag</a></li>
            <li class="subitem3"><a href="<?php echo base_url (array ('admin', 'products', 'create'));?>">Create Product</a></li>
          </ul>
        </li>


        <li class="item3"><a href="#"><span>Portfolios</span></a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'portfolios'));?>">Portfolio list</a></li>
            <li class="subitem2"><a href="<?php echo base_url (array ('admin', 'portfolios', 'tags'));?>">Portfolio tag</a></li>
            <li class="subitem3"><a href="<?php echo base_url (array ('admin', 'portfolios', 'create'));?>">Create Portfolio</a></li>
          </ul>
        </li>

        <li class="item5"><a href="#">Admin</a>
          <ul>
            <li class="subitem1"><a href="/admin/edit">Update admin</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </menu>
</aside>