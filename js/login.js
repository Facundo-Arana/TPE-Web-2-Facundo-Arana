"use strict";
document.addEventListener('DOMContentLoaded', iniciar);
function iniciar() {
    document.getElementById('checkin').addEventListener('click', e => {
        document.getElementById('form-login').classList.toggle('none');
        document.getElementById('form-checkin').classList.toggle('none');
        document.getElementById('msj').classList.add('none');
        if (e.target.value == 'login') {
            e.target.value = 'create account';
            e.target.innerHTML = 'login';
        } else {
            e.target.value = 'login';
            e.target.innerHTML = 'create account';
        }

    });
}