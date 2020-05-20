{include 'templates/header.tpl'}
<div class="side">
    {include 'templates/form-new-genre.tpl'}
    {include 'templates/form-edit-genre.tpl'}
    {include 'templates/form-delete-genre.tpl'}
   
</div>

<div class="main">

    {if isset($msj)}
        <h2>{$msj}</h2>
    {/if}

</div>



{include 'templates/footer.tpl'}