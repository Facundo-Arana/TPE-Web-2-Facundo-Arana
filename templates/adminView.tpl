{include 'templates/header.tpl'}
<div class="side">
    <div class="wrapper formularios">
        <button name="formularios" value="add-book">
            <h2>Add/delete book</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="edit-book">
            <h2>Edit book</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="generos">
            <h2>Genres</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="usuarios">
            <h2>Users</h2>
        </button>
    </div>
    <div class="wrapper formularios">
        <button name="formularios" value="comentarios">
            <h2>Comments</h2>
        </button>
    </div>
</div>
<div class="main">
    <div class="wrapper" id="books">
        <div class="" id="books-forms">
            <div>
                {include 'templates/form-add-book.tpl'}
                {include 'templates/form-delete-book.tpl'}
            </div>
        </div>
        <div class="none" id="books-edit">
            <div>
                {include 'templates/form-edit-book.tpl'}
                {include 'templates/formImages.tpl'}
            </div>
        </div>
        <div>
            {include 'templates/table-books.tpl'}
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

    <div class="wrapper none" id="users-form">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
{include 'templates/footer.tpl'}