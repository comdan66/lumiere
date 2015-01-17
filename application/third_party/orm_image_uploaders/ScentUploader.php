<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class ScentUploader extends OrmImageUploader {

  public function d4_url () {
    return '';
  }

  public function getVersions () {
    return array (
            '' => array (),
            '80x80' => array ('adaptiveResizeQuadrant', 80, 80, 'c'),
            '115x115' => array ('adaptiveResizeQuadrant', 115, 115, 'c'),
          );
  }
}