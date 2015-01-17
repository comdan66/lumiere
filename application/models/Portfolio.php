<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Portfolio extends OaModel {

  static $table_name = 'portfolios';

  static $has_one = array (
    array ('first_pic', 'class_name' => 'PortfolioPic', 'order' => 'id ASC', 'foreign_key' => 'portfolio_id')
  );

  static $has_many = array (
    array ('pics', 'class_name' => 'PortfolioPic', 'foreign_key' => 'portfolio_id'),
    array ('blocks', 'class_name' => 'PortfolioBlock', 'foreign_key' => 'portfolio_id')
  );

  static $belongs_to = array (
    array ('tag', 'class_name' => 'PortfolioTag')
  );

  public function __construct ($attributes = array (), $guard_attributes = TRUE, $instantiating_via_find = FALSE, $new_record = TRUE) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
  }
}