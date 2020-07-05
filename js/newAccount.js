"use strict";

/**
 *  Si se intenta crear una cuenta de usuario nueva pero hay un error en algun campo, se vuelve a mostrar el
 *  formulario de registro en el login (la accion por defecto es mostrar el formulario de acceso).
 */
document.addEventListener('DOMContentLoaded', e => {
    document.getElementById('form-login').classList.toggle('none');
    document.getElementById('form-checkin').classList.toggle('none');
    document.getElementById('checkin').value = 'create account';
    document.getElementById('checkin').innerHTML = 'login';
});
