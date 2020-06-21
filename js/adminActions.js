"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let forms = document.getElementById('formularios').addEventListener('click', e => {
        document.getElementById('library-forms').classList.toggle('none');
    });
    let bookSelected = document.querySelector('#selectedToEdit').addEventListener('change', book_data);
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