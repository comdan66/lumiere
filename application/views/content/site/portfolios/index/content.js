/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

$(function() {
  var filterCase = function (key) {
    var $select = $('.unit[data-tag="' + key + '"]').clone ();
    $select.removeClass ('cover');
    var $not_select = $('.unit[data-tag!="' + key + '"]').clone ();
    $not_select.addClass ('cover');
    $('.units').empty ().append ($select).append ($not_select);
    return true;
  }

  $('.sub[data-key="portfolios"] .item').click (function () {
    $(this).parents ('.sub').find ('.item').removeClass ('action')
    $(this).addClass ('action');
    filterCase ($(this).text ())
  });
  if (window.location.hash) {
    var h = window.location.hash.split('#')[1];
    filterCase (h);
  }
});