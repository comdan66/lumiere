<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Main extends Site_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function index () {
    $this->set_frame_path ('frame', 'site_index')
         ->add_js (base_url (array ('resource', 'site', 'js', 'supersized.2.0.js')))
         ->load_view ();
  }
}
