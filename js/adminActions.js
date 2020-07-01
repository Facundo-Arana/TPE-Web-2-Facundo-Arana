"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let btn_forms = document.getElementsByName('botones_forms');
    btn_forms.forEach(element => {
        element.addEventListener('click', e => show_content(e));
    });

    let btn_edit = document.getElementsByName('selectedToEdit');
    btn_edit.forEach(element => {
        element.addEventListener('click', e => {
            document.querySelector('#books-edit').classList.remove('none');
            document.querySelector('#book-add').classList.add('none');
            document.querySelector('#cover-edit').classList.add('none');
            book_data(e);
        });
    });

    let change_covers = document.getElementsByName('change_covers');
    change_covers.forEach(element => {
        element.addEventListener('click', e => {
            document.querySelector('#books-edit').classList.add('none');
            document.querySelector('#book-add').classList.add('none');
            document.querySelector('#cover-edit').classList.remove('none');
            book_data(e);
        });
    });

    document.querySelector('#input-cover').addEventListener('change', e => {
        if (e.target.value == '') {
            document.querySelector('#submitCover').value = 'Delete cover';
        } else {
            document.querySelector('#submitCover').value = 'Change cover';
        }
    });
    document.querySelector('#idUser').addEventListener('change', user_data);
}

function book_data(event) {
    let id = event.target.value;
    if (id == undefined)
        id = event.target.alt;
    fetch('library/api/book/' + id)
        .then(respuesta => respuesta.json())
        .then(book => {
            document.querySelector('#id_book_cover').value = id;
            let name = document.querySelector('#newName');
            let author = document.querySelector('#newAuthorName');
            let details = document.querySelector('#details');
            let fk = document.querySelector('#idGenreFk');
            let cover = document.querySelector('#cover');
            if (book.img == null) {
                cover.alt = 'no img';
            }
            cover.src = book.img;
            name.value = book.book_name;
            author.value = book.author;
            details.value = book.details;
            fk.value = book.id_genre_fk;
        });
}


function user_data(event) {
    let id = event.target.value;
    fetch('library/api/user/' + id)
        .then(respuesta => respuesta.json())
        .then(book => {
            let priority = document.querySelector('#priority');
            priority.value = book[0].priority;
        });
}

function show_content(e) {
    let form_books = document.getElementById('books');
    let form_add_book = document.getElementById('book-add');
    let form_edit_book = document.getElementById('books-edit');
    let form_edit_cover = document.getElementById('cover-edit');
    let form_users = document.getElementById('users-form');
    let form_genres = document.getElementById('genres-form');

    if (e.currentTarget.value == 'books') {
        form_books.classList.remove('none');
        form_add_book.classList.remove('none');
        form_edit_cover.classList.add('none');
        form_edit_book.classList.add('none');
        form_users.classList.add('none');
        form_genres.classList.add('none');
    }
    if (e.currentTarget.value == 'generos') {
        form_books.classList.add('none');
        form_users.classList.add('none');
        form_genres.classList.remove('none');
    }
    if (e.currentTarget.value == 'usuarios') {
        form_books.classList.add('none');
        form_users.classList.remove('none');
        form_genres.classList.add('none');
    }

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