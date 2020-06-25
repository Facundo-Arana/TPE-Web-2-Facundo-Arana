"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let forms = document.getElementsByName('formularios');
    forms.forEach(element => {
        element.addEventListener('click', e => {
            show_content(e);
        });
    });

    document.querySelector('#input-cover').addEventListener('change', e => {
        if (e.target.value != '') {
            document.querySelector('#submitCover').value = 'Change Cover';
            document.querySelector('#submitCover').classList.remove('oculto');
        }
    });
    document.querySelector('#selectedToEdit').addEventListener('change', book_data);
    document.querySelector('#idUser').addEventListener('change', user_data);
}

function user_data(event) {
    let id = event.target.value;
    fetch('library/api/user/' + id).then((respuesta) => {
        if (respuesta.ok)
            return respuesta.json();
        else
            document.getElementById("conteiner").innerHTML = "<h1>error 500</h1>";
    }).then((book) => {
        let priority = document.querySelector('#priority');
        priority.value = book[0].priority;
    });
}

function show_content(e) {
    let form_all_books = document.getElementById('books');
    let form_books = document.getElementById('books-forms');
    let form_book_edit = document.getElementById('books-edit');
    let form_users = document.getElementById('users-form');
    let form_comments = document.getElementById('comments-forms');
    let form_genres = document.getElementById('genres-form');
    
    if (e.currentTarget.value == 'add-book') {
        form_books.classList.remove('none');
        form_all_books.classList.remove('none');
        form_users.classList.add('none');
        form_book_edit.classList.add('none');
        form_comments.classList.add('none');
        form_genres.classList.add('none');
    }
    if (e.currentTarget.value == 'edit-book') {
        form_all_books.classList.remove('none');
        form_books.classList.add('none');
        form_users.classList.add('none');
        form_book_edit.classList.remove('none');
        form_comments.classList.add('none');
        form_genres.classList.add('none');
    }
    if (e.currentTarget.value == 'usuarios') {
        form_all_books.classList.add('none');
        form_users.classList.remove('none');
        form_comments.classList.add('none');
        form_genres.classList.add('none');
    }
    if (e.currentTarget.value == 'comentarios') {
        form_all_books.classList.add('none');
        form_users.classList.add('none');
        form_comments.classList.remove('none');
        form_genres.classList.add('none');
    }
    if (e.currentTarget.value == 'generos') {
        form_all_books.classList.add('none');
        form_genres.classList.remove('none');
        form_users.classList.add('none');
        form_comments.classList.add('none');
    }
}

function book_data(event) {
    let id = event.target.value;
    fetch('library/api/book/' + id).then((respuesta) => {
        if (respuesta.ok)
            return respuesta.json();
        else
            document.getElementById("conteiner").innerHTML = "<h1>error 500</h1>";
    }).then((book) => {
        document.querySelector('#cover-title').classList.remove('oculto');
        document.querySelector('#id_book_cover').value = id;
        let name = document.querySelector('#newName');
        let author = document.querySelector('#newAuthorName');
        let details = document.querySelector('#details');
        let fk = document.querySelector('#idGenreFk');
        let cover = document.querySelector('#cover');
        if (book.img == null) {
            cover.alt = 'no img';
            document.querySelector('#submitCover').classList.add('oculto');
        }
           
        
        cover.src = book.img;
        name.value = book.book_name;
        author.value = book.author;
        details.value = book.details;
        fk.value = book.id_genre_fk;
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