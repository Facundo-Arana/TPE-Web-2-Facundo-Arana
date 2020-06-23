"use strict";
document.addEventListener('DOMContentLoaded', e => {
    document.getElementById('form-login').classList.toggle('none');
    document.getElementById('form-checkin').classList.toggle('none');
    document.getElementById('checkin').value = 'create account';
    document.getElementById('checkin').innerHTML = 'login';
});
