"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let forms = document.getElementsByName('formularios');
    forms.forEach(element => {
        element.addEventListener('click', e => {
            show_content(e);
        });
    });
    document.querySelector('#selectedToEdit').addEventListener('change', book_data);
}

function show_content(e) {
    console.log(e.currentTarget.value);
    if (e.currentTarget.value == 'formularios') {
        document.getElementById('library-forms').classList.remove('none');
        document.getElementById('users-form').classList.add('none');
        document.getElementById('comments-forms').classList.add('none');
    }
    if (e.currentTarget.value == 'usuarios') {
        document.getElementById('library-forms').classList.add('none');
        document.getElementById('users-form').classList.remove('none');
        document.getElementById('comments-forms').classList.add('none');
    }
    if(e.currentTarget.value == 'comentarios'){
        document.getElementById('library-forms').classList.add('none');
        document.getElementById('users-form').classList.add('none');
        document.getElementById('comments-forms').classList.remove('none');
    }
}

function book_data(event) {
    let id = event.target.value;
    fetch('library/api/book/' + id).then((respuesta) => {
        if (respuesta.ok)
            return respuesta.json();
        else
            document.getElementById("conteiner").innerHTML = "<h1>error</h1>";
    }).then((book) => {
        let name = document.querySelector('#newName');
        let author = document.querySelector('#newAuthorName');
        let details = document.querySelector('#details');
        let fk = document.querySelector('#idGenreFk');

        name.value = book.book_name;
        author.value = book.author;
        details.value = book.details;
        $(fk).val(book.id_genre_fk);
    });
}











/*
$(document).ready(function () {
    $('#loginform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'controller/controller.php',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.href = 'home';
                }
                else {
                    alert('Invalid Credentials!');
                }
            }
        });
    });
});
*/