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
            <div>
                {if isset($user)}
                    <h2><a href="library/admin">{$user}</a></h2>
                {else}
                    <h2 class="oculto">registrate</h2>
                {/if}
            </div>
            <div class="title">
                <figure>
                    <img src="img/libary1.jpg" name="logo">
                </figure>
                <div>
                    <h1> <a href="library/home/allBooks"> Virtual Library </a></h1>
                </div>
                <figure>
                    <img src="img/libary1.jpg" name="logo">
                </figure>
            </div>
            <div>
                {if isset($user)}
                    <button><a href="library/logOut"> Log Out </a></button>
                {else}
                    <button ><a href="">registrate</a></button>
                {/if}
            </div>
        </header>

        <div class="conteiner">