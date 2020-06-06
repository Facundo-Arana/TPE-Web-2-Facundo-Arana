"use strict";
document.addEventListener('DOMContentLoaded', iniciar);
function iniciar() {
    let form1 = document.getElementById('form1').addEventListener('click', e => {
        document.getElementById('addBook').classList.toggle('none');
    });
    let form2 = document.getElementById('form2').addEventListener('click', e => {
        document.getElementById('editBook').classList.toggle('none');
    });
    let form3 = document.getElementById('form3').addEventListener('click', e => {
        document.getElementById('delete').classList.toggle('none');
    });
    let form4 = document.getElementById('form4').addEventListener('click', e => {
        document.getElementById('addGenre').classList.toggle('none');
    });
    let bookSelected = document.querySelector('#selectedToEdit').addEventListener('change', book_data);

}

function book_data(event) {
    let id = event.target.value;

    fetch('library/api/book/' + id).then((respuesta) => {
        if (respuesta.ok)
            return respuesta.text();
        else
            document.getElementById("conteiner").innerHTML = "<h1>error</h1>";
    }).then((book_info) => {
        let info = JSON.parse(book_info);
        let book = info[0];
        let name = document.querySelector('#newName');
        let author = document.querySelector('#newAuthor');
        let details = document.querySelector('#details');
        let fk = document.querySelector('#newFK');
        console.log(fk);
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