{include 'templates/header.tpl'}
<div class="side">
    <div class="wrapper ">
        <button name="botones_forms" value="books">
            <h2>Add/delete book</h2>
        </button>
    </div>
    <div class="wrapper ">
        <button name="botones_forms" value="generos">
            <h2>Genres</h2>
        </button>
    </div>
    <div class="wrapper ">
        <button name="botones_forms" value="usuarios">
            <h2>Users</h2>
        </button>
    </div>

</div>
<div class="main">
    <div class="wrapper" id="books">
        <div class="none" id="book-add">
            {include 'templates/form-add-book.tpl'}
        </div>
        <div class="none" id="books-edit">
            {include 'templates/form-edit-book.tpl'}
        </div>
        <div class="" id="cover-edit">
            {include 'templates/formImages.tpl'}
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

</div>
<script type="text/javascript" src="js/adminActions.js"></script>
{include 'templates/footer.tpl'}