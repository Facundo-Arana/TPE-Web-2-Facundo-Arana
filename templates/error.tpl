{include 'templates/header.tpl'}
<div class="main">
    <div class="error">
        <h2>{$text}</h2>
        {if $number eq 0}
            <a href="library/home"><img src="img/error.jpg" class="img-error" /></a>  
        {elseif $number eq 1} 
            <a href="library/admin"><img src="img/error.jpg" class="img-error" /></a>
        {/if}
    </div>
</div>
{include 'templates/footer.tpl'}