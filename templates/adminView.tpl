{include 'templates/header.tpl'}
<div class="side">
    {include 'templates/form-add-genre.tpl'}
    {include 'templates/form-edit-genre.tpl'}
    {include 'templates/form-delete-genre.tpl'}
</div>
<div class="main">
    {if isset($msj)}
        <h2>{$msj}</h2>
    {/if}
    <div class="wrapper">
        {include 'templates/form-add-book.tpl'}
        {include 'templates/form-edit-book.tpl'}
        {include 'templates/form-delete-book.tpl'}
    </div>
</div>



{include 'templates/footer.tpl'}