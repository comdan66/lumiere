/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

$(function() {

  var $myCarousel = $(".carousel-inner").swiperight (function () {  
    $myCarousel.carousel ('prev');  
  }).swipeleft (function () {  
    $myCarousel.carousel ('next');  
  });  

  $("#SMALL img").click (function () {
    $("#BIG").attr ("src", $(this).data ("url"));
    $(this).addClass ('show').siblings ().removeClass ('show'); 
  }).eq (0).click ();
});