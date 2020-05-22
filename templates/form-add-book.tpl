<div class="form-center">
    <form action="library/admin/addBook" method="POST">
        <div>
            <h2 class="">Add Book</h2>
        </div>

        <label class="oculto"> ---------------- </label>

        <div>
            <input type="text" name="name" placeholder="nombre">
        </div>

        <label class="oculto"> ---------------- </label>

        <div>
            <input type="text" name="author" placeholder="autor">
        </div>

        <label class="oculto"> ---------------- </label>

        <div>
            <input type="text" name="details" placeholder="detalles">
        </div>

        <select name="idGenreFK">
            <option value="">select genre</option>
            {foreach from=$genres item=genre}
                <option value="{$genre->id}">{$genre->name}</option>
            {/foreach}
        </select>

        <div>
            <input type="submit" value="add">
        </div>
    </form>
</div>