"use strict";
document.addEventListener('DOMContentLoaded', e => {
    console.log('asasa');
    document.getElementById('form-login').classList.toggle('none');
    document.getElementById('form-checkin').classList.toggle('none');
    document.getElementById('checkin').value = 'create account';
    document.getElementById('checkin').innerHTML = 'login';
});
