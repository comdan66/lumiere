
<aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">
  <menu>
    <div id="wrapper">
      <ul class="menu">
        <li class="item1"><a href="#">Banner</a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'banners'));?>">Create/Update Banner</a></li>
          </ul>
        </li>

        <li class="item3"><a href="#"><span>Case</span></a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'cases'));?>">Case list</a></li>
            <li class="subitem2"><a href="<?php echo base_url (array ('admin', 'cases', 'tags'));?>">Case tag</a></li>
            <li class="subitem3"><a href="<?php echo base_url (array ('admin', 'cases', 'create'));?>">Create Case</a></li>
          </ul>
        </li>

        <li class="item3"><a href="#"><span>Aroma</span></a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'aromas'));?>">Case list</a></li>
            <li class="subitem2"><a href="<?php echo base_url (array ('admin', 'aromas', 'tags'));?>">Case tag</a></li>
            <li class="subitem3"><a href="<?php echo base_url (array ('admin', 'aromas', 'create'));?>">Create Case</a></li>
          </ul>
        </li>

        <li class="item3"><a href="#"><span>News</span></a>
          <ul>
            <li class="subitem1"><a href="<?php echo base_url (array ('admin', 'news'));?>">News list</a></li>
            <li class="subitem2"><a href="<?php echo base_url (array ('admin', 'news', 'create'));?>">Create News</a></li>
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