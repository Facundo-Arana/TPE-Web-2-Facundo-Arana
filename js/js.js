"use strict";
//document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    alert('aaaa');
    
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
}