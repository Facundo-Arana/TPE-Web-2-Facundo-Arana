{include 'templates/header.tpl'}
<div class="side">
    <div class="wrapper formularios">
        <button id="formularios">
            <h2>Administrar Catalogo</h2>
        </button>
    </div>

    <div class="wrapper usuarios">
        <button id="usuarios">
            <h2>Administrar Usuarios</h2>
        </button>
    </div>

</div>
<div class="main">
    <div>
        <div class="wrapper" id="library-forms">
            <div>
                {include 'templates/form-add-book.tpl'}
            </div>
            <div>
                {include 'templates/form-edit-book.tpl'}
            </div>
            <div>
                {include 'templates/form-delete-book.tpl'}
                {include 'templates/form-delete-genre.tpl'}
            </div>
            <div>
                {include 'templates/form-add-genre.tpl'}
                {include 'templates/form-edit-genre.tpl'}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/adminActions.js"></script>
{include 'templates/footer.tpl'}