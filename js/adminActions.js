"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

/**
 *   Este archivo tiene la funcion de mostrar/ocultar botones, formularios,   </br>
 *  traer datos de libros, usuarios (via API REST) para mostrarlos con la     </br>
 *  idea de poder editarlos y demas cuestiones que no son relevantes para     </br>
 *  cumplir con las funcionalidades requeridas en este trabajo practico.
 */
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
        document.querySelector('#submitCover').classList.remove('none');
        if (e.target.value == '') {
            document.querySelector('#submitCover').value = 'Delete cover';
        } else {
            document.querySelector('#submitCover').value = 'Change cover';
        }
    });

    document.querySelector('#idUser').addEventListener('change', user_data);
}


/**
 *  Traer datos de un libro para autocompletar los formularios de edicion de libro y el de portadas. 
 */
function book_data(event) {
    let target = event.currentTarget;
    let td = target.parentNode;
    let tr = td.parentNode;
    let id = tr.getAttribute('data-book-id');//--------------------->  el id del libro sale de un atributo HTML. 

    fetch('library/api/book/' + id)
        .then(respuesta => respuesta.json())
        .then(book => {
            document.querySelector('#id_book_cover').value = id;
            let name = document.querySelector('#newName');
            let author = document.querySelector('#newAuthorName');
            let details = document.querySelector('#details');
            let fk = document.querySelector('#idGenreFk');
            let cover = document.querySelector('#cover');
            let idBook = document.querySelector('#idBook');
            let id_book_cover = document.querySelector('#id_book_cover');
            let link_img = document.querySelector('#link_img');
            let submitCover = document.querySelector('#submitCover');
            if (book.img == null) {
                submitCover.classList.add('none');
            }else{
                submitCover.classList.remove('none');
            }
            link_img.value = book.img;
            idBook.value = id;   
            id_book_cover.value = id;      
            cover.src = book.img;
            name.value = book.book_name;
            author.value = book.author;
            details.value = book.details;
            fk.value = book.id_genre_fk;
        });
}

/**
 * Traer datos de un usuario para autocompletar el form de edicion de permisos.
 */
function user_data(event) {
    let id = event.target.value;
    fetch('library/api/user/' + id)
        .then(respuesta => respuesta.json())
        .then(user => {
            let priority = document.querySelector('#priority');
            priority.value = user.priority;
        });
}

/**
 * mostrar / ocultar formularios.
 */
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









