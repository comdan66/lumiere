<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Portfolios extends Admin_controller {
  public function __construct () {
    parent::__construct ();
    identity ()->user () || redirect (array ('admin'));
  }

  private function _delete ($ids) {
    array_map (function ($portfolio) {
      array_map (function ($pic) {
        $pic->file_name->cleanAllFiles ();
        $pic->delete ();
      }, $portfolio->pics);

      array_map (function ($block) {
        array_map (function ($item) {
          $item->delete ();
        }, $block->items);

        $block->delete ();
      }, $portfolio->blocks);

      $portfolio->delete ();
    }, Portfolio::find ('all', array ('conditions' => array ('id IN (?)', $ids))));

    identity ()->set_session ('_flash_message', '刪除成功!', true);

    redirect (array ('admin', $this->get_class (), 'index'), 'refresh');
  }

  public function index ($offset = 0) {
    $portfolio_tag_id = trim ($this->input_post ('portfolio_tag_id'));

    if ($delete_ids = $this->input_post ('delete_ids'))
      $this->_delete ($delete_ids);

    $conditions = $portfolio_tag_id ? array ('portfolio_tag_id = ?', $portfolio_tag_id) : array ();

    $limit = 10;
    $total = Portfolio::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;
    $portfolios = Portfolio::find ('all', array ('order' => 'id DESC', 'offset' => $offset, 'limit' => $limit, 'conditions' => $conditions));

    $page_total = ceil ($total / $limit);
    $now_page = ($offset / $limit + 1);
    $next_link = $now_page < $page_total ? base_url (array ('admin', $this->get_class (), $this->get_method (), $now_page * $limit)) : '#';
    $prev_link = $now_page - 2 >= 0 ? base_url (array ('admin', $this->get_class (), $this->get_method (), ($now_page - 2) * $limit)) : '#';
    $pagination = array ('total' => $total, 'page_total' => $page_total, 'now_page' => $now_page, 'next_link' => $next_link, 'prev_link' => $prev_link);

    $this->load_view (array ('portfolios' => $portfolios, 'pagination' => $pagination, 'portfolio_tag_id' => $portfolio_tag_id));
  }

  public function tags () {
    if ($this->has_post ()) {
      if (($name = trim ($this->input_post ('name'))) && verifyCreateOrm (PortfolioTag::create (array ('name' => $name, 'sort' => PortfolioTag::count () + 1))))
        identity ()->set_session ('_flash_message', '新增成功!', true) && redirect (array ('admin', $this->get_class (), $this->get_method ()), 'refresh');

      if ($tags = $this->input_post ('tags')) {
        if ($delete_ids = array_diff (field_array (PortfolioTag::find ('all', array ('select' => 'id')), 'id'), array_map (function ($tag) { return $tag['id']; }, $tags))) {
          PortfolioTag::delete_all (array ('conditions' => array ('id IN (?)', $delete_ids)));
          Portfolio::update_all (array ('set' => 'portfolio_tag_id = 0', 'conditions' => array ('portfolio_tag_id IN (?)', $delete_ids)));
        }

        array_map (function ($tag) {
          if ($tag['id'] && trim ($tag['name']) && trim ($tag['sort']))
            PortfolioTag::table ()->update ($set = array ('name' => trim ($tag['name']), 'sort' => trim ($tag['sort'])), array ('id' => $tag['id']));
        }, $tags);

        if (identity ()->set_session ('_flash_message', '修改成功!', true))
          redirect (array ('admin', $this->get_class (), $this->get_method ()), 'refresh');
      }
    }

    $tags = PortfolioTag::find ('all', array ('order' => 'sort DESC, id DESC'));
    $this->load_view (array ('tags' => $tags));
  }
  public function create () {
    if ($this->has_post ()) {
      $title       = trim ($this->input_post ('title'));
      $address     = trim ($this->input_post ('address'));
      $level       = trim ($this->input_post ('level'));
      $is_enabled  = $this->input_post ('is_enabled');
      $portfolio_tag_id = $this->input_post ('portfolio_tag_id');

      $files       = $this->input_post ('files[]', true, true);
      $blocks      = $this->input_post ('blocks');

      if (true || ($title && $level && $address && $files && is_numeric ($is_enabled))) {

        if (verifyCreateOrm ($portfolio = Portfolio::create (array ('title' => $title ? $title : '', 'level' => $level ? $level : '', 'address' => $address ? $address : '', 'is_enabled' => is_numeric ($is_enabled) ? $is_enabled : 1, 'portfolio_tag_id' => $portfolio_tag_id ? $portfolio_tag_id : 0)))) {
          foreach ($files as $file)
            if (verifyCreateOrm ($pic = PortfolioPic::create (array ('portfolio_id' => $portfolio->id, 'file_name' => ''))))
              $pic->file_name->put ($file);

          if ($blocks)
            foreach ($blocks as $block) {
              $b = PortfolioBlock::create (array ('portfolio_id' => $portfolio->id, 'title' => $block['title'], 'type' => $block['type']));

            if (isset ($block['items']))
              foreach ($block['items'] as $item)
                PortfolioBlockItem::create (array ('portfolio_block_id' => $b->id, 'title' => $item['title'], 'content' => $item['content']));
            }

          identity ()->set_session ('_flash_message', '新增成功!', true);
          redirect (array ('admin', $this->get_class ()));
        } else {
          @$portfolio->delete ();
        }
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！'));
      }
    } else {
      $this->load_view ();
    }
  }

  public function edit ($id = 0) {
    if (!($portfolio = Portfolio::find ('one', array ('conditions' => array ('id = ?', $id)))))
      redirect (array ('admin', $this->get_class ()));

    if ($this->has_post ()) {
      $title       = trim ($this->input_post ('title'));
      $address     = trim ($this->input_post ('address'));
      $level       = trim ($this->input_post ('level'));
      $is_enabled  = $this->input_post ('is_enabled');
      $portfolio_tag_id = $this->input_post ('portfolio_tag_id');

      $files       = $this->input_post ('files[]', true, true);
      $pics        = ($pics = $this->input_post ('pics')) ? $pics : array ();
      $blocks      = $this->input_post ('blocks');

      if (true || ($title && $level && $address && ($files || $pics) && is_numeric ($is_enabled))) {

        if ($delete_pic_ids = array_diff (field_array ($portfolio->pics, 'id'), $pics))
          array_map (function ($pic) {
            $pic->file_name->cleanAllFiles ();
            $pic->delete ();
          }, PortfolioPic::find ('all', array ('conditions' => array ('id IN (?) AND portfolio_id = ?', $delete_pic_ids, $portfolio->id))));

        array_map (function ($block) {
          array_map (function ($item) {
            $item->delete ();
          }, $block->items);

          $block->delete ();
        }, $portfolio->blocks);

        foreach ($files as $file)
          if (verifyCreateOrm ($pic = PortfolioPic::create (array ('portfolio_id' => $portfolio->id, 'file_name' => ''))))
            $pic->file_name->put ($file);

        if ($blocks)
          foreach ($blocks as $block) {
            $b = PortfolioBlock::create (array ('portfolio_id' => $portfolio->id, 'title' => $block['title'], 'type' => $block['type']));

            if (isset ($block['items']))
              foreach ($block['items'] as $item)
                PortfolioBlockItem::create (array ('portfolio_block_id' => $b->id, 'title' => $item['title'], 'content' => $item['content']));
          }

        $portfolio->title       = $title;
        $portfolio->level       = $level;
        $portfolio->address     = $address;
        $portfolio->is_enabled  = $is_enabled;
        $portfolio->portfolio_tag_id = $portfolio_tag_id ? $portfolio_tag_id : 0;
        $portfolio->save ();

        identity ()->set_session ('_flash_message', '修改成功!', true);
        redirect (array ('admin', $this->get_class ()));
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！', 'portfolio' => $portfolio));
      }
    } else {
      $this->load_view (array ('portfolio' => $portfolio));
    }
  }
}