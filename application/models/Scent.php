<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Scent extends OaModel {

  static $table_name = 'scents';

  static $has_many = array (
    array ('blocks', 'class_name' => 'ScentBlock', 'order' => 'sort ASC')
  );

  static $belongs_to = array (
    array ('tag', 'class_name' => 'ScentTag')
  );

  public function __construct ($attributes = array (), $guard_attributes = TRUE, $instantiating_via_find = FALSE, $new_record = TRUE) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
    OrmImageUploader::bind ('file_name');
  }
}