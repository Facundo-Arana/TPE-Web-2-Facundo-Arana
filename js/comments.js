"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {

    var commentsList = new Vue({
        el: '#comments',
        data: {
            comentarios: []
        }
    });

    getComments();

    function getComments() {
        let param = window.location.pathname.split("/");
        let id = param[(param.length - 1)];

        fetch('library/api/comments/' + id)
            .then(response => response.json())
            .then(comments => {
                console.log(comments);
                commentsList.comentarios = comments;
            });
    }
}