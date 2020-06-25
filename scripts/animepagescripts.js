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
