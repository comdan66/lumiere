/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

$(function() {
  var index = 0;

  $('#add_block1').click (function () {
    var obj = {index: index++};
    $(_.template ($('#_block1').html (), obj) (obj)).insertAfter ($('table').last ());
  });
  $('#add_block2').click (function () {
    var obj = {index: index++};
    $(_.template ($('#_block2').html (), obj) (obj)).insertAfter ($('table').last ());
  });
  $('body').on ('click', '.add_item', function () {
    var $t = $(this).parents ('table');
    var i = $t.data ('index');
    var c = $t.data ('count');
    $t.data ('count', c + 1);

    var obj = {i: i, c: c};
    $(_.template ($('#_block1_item').html (), obj) (obj)).insertAfter ($t.find ('tr').last ());
  })

  $('body').on ('click', '.delete', function () {
    $(this).parents ('table').remove ();
  });
});