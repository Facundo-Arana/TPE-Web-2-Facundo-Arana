{include 'templates/header.tpl'}
<div class="side">
    <div class="wrapper formularios">
        <button name="formularios" value="libros">
            <h2>Libros</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="generos">
            <h2>Generos</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="usuarios">
            <h2>Usuarios</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="comentarios">
            <h2>Comentarios</h2>
        </button>
    </div>
</div>
<div class="main">
    <div>
        <div class="wrapper none" id="books-forms">
            <div>
                {include 'templates/form-add-book.tpl'}
            </div>
            <div>
                {include 'templates/form-edit-book.tpl'}
            </div>
            <div>
                {include 'templates/form-delete-book.tpl'}
            </div>
        </div>
    </div>
    <div class="wrapper none" id="genres-form">
        <div>
            {include 'templates/form-add-genre.tpl'}
        </div>
        <div>
            {include 'templates/form-edit-genre.tpl'}
        </div>
        <div>
            {include 'templates/form-delete-genre.tpl'}
        </div>
    </div>
    <div class="wrapper " id="users-form">
        <div>
            {include 'templates/form-edit-users.tpl'}
        </div>
        <div>
            {include 'templates/table-users.tpl'}
        </div>
        <div>
            {include 'templates/form-delete-user.tpl'}
        </div>
    </div>
    <div class="wrapper none" id="comments-forms">
        <div>
            {include 'templates/form-edit-comments.tpl'}
        </div>
    </div>
</div>
<script type="text/javascript" src="js/adminActions.js"></script>
{include 'templates/footer.tpl'}