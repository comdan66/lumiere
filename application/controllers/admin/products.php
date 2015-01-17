<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Products extends Admin_controller {
  public function __construct () {
    parent::__construct ();
    identity ()->user () || redirect (array ('admin'));
  }

  private function _delete ($ids) {
    array_map (function ($product) {
      array_map (function ($pic) {
        $pic->file_name->cleanAllFiles ();
        $pic->delete ();
      }, $product->pics);

      array_map (function ($block) {
        array_map (function ($item) {
          $item->delete ();
        }, $block->items);

        $block->delete ();
      }, $product->blocks);

      $product->delete ();
    }, Product::find ('all', array ('conditions' => array ('id IN (?)', $ids))));

    identity ()->set_session ('_flash_message', '刪除成功!', true);

    redirect (array ('admin', $this->get_class (), 'index'), 'refresh');
  }

  public function index ($offset = 0) {
    $product_tag_id = trim ($this->input_post ('product_tag_id'));

    if ($delete_ids = $this->input_post ('delete_ids'))
      $this->_delete ($delete_ids);

    $conditions = $product_tag_id ? array ('product_tag_id = ?', $product_tag_id) : array ();

    $limit = 10;
    $total = Product::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;
    $products = Product::find ('all', array ('order' => 'id DESC', 'offset' => $offset, 'limit' => $limit, 'conditions' => $conditions));

    $page_total = ceil ($total / $limit);
    $now_page = ($offset / $limit + 1);
    $next_link = $now_page < $page_total ? base_url (array ('admin', $this->get_class (), $this->get_method (), $now_page * $limit)) : '#';
    $prev_link = $now_page - 2 >= 0 ? base_url (array ('admin', $this->get_class (), $this->get_method (), ($now_page - 2) * $limit)) : '#';
    $pagination = array ('total' => $total, 'page_total' => $page_total, 'now_page' => $now_page, 'next_link' => $next_link, 'prev_link' => $prev_link);

    $this->load_view (array ('products' => $products, 'pagination' => $pagination, 'product_tag_id' => $product_tag_id));
  }

  public function tags () {
    if ($this->has_post ()) {
      if (($name = trim ($this->input_post ('name'))) && verifyCreateOrm (ProductTag::create (array ('name' => $name, 'sort' => ProductTag::count () + 1))))
        identity ()->set_session ('_flash_message', '新增成功!', true) && redirect (array ('admin', $this->get_class (), $this->get_method ()), 'refresh');

      if ($tags = $this->input_post ('tags')) {
        if ($delete_ids = array_diff (field_array (ProductTag::find ('all', array ('select' => 'id')), 'id'), array_map (function ($tag) { return $tag['id']; }, $tags))) {
          ProductTag::delete_all (array ('conditions' => array ('id IN (?)', $delete_ids)));
          Product::update_all (array ('set' => 'product_tag_id = 0', 'conditions' => array ('product_tag_id IN (?)', $delete_ids)));
        }

        array_map (function ($tag) {
          if ($tag['id'] && trim ($tag['name']) && trim ($tag['sort']))
            ProductTag::table ()->update ($set = array ('name' => trim ($tag['name']), 'sort' => trim ($tag['sort'])), array ('id' => $tag['id']));
        }, $tags);

        if (identity ()->set_session ('_flash_message', '修改成功!', true))
          redirect (array ('admin', $this->get_class (), $this->get_method ()), 'refresh');
      }
    }

    $tags = ProductTag::find ('all', array ('order' => 'sort DESC, id DESC'));
    $this->load_view (array ('tags' => $tags));
  }
  public function create () {
    if ($this->has_post ()) {
      $title       = trim ($this->input_post ('title'));
      $description = trim ($this->input_post ('description'));
      $is_enabled  = $this->input_post ('is_enabled');
      $product_tag_id = $this->input_post ('product_tag_id');

      $files       = $this->input_post ('files[]', true, true);
      $blocks      = $this->input_post ('blocks');

      if (true || ($title && $description && $files && is_numeric ($is_enabled))) {

        if (verifyCreateOrm ($product = Product::create (array ('title' => $title ? $title : '', 'description' => $description ? $description : '', 'is_enabled' => is_numeric ($is_enabled) ? $is_enabled : 1, 'product_tag_id' => $product_tag_id ? $product_tag_id : 0)))) {
          foreach ($files as $file)
            if (verifyCreateOrm ($pic = ProductPic::create (array ('product_id' => $product->id, 'file_name' => ''))))
              $pic->file_name->put ($file);

          if ($blocks)
            foreach ($blocks as $block) {
              $b = ProductBlock::create (array ('product_id' => $product->id, 'title' => $block['title'], 'type' => $block['type']));

            if (isset ($block['items']))
              foreach ($block['items'] as $item)
                ProductBlockItem::create (array ('product_block_id' => $b->id, 'title' => $item['title'], 'content' => $item['content']));
            }

          identity ()->set_session ('_flash_message', '新增成功!', true);
          redirect (array ('admin', $this->get_class ()));
        } else {
          @$product->delete ();
        }
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！'));
      }
    } else {
      $this->load_view ();
    }
  }

  public function edit ($id = 0) {
    if (!($product = Product::find ('one', array ('conditions' => array ('id = ?', $id)))))
      redirect (array ('admin', $this->get_class ()));

    if ($this->has_post ()) {
      $title       = trim ($this->input_post ('title'));
      $description = trim ($this->input_post ('description'));
      $is_enabled  = $this->input_post ('is_enabled');
      $product_tag_id = $this->input_post ('product_tag_id');

      $files       = $this->input_post ('files[]', true, true);
      $pics        = ($pics = $this->input_post ('pics')) ? $pics : array ();
      $blocks      = $this->input_post ('blocks');

      if (true || ($title && $description && ($files || $pics) && is_numeric ($is_enabled))) {

        if ($delete_pic_ids = array_diff (field_array ($product->pics, 'id'), $pics))
          array_map (function ($pic) {
            $pic->file_name->cleanAllFiles ();
            $pic->delete ();
          }, ProductPic::find ('all', array ('conditions' => array ('id IN (?) AND product_id = ?', $delete_pic_ids, $product->id))));

        array_map (function ($block) {
          array_map (function ($item) {
            $item->delete ();
          }, $block->items);

          $block->delete ();
        }, $product->blocks);

        foreach ($files as $file)
          if (verifyCreateOrm ($pic = ProductPic::create (array ('product_id' => $product->id, 'file_name' => ''))))
            $pic->file_name->put ($file);

        if ($blocks)
          foreach ($blocks as $block) {
            $b = ProductBlock::create (array ('product_id' => $product->id, 'title' => $block['title'], 'type' => $block['type']));

            if (isset ($block['items']))
              foreach ($block['items'] as $item)
                ProductBlockItem::create (array ('product_block_id' => $b->id, 'title' => $item['title'], 'content' => $item['content']));
          }

        $product->title       = $title;
        $product->description = $description;
        $product->is_enabled  = $is_enabled;
        $product->product_tag_id = $product_tag_id ? $product_tag_id : 0;
        $product->save ();

        identity ()->set_session ('_flash_message', '修改成功!', true);
        redirect (array ('admin', $this->get_class ()));
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！', 'product' => $product));
      }
    } else {
      $this->load_view (array ('product' => $product));
    }
  }
}