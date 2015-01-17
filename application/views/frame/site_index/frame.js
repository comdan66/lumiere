/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

$(function () {
  var srcs = $('#supersize input').map (function () {
    $('#supersize').append ($('<img />').attr ('src', $(this).val ())).OAimgLiquid ();
    return $(this).val ();
  });
  var timer = null, index = 0;

  var change = function () {
    clearTimeout (timer);
    (index > srcs.length - 1) && (index = 0);
    $('#supersize').find ('img').removeClass ('show');
    $('#supersize').find ('img').eq (index++).addClass ('show');
    timer = setTimeout (change, 12000);
  };
  change ();
  $(window).resize (function () {
    $('#supersize').OAimgLiquid ();
  });
});
