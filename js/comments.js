"use strict";
document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let username = document.getElementById('username').textContent;
    let priority = document.getElementById('priority').textContent;

    var commentsList = new Vue({
        el: '#comments',
        data: {
            error: false,
            username: username,
            priority: priority,
            book_comments: []
        },
        methods: {
            deleteComment: function(id){
                
               
            }
        }
    });

    var assessment = new Vue({
        el: '#assessment',
        data: {
            users_rating: 0
        }
    });

    getComments();

    function getComments() {
        let url = window.location.pathname.split("/");
        let id = url[(url.length - 1)];
        fetch('library/api/comments/' + id)
            .then(response => response.json())
            .then(book_comments => {
                if (book_comments == null) {
                    commentsList.error = true;
                }
                else {
                    commentsList.book_comments = book_comments;
                    assessment.users_rating = getPercentage(book_comments);
                }

            })
            .catch(exception => console.log(exception));
    }

    function getPercentage(book_comments) {
        let count = 0;

        for (let i = 0; i < book_comments.length; i++) {
            count += parseInt(book_comments[i].puntaje)
        }
        let rating = parseFloat((count / book_comments.length));
        return rating;
    }

}


