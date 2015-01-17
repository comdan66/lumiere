/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

window.fbAsyncInit = function() {
    FB.init({
      appId      : '330210770498177',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(function () {
  var $rightSlide = $('#right_slide');
  var overflow = $('body').css ('overflow');
  
  $(window).resize (function () {
    setTimeout (function () {
      if ($('#content').height () > $('.content').height ())
        $('.content').css ({'height': $('#content').height () + 'px'});  
      if ($('#container').height () > $('.slide_c').height ())
      $('.slide_c').css ({'height': $('#container').height () + 'px'});  
    }, 500);
  }).resize ();
  
  $('.option').click (function () {
    if ($rightSlide.hasClass ('close')) {
      $rightSlide.removeClass ('close');
      $('body').css ('overflow', 'hidden');
    } else {
      $rightSlide.addClass ('close');
      $('body').css ('overflow', overflow);
    }
  });
  $('#slide_cover').click (function () {
    if (!$rightSlide.hasClass ('close')) {
      $rightSlide.addClass ('close');
      $('body').css ('overflow', overflow);
    }
  });
  var key = window.location.pathname.split ('/').filter (function (t) { return t.length; });
  if (key.length)
    $('div.sub[data-key="' + key[0] + '"]').addClass ('show');

  
});
