window.onload = function () {
  document.body.classList.add('loaded_hiding');
  window.setTimeout(function () {
    document.body.classList.add('loaded');
    document.body.classList.remove('loaded_hiding');
  }, 1500);
};

$( document ).ready(function() {

  $("#navToggle").click(function() {
    $(this).toggleClass("active");
    $(".overlay").toggleClass("open");
    // this line ▼ prevents content scroll-behind
    $("body").toggleClass("locked");
  });

  $(".video h3").addClass("clickme");
  $(".video div div").removeClass().addClass("player_window");
  $(".video h3").css({
    "background-color":"#F0F8FF",
    "border":"solid 1px #663399",
    "border-radius":"5px",
    "padding-top":"5px",
    "padding-bottom":"5px",
    "cursor":"pointer",
    "margin-top":"5px"
  });
  $(".player_window").css({
    "width":"80%",
    "margin-left":"auto",
    "margin-right":"auto"
  });
  $('.clickme').on("click", function(){
    $(this).next().toggle(100)
  });

  var navigation = $('#mobile_nav');
  $('.menu-icon').on("click", function (){
    $(this).toggleClass('clicked');
    if (navigation.is(':visible')) {
      navigation.hide();
      $('body').removeClass('stop-scrolling')
    } else {
      $('html, body').animate({ scrollTop: 0 }, 500);
      navigation.show();
      $('body').addClass('stop-scrolling').bind('touchmove', function(e){e.preventDefault()}).unbind('touchmove')
    }
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
      $('a.scroll-top').fadeIn('slow');

    } else {
      $('a.scroll-top').fadeOut('slow');
    }
  });

  $('a.scroll-top').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, 600);
  });
});

function try_again_button() {
  let element = document.getElementsByClassName('iframe_class');
  if (element[0].style.display === 'none') {
    element[0].style.display = 'block';
  } else {
    element[0].style.display = 'none';
  }
}