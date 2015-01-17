<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Product extends OaModel {

  static $table_name = 'products';

  static $has_one = array (
    array ('first_pic', 'class_name' => 'ProductPic', 'order' => 'id ASC', 'foreign_key' => 'product_id')
  );

  static $has_many = array (
    array ('pics', 'class_name' => 'ProductPic', 'foreign_key' => 'product_id'),
    array ('blocks', 'class_name' => 'ProductBlock', 'foreign_key' => 'product_id')
  );

  static $belongs_to = array (
    array ('tag', 'class_name' => 'ProductTag')
  );

  public function __construct ($attributes = array (), $guard_attributes = TRUE, $instantiating_via_find = FALSE, $new_record = TRUE) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
  }
}