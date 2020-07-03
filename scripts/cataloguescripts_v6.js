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

//Переключение вкладок
let menuGenres = document.getElementById('menuGenres');
let contentGenres = document.getElementById('main_section__menu__genres');
let menuYear = document.getElementById('menuYear');
let contentYear = document.getElementById('main_section__menu__year');
menuGenres.addEventListener('click',function(){
contentYear.style.display = 'none';
menuYear.classList.remove('main_section__menu__buttons__active');
contentGenres.style.display = 'block';
menuGenres.classList.add('main_section__menu__buttons__active');
});
menuYear.addEventListener('click',function(){
contentGenres.style.display = 'none';
menuGenres.classList.remove('main_section__menu__buttons__active');
contentYear.style.display = 'block';
menuYear.classList.add('main_section__menu__buttons__active');
});

//Переключение вкладок на мобильном
let menuGenres_mobile = document.getElementById('menuGenres_mobile');
let contentGenres_mobile = document.getElementById('main_section__menu__genres_mobile');
let menuYear_mobile = document.getElementById('menuYear_mobile');
let contentYear_mobile = document.getElementById('main_section__menu__year_mobile');
menuGenres_mobile.addEventListener('click',function(){
contentYear_mobile.style.display = 'none';
menuYear_mobile.classList.remove('main_section__menu__buttons__active');
contentGenres_mobile.style.display = 'block';
menuGenres_mobile.classList.add('main_section__menu__buttons__active');
});
menuYear_mobile.addEventListener('click',function(){
contentGenres_mobile.style.display = 'none';
menuGenres_mobile.classList.remove('main_section__menu__buttons__active');
contentYear_mobile.style.display = 'block';
menuYear_mobile.classList.add('main_section__menu__buttons__active');
});

//Заполнение фона блока аниме, где прокрутка в стороны
let ul1 = document.getElementById('ul1');
let toLeftButtonUl1 = document.getElementById('toLeftButtonUl1');
toLeftButtonUl1.addEventListener('click', function(){
  let position = ul1.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul1.style.transform = position;
  };
});
let toRightButtonUl1 = document.getElementById('toRightButtonUl1');
toRightButtonUl1.addEventListener('click', function(){
  let position = ul1.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul1.style.transform = position;
  };
});

let ul2 = document.getElementById('ul2');
let toLeftButtonUl2 = document.getElementById('toLeftButtonUl2');
toLeftButtonUl2.addEventListener('click', function(){
  let position = ul2.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul2.style.transform = position;
  };
});
let toRightButtonUl2 = document.getElementById('toRightButtonUl2');
toRightButtonUl2.addEventListener('click', function(){
  let position = ul2.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul2.style.transform = position;
  };
});

let ul3 = document.getElementById('ul3');
let toLeftButtonUl3 = document.getElementById('toLeftButtonUl3');
toLeftButtonUl3.addEventListener('click', function(){
  let position = ul3.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul3.style.transform = position;
  };
});
let toRightButtonUl3 = document.getElementById('toRightButtonUl3');
toRightButtonUl3.addEventListener('click', function(){
  let position = ul3.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul3.style.transform = position;
  };
});

let ul4 = document.getElementById('ul4');
let toLeftButtonUl4 = document.getElementById('toLeftButtonUl4');
toLeftButtonUl4.addEventListener('click', function(){
  let position = ul4.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul4.style.transform = position;
  };
});
let toRightButtonUl4 = document.getElementById('toRightButtonUl4');
toRightButtonUl4.addEventListener('click', function(){
  let position = ul4.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul4.style.transform = position;
  };
});

let ul5 = document.getElementById('ul5');
let toLeftButtonUl5 = document.getElementById('toLeftButtonUl5');
toLeftButtonUl5.addEventListener('click', function(){
  let position = ul5.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul5.style.transform = position;
  };
});
let toRightButtonUl5 = document.getElementById('toRightButtonUl5');
toRightButtonUl5.addEventListener('click', function(){
  let position = ul5.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul5.style.transform = position;
  };
});

let ul6 = document.getElementById('ul6');
let toLeftButtonUl6 = document.getElementById('toLeftButtonUl6');
toLeftButtonUl6.addEventListener('click', function(){
  let position = ul6.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul6.style.transform = position;
  };
});
let toRightButtonUl6 = document.getElementById('toRightButtonUl6');
toRightButtonUl6.addEventListener('click', function(){
  let position = ul6.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -780) {
    position = +position - 590;
    if(position < -780) {
      position = -780;
    };
    position = "translateX(" + position + "px)";
    ul6.style.transform = position;
  };
});

let ul7 = document.getElementById('ul7');
let toLeftButtonUl7 = document.getElementById('toLeftButtonUl7');
toLeftButtonUl7.addEventListener('click', function(){
  let position = ul7.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul7.style.transform = position;
  };
});
let toRightButtonUl7 = document.getElementById('toRightButtonUl7');
toRightButtonUl7.addEventListener('click', function(){
  let position = ul7.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -1200) {
    position = +position - 590;
    if(position < -1200) {
      position = -1200;
    };
    position = "translateX(" + position + "px)";
    ul7.style.transform = position;
  };
});

let ul8 = document.getElementById('ul8');
let toLeftButtonUl8 = document.getElementById('toLeftButtonUl8');
toLeftButtonUl8.addEventListener('click', function(){
  let position = ul8.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul8.style.transform = position;
  };
});
let toRightButtonUl8 = document.getElementById('toRightButtonUl8');
toRightButtonUl8.addEventListener('click', function(){
  let position = ul8.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -360) {
    position = +position - 590;
    if(position < -360) {
      position = -360;
    };
    position = "translateX(" + position + "px)";
    ul8.style.transform = position;
  };
});

let ul9 = document.getElementById('ul9');
let toLeftButtonUl9 = document.getElementById('toLeftButtonUl9');
toLeftButtonUl9.addEventListener('click', function(){
  let position = ul9.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul9.style.transform = position;
  };
});
let toRightButtonUl9 = document.getElementById('toRightButtonUl9');
toRightButtonUl9.addEventListener('click', function(){
  let position = ul9.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -360) {
    position = +position - 590;
    if(position < -360) {
      position = -360;
    };
    position = "translateX(" + position + "px)";
    ul9.style.transform = position;
  };
});

let ul10 = document.getElementById('ul10');
let toLeftButtonUl10 = document.getElementById('toLeftButtonUl10');
toLeftButtonUl10.addEventListener('click', function(){
  let position = ul10.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul10.style.transform = position;
  };
});
let toRightButtonUl10 = document.getElementById('toRightButtonUl10');
toRightButtonUl10.addEventListener('click', function(){
  let position = ul10.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul10.style.transform = position;
  };
});

let ul11 = document.getElementById('ul11');
let toLeftButtonUl11 = document.getElementById('toLeftButtonUl11');
toLeftButtonUl11.addEventListener('click', function(){
  let position = ul11.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul11.style.transform = position;
  };
});
let toRightButtonUl11 = document.getElementById('toRightButtonUl11');
toRightButtonUl11.addEventListener('click', function(){
  let position = ul11.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -360) {
    position = +position - 590;
    if(position < -360) {
      position = -360;
    };
    position = "translateX(" + position + "px)";
    ul11.style.transform = position;
  };
});

let ul12 = document.getElementById('ul12');
let toLeftButtonUl12 = document.getElementById('toLeftButtonUl12');
toLeftButtonUl12.addEventListener('click', function(){
  let position = ul12.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul12.style.transform = position;
  };
});
let toRightButtonUl12 = document.getElementById('toRightButtonUl12');
toRightButtonUl12.addEventListener('click', function(){
  let position = ul12.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -360) {
    position = +position - 590;
    if(position < -360) {
      position = -360;
    };
    position = "translateX(" + position + "px)";
    ul12.style.transform = position;
  };
});

let ul13 = document.getElementById('ul13');
let toLeftButtonUl13 = document.getElementById('toLeftButtonUl13');
toLeftButtonUl13.addEventListener('click', function(){
  let position = ul13.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position != 0) {
    position = +position + 590;
    if(position > 0) {
      position = 0;
    };
    position = "translateX(" + position + "px)";
    ul13.style.transform = position;
  };
});
let toRightButtonUl13 = document.getElementById('toRightButtonUl13');
toRightButtonUl13.addEventListener('click', function(){
  let position = ul13.style.transform;
  let skobka = position.indexOf('(');
  let px = position.indexOf('px');
  position = position.slice(skobka+1,px);
  if(position > -2055) {
    position = +position - 590;
    if(position < -2055) {
      position = -2055;
    };
    position = "translateX(" + position + "px)";
    ul13.style.transform = position;
  };
});

//Показываем при наведении информацию об аниме во вкладке Жанры
let content__genres__liArray = document.getElementsByClassName('content__genres__li');
for (var i = 0; i < content__genres__liArray.length; i++) {
  content__genres__liArray[i].addEventListener('mouseover', function(){
    this.children[0].children[0].style.display = 'block';
    this.children[0].children[1].style.display = 'block';
    this.children[0].children[2].style.display = 'block';
  })
}
for (var i = 0; i < content__genres__liArray.length; i++) {
  content__genres__liArray[i].addEventListener('mouseout', function(){
    this.children[0].children[0].style.display = 'none';
    this.children[0].children[1].style.display = 'none';
    this.children[0].children[2].style.display = 'none';
  })
}
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
