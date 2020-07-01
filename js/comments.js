"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let username = document.getElementById('username').textContent;
    let priority = document.getElementById('priority').textContent;
    let id_user = document.getElementById('id_user').textContent;
    var commentsList = new Vue({
        el: '#comments',
        data: {
            error: false,
            loading: true,
            priority: priority,
            book_comments: []
        },
        methods: {
            deleteComment: function (id) {
                fetch('library/api/deleteComment/' + id, { method: 'DELETE' })
                    .then((response) => { return response.text() })
                    .then(response => {
                        if (response == 'true')
                            getComments();
                        else
                            alert(response);
                    })
                    .catch((exception) => console.log(exception));
            }
        }
    });

    var assessment = new Vue({
        el: '#assessment',
        data: {
            loading: true,
            users_rating: 0
        }
    });

    var formPostComment = new Vue({
        el: '#form-add-comment',
        data: {
            userComment: null,
            puntaje: null,
            username: username,
            priority: priority
        },
        methods: {
            checkForm: function (e) {
                e.preventDefault();
                postComment(userComment.value, puntaje.value);
            }
        }
    });

    getComments();

    function postComment(comment, puntaje) {
        let id_book = getBookID();
        let comentario = {
            id_book_fk: id_book,
            id_user_fk: id_user,
            content: comment,
            puntaje: puntaje
        }
        fetch('library/api/postComment', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(comentario)
        })
            .then((response) => {
                if (response.ok) 
                    getComments();
                else
                    alert('error al postear comentario');
            })
            .catch(exception => console.log(exception));
    }

    function getComments() {
        let id = getBookID();
        fetch('library/api/comments/book/' + id)
            .then(response => response.json())
            .then(book_comments => {
                if (book_comments == null) {
                    commentsList.error = true;
                }
                else {
                    commentsList.book_comments = book_comments;
                    assessment.users_rating = getPercentage(book_comments);
                }
                commentsList.loading = false;
                assessment.loading = false;
            })
            .catch(exception => console.log(exception));
    }

    function getPercentage(book_comments) {
        let count = 0;
        for (let i = 0; i < book_comments.length; i++)
            count += parseInt(book_comments[i].puntaje)

        let percent = parseFloat((count / book_comments.length));

        
        return percent.toFixed(1);
    }
    function getBookID() {
        let url = window.location.pathname.split("/");
        let id = url[(url.length - 1)];
        return id;
    }

}


