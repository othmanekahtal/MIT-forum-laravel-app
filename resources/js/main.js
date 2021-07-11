'use strict'

let hamburger = document.querySelector('.hamburger_menu__icon');
let menu = document.querySelector('.hamburger_menu__menu');
hamburger.addEventListener('click', function () {
    menu.classList.toggle('hide_menu')
})

document.addEventListener('keydown', function (e) {
    if (!(e.key === 'Escape' && !menu.classList.contains('hide_menu'))) return;
    console.log(e.key)
    menu.classList.add('hide_menu')
})