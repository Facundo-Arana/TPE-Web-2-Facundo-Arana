{include 'templates/header.tpl'}
<div class="side">
    <div class="wrapper">
        <button id="form1">añadir libro</button>
    </div>
    <div class="wrapper">
        <button id="form2">editar libro</button>
    </div>
    <div class="wrapper">
        <button id="form3">eliminar libro o genero</button>
    </div>
    <div class="wrapper">
        <button id="form4">añadir o editar genero</button>
    </div>
</div>
<div class="main">
    <div class="wrapper">
        <div class="none" id="addBook">
            {include 'templates/form-add-book.tpl'}
        </div>
        <div class="none" id="editBook">
            {include 'templates/form-edit-book.tpl'}
        </div>
        <div class="none" id="delete">
            {include 'templates/form-delete-book.tpl'}
            {include 'templates/form-delete-genre.tpl'}
        </div>
        <div class="none" id="addGenre">
            {include 'templates/form-add-genre.tpl'}
            {include 'templates/form-edit-genre.tpl'}
        </div>
    </div>
</div>
{include 'templates/footer.tpl'}