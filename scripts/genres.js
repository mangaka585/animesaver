function showWindow(){                                                        //Функция для открытия окна авторизации
  document.getElementById("autorisation_window").style.display = 'block';
}

let last_known_scroll_position = 0;                                           //Прокрутка наверх кнопка
let ticking = false;
function doSomething(scroll_pos) {
  if(window.scrollY > 300) {
    document.getElementById('to_top_button').style.display = 'block';
  } else {
    document.getElementById('to_top_button').style.display = 'none';
  };
};
window.addEventListener('scroll', function(e) {
  last_known_scroll_position = window.scrollY;

  if (!ticking) {
    window.requestAnimationFrame(function() {
      doSomething(last_known_scroll_position);
      ticking = false;
    });

    ticking = true;
  };
});

document.getElementById('to_top_button').addEventListener('click', function(){
  scrollTo(document.documentElement, 0, 750);
});
function scrollTo(element, to, duration) {
  var start = element.scrollTop,
      change = to - start,
      currentTime = 0,
      increment = 20;

  var animateScroll = function(){
      currentTime += increment;
      var val = Math.easeInOutQuad(currentTime, start, change, duration);
      element.scrollTop = val;
      if(currentTime < duration) {
          setTimeout(animateScroll, increment);
      }
  };
  animateScroll();
}
Math.easeInOutQuad = function (t, b, c, d) {
  t /= d/2;
  if (t < 1) return c/2*t*t + b;
  t--;
  return -c/2 * (t*(t-2) - 1) + b;
};

//Показываем при наведении информацию об аниме во вкладке Год
let content__yearArray = document.getElementsByClassName('content__year__element');
for (var i = 0; i < content__yearArray.length; i++) {
  content__yearArray[i].addEventListener('mouseover', function(){
    this.children[0].children[0].style.display = 'none';
    this.children[0].children[1].style.display = 'none';
    this.children[0].children[2].style.display = 'block';
    this.children[0].children[3].style.display = 'block';
    this.children[0].children[4].style.display = 'block';
  })
}
for (var i = 0; i < content__yearArray.length; i++) {
  content__yearArray[i].addEventListener('mouseout', function(){
    this.children[0].children[0].style.display = 'inline-block';
    this.children[0].children[1].style.display = 'inline-block';
    this.children[0].children[2].style.display = 'none';
    this.children[0].children[3].style.display = 'none';
    this.children[0].children[4].style.display = 'none';
  })
}
