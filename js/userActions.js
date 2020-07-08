"use strict";
let button = document.getElementById('profile');
let ul = document.getElementById('activ');

button.addEventListener('click', e => {
    ul.classList.toggle('oculto');
});
