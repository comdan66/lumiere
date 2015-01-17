<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Migration_Add_scent_blocks extends CI_Migration {
  public function up () {
    $sql = "CREATE TABLE `scent_blocks` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `scent_id` int(11) NOT NULL,
              `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
              `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `content` text,
              `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `sort` int(11) NOT NULL DEFAULT '0',
              `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
              PRIMARY KEY (`id`),
              KEY `scent_id_index` (`scent_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $this->db->query ($sql);
  }
}