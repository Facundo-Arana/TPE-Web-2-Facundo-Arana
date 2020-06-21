{include 'templates/header.tpl'}
<div class="main">
    <div class="error">
        <h2>{$text}</h2>
        {if $priority eq 2}
            <a href="library/admin"><img src="img/error.jpg" class="img-error" /></a>
        {else}
            <a href="library/home"><img src="img/error.jpg" class="img-error" /></a>
        {/if}
    </div>
</div>
{include 'templates/footer.tpl'}