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

let form = document.getElementById('upload_avatar');                          //Делаем видимым поле для изменения аватарки
let avatar = document.getElementById('avatar');
avatar.addEventListener('mouseover', function(){
  form.style.display = "block";
})
avatar.addEventListener('mouseout', function() {
  form.style.display = "none";
})
avatar.addEventListener('click', function(){
  form.style.display = "block";
})

let change_infoButton = document.getElementById('change_info');               //Показываем кнопку для показа формы редактирования информации
document.getElementById('profileInfo__rightSide').addEventListener('mouseover', function(){
  change_infoButton.style.display = 'block';
})
document.getElementById('profileInfo__rightSide').addEventListener('mouseout', function(){
  change_infoButton.style.display = 'none';
})
document.getElementById('profileInfo__rightSide').addEventListener('click', function(){
  change_infoButton.style.display = 'block';
})
change_infoButton.addEventListener('click', function() {
  document.getElementById('editInfo').style.display = "block";
})
document.getElementById('cancel').addEventListener('click', function(){
  document.getElementById('editInfo').style.display = 'none';
})
let save = document.getElementById('save');                                     //Сохраняем изменения профиля
function sent(){
  sendAjaxForm('result_form', 'ajax_form', 'save_user_changes.php');
  return false;
}
function sendAjaxForm(result_form, ajax_form, url) {
  $.ajax({
    url:     url,
    type:     "POST",
    dataType: "html",
    data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
    success: function(response) { //Данные отправлены успешно
      result = $.parseJSON(response);
      $('#result_form').html('Name: '+result.name+'<br>Surname: '+result.surname+'<br>Fathername: '+result.fathername+'<br>city: '+result.city+'<br>Id: '+result.id);
    },
    error: function(response) { // Данные не отправлены
      $('#result_form').html('Ошибка. Данные не отправлены.');
    }
  });
}
function reloadPage(){
  window.location.replace(window.location.pathname + window.location.search + window.location.hash);
}
save.addEventListener('click', function(event){
  sent();
  setTimeout(reloadPage, 1500);
})