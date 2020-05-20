{include 'templates/header.tpl'}

<div class="main">

    {if isset($msj)}
        <div class="error">
            <h2>{$msj}</h2>
            <a href="library/admin"><img src="img/success.jpg" class="img-error" /></a>
        </div>
    {/if}


</div>

{include 'templates/footer.tpl'}