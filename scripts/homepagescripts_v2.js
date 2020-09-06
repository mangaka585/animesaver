  //Переключение вкладок
  let menuNewButton = document.getElementById('menuNewButton');
  let menuMagazineButton = document.getElementById('menuMagazineButton');
  let menuTasksButton = document.getElementById('menuTasksButton');
  let contentNew = document.getElementById('content__new');
  let contentWeeklysaver = document.getElementById('content__weeklysaver');
  let contentTasks = document.getElementById('content__tasks');
  menuNewButton.addEventListener('click',function(){
  contentWeeklysaver.style.display = 'none';
  contentTasks.style.display = 'none';
  menuMagazineButton.classList.remove('main_section__menu__buttons__active');
  menuTasksButton.classList.remove('main_section__menu__buttons__active');
  contentNew.style.display = 'block';
  menuNewButton.classList.add('main_section__menu__buttons__active');
  });
  menuMagazineButton.addEventListener('click', function(){
  contentNew.style.display = 'none';
  contentTasks.style.display = 'none';
  menuNewButton.classList.remove('main_section__menu__buttons__active');
  menuTasksButton.classList.remove('main_section__menu__buttons__active');
  contentWeeklysaver.style.display = 'block';
  menuMagazineButton.classList.add('main_section__menu__buttons__active');
  });
  menuTasksButton.addEventListener('click', function(){
  contentNew.style.display = 'none';
  contentWeeklysaver.style.display = 'none';
  contentTasks.style.display = 'block';
  menuNewButton.classList.remove('main_section__menu__buttons__active');
  menuMagazineButton.classList.remove('main_section__menu__buttons__active');
  menuTasksButton.classList.add('main_section__menu__buttons__active');
  });
  //Заполнение содержанием журнала в правой части страницы
  let firstMagazine = document.getElementById('firstMagazine');
  let secondMagazine = document.getElementById('secondMagazine');
  let thirdMagazine = document.getElementById('thirdMagazine');
  let fourthMagazine = document.getElementById('fourthMagazine');
  let rightSideMagazine = document.getElementById('rightSideMagazine');
  let magazineH4 = document.getElementById('magazineH4');

  firstMagazine.addEventListener('mouseover',function(){
  if(document.getElementById('createdChapters') != null){
    document.getElementById('createdChapters').remove();
    };
    magazineH4.innerHTML = "Выпуск №1";
    let chapterList = document.createElement('ul');
    chapterList.id = 'createdChapters';
    chapterList.innerHTML = "<li>Хроники Орбереса: Джин и Ева</li><li>Death (главы 1 - 3)</li><li>Интервью с Sophie Laurel</li><li>Путник</li><li>Аниме-новости</li><li>Рецензия</li>";
    rightSideMagazine.appendChild(chapterList);
  });

  secondMagazine.addEventListener('mouseover',function(){
    if(document.getElementById('createdChapters') != null){
    document.getElementById('createdChapters').remove();
    };
    magazineH4.innerHTML = "Выпуск №2";
    let chapterList = document.createElement('ul');
    chapterList.id = 'createdChapters';
    chapterList.innerHTML = "<li>Рецензия на Death Note: One Shot</li><li>День святого Валентина</li><li>Аниме-новости</li><li>Сингл Мнговение</li><li>Хроники Орбереса: Песочница</li><li>Death (главы 4 - 5)</li>";
    rightSideMagazine.appendChild(chapterList);
  });

  thirdMagazine.addEventListener('mouseover',function(){
  if(document.getElementById('createdChapters') != null){
    document.getElementById('createdChapters').remove();
    };
    magazineH4.innerHTML = "Выпуск №3";
    let chapterList = document.createElement('ul');
    chapterList.id = 'createdChapters';
    chapterList.innerHTML = "<li>История армии Японии</li><li>Топ 10 военных аниме</li><li>Аниме-новости</li><li>Kot and Shprot</li><li>Хроники Орбереса: Ночь в лесу</li><li>Death (главы 6 - 7)</li>";
    rightSideMagazine.appendChild(chapterList);
  });

  fourthMagazine.addEventListener('mouseover',function(){
  if(document.getElementById('createdChapters') != null){
    document.getElementById('createdChapters').remove();
    };
    magazineH4.innerHTML = "Выпуск №4";
    let chapterList = document.createElement('ul');
    chapterList.id = 'createdChapters';
    chapterList.innerHTML = "<li>Обзор на 'Summer Wars'</li><li>Обзор на 'Ученик чудовища'</li><li>Работы режиссера Мамору Хосода</li><li>Конкурс от Weekly Saver</li><li>Аниме-новости</li><li>Сингл: Сон Данте</li><li>Ангел нового Эдема</li><li>Хроники Орбереса</li><li>Дьявольский Союз</li><li>Death (главы 8 - 10)</li>";
    rightSideMagazine.appendChild(chapterList);
  });

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
