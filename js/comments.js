"use strict";

/**
 *  Obtener datos de usuario actual desde atributos HTML.
 */
let username = document.querySelector("#user_data").getAttribute('user-username');
let id_user = document.querySelector("#user_data").getAttribute('user-id');
let priority = document.querySelector("#user_data").getAttribute('user-priority');

/**
 *  Renderizar tabla de comentarios.
 */
let commentsList = new Vue({
    el: '#comments',
    data: {
        error: false,
        loading: true,
        priority: priority,
        book_comments: []
    },
    methods: {
        /** 
         *  Eliminar un comentario.
         * @param {*} id referencia al comentario seleccionado.
         */
        deleteComment: function (id) {
            fetch('library/api/deleteComment/' + id, { method: 'DELETE' })
                .then((response) => { return response.text() })
                .then(response => {

                    // Desde la API se recibe 'true' (string), en lugar de TRUE (boolean).
                    if (response == 'true') {

                        // Resetear valores del promedio de puntajes de usuarios. 
                        assessment.loading = true;
                        assessment.users_rating = null;

                        // Demora necesaria antes de volver a cargar la tabla de comentarios.
                        setTimeout(function () { getComments() }, 500);
                    }
                    else
                        alert(response);
                })
                .catch((exception) => console.log(exception));
        }
    }
});

/**
 *  Renderizar promedio de puntajes de los usuarios.
 */
let assessment = new Vue({
    el: '#assessment',
    data: {
        loading: true,
        users_rating: null
    }
});


/**
 *  Renderizar formulario para postear un comentario.
 */
let formPostComment = new Vue({
    el: '#form-add-comment',
    data: {
        userComment: null,
        puntaje: null,
        username: username,
        priority: priority
    },
    methods: {

        /**
         *  Postear un comentario y puntaje de un libro.
         * @param {*} e evento submit recarga la pagina por defecto.
         */
        checkForm: function (e) {
            // Evitar reload.
            e.preventDefault();

            // Postear comentario.
            postComment(userComment.value, puntaje.value);

            // Resetear valores del formulario y la tabla de comentario previo a volver a cargarlos.
            commentsList.error = false;
            commentsList.loading = true;
            commentsList.book_comments = [];
            formPostComment.userComment = null;
            formPostComment.puntaje = null;

            // Demora necesaria antes de recargarlos comentarios.
            setTimeout(function () { getComments() }, 1000);
        }
    }
});

// Traer comentarios de un libro especifico.
getComments();

/**
 *  Traer datos de la tabla de comentarios en la base de datos.
 */
function getComments() {

    // Obtener id del libro.
    let id = getBookID();

    // Ir a buscar los comentarios correspondientes al libro.
    fetch('library/api/comments/book/' + id)
        .then(response => response.json())
        .then(book_comments => {
            if (book_comments == null) {

                // Si no hay comentarios se debe mostrar informar al usuario. 
                commentsList.error = true;
            }
            else {

                // Si efectivamente existen comentarios se renderizan por Vue.
                commentsList.book_comments = book_comments;

                // Obtener promendio de calificaciones de usuarios.
                assessment.users_rating = getAverage(book_comments);
            }

            // quitar mensaje de espera en tabla de comentarios y valoracion de usuarios del libro.
            commentsList.loading = false;
            assessment.loading = false;
        })
        .catch(exception => console.log(exception));
}




/**
 *  Obtener el id del libro desde la direccion URL.
 */
function getBookID() {
    let url = window.location.pathname.split("/");
    let id = url[(url.length - 1)];
    return id;
}



/**
   * Postear un comentario.
   * @param {*} comment comentario del usuario.
   * @param {*} puntaje puntaje del libro.
   */
function postComment(comment, puntaje) {
    let id_book = getBookID();

    // definir JSON con datos proporcionados por el usuario.
    let comentario = {
        id_book_fk: id_book,
        id_user_fk: id_user,
        content: comment,
        puntaje: puntaje
    }

    // eviar JSON a la API para que se encargue de registrar el comentario en la base de datos. 
    fetch('library/api/postComment', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(comentario)
    })
        .then((response) => {
            if (response.ok)
                console.log('ok');
            else
                alert('error al postear comentario');
        })
        .catch(exception => console.log(exception));
}


/**
*  Obtener promedio de puntajes.
* @param {*} book_comments todos los comentarios del libro.
*/
function getAverage(book_comments) {
    let count = 0;
    for (let i = 0; i < book_comments.length; i++)
        count += parseInt(book_comments[i].puntaje)

    let percent = parseFloat((count / book_comments.length));

    return percent.toFixed(1);
}