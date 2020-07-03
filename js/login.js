"use strict";
document.addEventListener('DOMContentLoaded', iniciar);
function iniciar() {

    /**
     * mostrar / ocultar formulario de registro y de acceso.
     */
    document.getElementById('checkin').addEventListener('click', e => {
        document.getElementById('form-login').classList.toggle('none');
        document.getElementById('form-checkin').classList.toggle('none');
        if (e.target.value == 'login') {
            e.target.value = 'create account';
            e.target.innerHTML = 'login';
        } else {
            console.log('asas');
            e.target.value = 'login';
            e.target.innerHTML = 'create account';
        }

    });
}