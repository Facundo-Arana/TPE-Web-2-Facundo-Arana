<html lang="en">

    <head>
        <base href=" {$url} ">
        <title>TPe WEb</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>

    <body>
        <header>
            <div>
                {if !isset($username)}
                    <button class="oculto">login</button>
                {else}
                    {if $priority == 2}
                        <h2><a href="library/admin">{$username}</a></h2>
                    {elseif $priority == 1}
                        <h2><a href="library/home">{$username}</a></h2>
                    {else}
                        {if isset($inLogin)}
                            <button class="oculto">login</button>
                        {else}
                            <h2>{$username}</h2>
                        {/if}
                    {/if}
                {/if}
            </div>
            <div class="title">
                <figure>
                    <img src="img/libary1.jpg" name="logo">
                </figure>
                <div>
                    {if !isset($inLogin)}
                        <h1> <a href="library/allBooks"> Virtual Library </a></h1>
                    {else}
                        <h1>Virtual Library</h1>
                    {/if}
                </div>
                <figure>
                    <img src="img/libary1.jpg" name="logo">
                </figure>
            </div>
            <div>
                {if !isset($inLogin)}
                    {if isset($is_logged)}
                        <button id="profile">|||</button>
                        <ul id="activ" class="activ oculto">
                            <li class="item"><a href="library/profile">profile</a></li>
                            <li class="item"><a href="library/logOut">logout</a></li>
                        </ul>
                        <script src="js/userActions.js"></script>
                    {else}
                        <button><a href="library/login">login</a></button>
                    {/if}
    
                {else}
                    {if isset($is_logged)}
                        <button id="profile">|||</button>
                        <ul id="activ" class="activ oculto">
                            <li><a class="item" href="library/profile">profile</a></li>
                            <li><a class="item" href="library/logOut">logout</a></li>
                        </ul>
                        <script src="js/userActions.js"></script>
                    {else}
                        <button class="oculto">login</button>
                    {/if}
                {/if}
            </div>
        </header>

        <div class="conteiner">