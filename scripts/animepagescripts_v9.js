                                                                                //Скрипт выбора серий
let seriaButtonArray = document.getElementsByClassName('main_section__anime__watch__series__left_side__flexbox__element');
let seriaH3 = document.getElementById('seriaH3');
let iframe = document.getElementById('iframe');
let seriaButtonActive;
for (var i = 0; i < seriaButtonArray.length; i++) {
  seriaButtonArray[i].addEventListener('click', function(){
    seriaH3.innerHTML = "Серия " + this.innerHTML;
    iframe.src = "https:" + this.dataset.seria;
    if(document.getElementById('main_section__anime__watch__series__left_side__flexbox__element__active') != null) {
      document.getElementById('main_section__anime__watch__series__left_side__flexbox__element__active').removeAttribute('id');
    };
    this.id = 'main_section__anime__watch__series__left_side__flexbox__element__active';
  })
}

function showWindow(){                                                          //Функция для открытия окна авторизации
  document.getElementById("autorisation_window").style.display = 'block';
}

let addToFavorites = document.getElementById('addToFavorites');         //Обрабатываем скрипт добавления/удаления избранного аниме
function sent(){
  sendAjaxForm('result_form', 'ajax_form', 'includes/addToFavorites.php');
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
      $('#result_form').html('User: '+result.user_id+'<br>Anime: '+result.anime_id);
    },
    error: function(response) { // Данные не отправлены
      $('#result_form').html('Ошибка. Данные не отправлены.');
    }
  });
}
addToFavorites.addEventListener('click', function(){
  if (document.getElementById('addOrDelete').getAttribute('value') == "none") {
    alert("Авторизуйтесь, чтобы добавить в избранное");
  } else {
    if (addToFavorites.getAttribute("src") == "images/round-star.svg") {
      document.getElementById('addOrDelete').setAttribute('value', "add");
      addToFavorites.title = "Удалить из избранного";
      addToFavorites.setAttribute("src", "images/round-star_done.svg");
      sent();
      alert("Добавлено в избранное");
    } else {
      document.getElementById('addOrDelete').setAttribute('value', "delete");
      addToFavorites.setAttribute('src', "images/round-star.svg");
      addToFavorites.title = "Добавить в избранное";
      sent();
      alert("Удалено из избранного");
    }
  }
})

let addToWatched = document.getElementById('addToWatched');         //Обрабатываем скрипт добавления/удаления просмотренного аниме
function send(){
  sendAjaxForm('result_forme', 'ajax_forme', 'includes/addToWatched.php');
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
      $('#result_forme').html('User: '+result.user_id+'<br>Anime: '+result.anime_id);
    },
    error: function(response) { // Данные не отправлены
      $('#result_forme').html('Ошибка. Данные не отправлены.');
    }
  });
}
addToWatched.addEventListener('click', function(){
  if (document.getElementById('addOrDelete_1').getAttribute('value') == "none") {
    alert("Авторизуйтесь, чтобы добавить в просмотренное");
  } else {
    if (addToWatched.getAttribute("src") == "images/ice-iris.svg") {
      document.getElementById('addOrDelete_1').setAttribute('value', "add");
      addToWatched.title = "Удалить из избранного";
      addToWatched.setAttribute("src", "images/ice-iris_donee.svg");
      send();
      alert("Добавлено в просмотренное");
    } else {
      document.getElementById('addOrDelete_1').setAttribute('value', "delete");
      addToWatched.setAttribute('src', "images/ice-iris.svg");
      addToWatched.title = "Добавить в избранное";
      send();
      alert("Удалено из просмотренного");
    }
  }
})

let submitButton = document.getElementById('submit');                                     //Публикуем комментарий
function sentComment(){
  sendAjaxFormComment('ajax_formComment', 'includes/addComments.php');
  return false;
}
function sendAjaxFormComment(ajax_formComment, url) {
  $.ajax({
    url:     url,
    type:     "POST",
    dataType: "html",
    data: $("#"+ajax_formComment).serialize(),
  });
}
function reloadPage(){
  window.location.replace(window.location.pathname + window.location.search + window.location.hash);
}
submitButton.addEventListener('click', function(event){
  sentComment();
  setTimeout(reloadPage, 1000);
})