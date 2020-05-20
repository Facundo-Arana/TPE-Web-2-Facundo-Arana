{include 'templates/header.tpl'}

<div class="main">


    {if isset($text)}
        <div class="error">
            <h2>{$text}</h2>
            <a href="library/home"><img src="img/error.jpg" class="img-error" /></a>
        </div>
    {/if}

    {if isset($msj)}
        <div class="error">
            <h2>{$msj}</h2>
            <a href="library/admin"><img src="img/error.jpg" class="img-error" /></a>
        </div>
    {/if}


</div>

{include 'templates/footer.tpl'}