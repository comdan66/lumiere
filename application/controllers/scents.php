<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Scents extends Site_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function index ($offset = 0, $tag = '') {
    $tag = ScentTag::find ('one', array ('conditions' => array ('name = ?', $tag)));
    $limit = 8;
    $total = Scent::count (array ('conditions' => $tag ? array ('is_enabled = ? AND scent_tag_id = ?', 1, $tag->id) : array ('is_enabled = ?', 1)));
    $offset = ($offset < $total) || ($offset >= 0) ? $offset : 0;
    $scents = Scent::find ('all', array ('offset' => $offset, 'limit' => $limit, 'order' => 'id DESC', 'conditions' => $tag ? array ('is_enabled = ? AND scent_tag_id = ?', 1, $tag->id) : array ('is_enabled = ?', 1)));

    $this->load->library ('pagination');
    
    $a = $total / $limit;
    $s = $offset / $limit;
    $pagination_config = array (
      'total_rows' => $total,
      'page_query_string' => true,
      'query_string_segment' => 'per_page',
      'num_links' => 2 + ((3 - $s) > 0 ? 3 - $s - 1 : ($s - ($a - 3) > 0 ? $s - ($a - 3): 0)),
      'per_page' => $limit,
      'base_url' => base_url (array ($this->get_class (), $this->get_method ())),
      'uri_segment' => $offset ? 3 : 0, 
      'page_query_string' => false, 
      'first_link' => '', 'last_link' => '', 
      'prev_link' => '<', 'next_link' => '>',
      'full_tag_open' => '<ul class="pagination">', 'full_tag_close' => '</ul>',
      'first_tag_open' => '', 'first_tag_close' => '', 
      'prev_tag_open' => '<li class="UP">', 'prev_tag_close' => '</li>', 
      'num_tag_open' => '<li class="USE">', 'num_tag_close' => '</li>',
      'cur_tag_open' => '<li class="NOUSE">', 'cur_tag_close' => '</li>',
      'next_tag_open' => '<li class="NEXT">', 'next_tag_close' => '</li>', 
      'last_tag_open' => '', 'last_tag_close' => '',
      );
    $this->pagination->initialize ($pagination_config);
    $pagination = $this->pagination->create_links ();

    $this->set_page_title ('SCENTS')->load_view (array ('page_key' => 'scents', 'scents' => $scents, 'pagination' => $pagination));
  }
  public function content ($id) {
    ($scent = Scent::find ('one', array ('conditions' => array ('id = ? AND is_enabled = ?', $id, 1)))) || redirect (array ($this->get_class ()));
    $this->set_page_title ('SCENTS')->load_view (array ('scent' => $scent));
  }
}
