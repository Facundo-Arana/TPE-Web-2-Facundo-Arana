<html lang="en">

    <head>
        <base href=" {$url} ">
        <title>TPe WEb</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/js.js"></script>
    </head>

    <body>
        <header>
            {if isset($user)}
                <div>
                    <h2>{$user}</h2>
                </div>
            {/if}
            <div class="title">
                <figure>
                    <img src="img/libary.jpg" name="logo">
                </figure>

                <div>
                    <h1> <a href=""> Virtual Library </a></h1>
                </div>

                <figure>
                    <img src="img/libary1.jpg" name="logo">
                </figure>
            </div>
            {if isset($user)}
                <div>
                    <button><a href="library/logOut"> Log Out </a></button>
                </div>
            {/if}
        </header>

        <div class="conteiner">
            {*
            <div>
                <form action="search" method="POST">

                    <input type="text" name="userSearch" placeholder="search" class="oculto">

                    <input type="submit" value="send" class="oculto">
                </form>
            </div>
            *}