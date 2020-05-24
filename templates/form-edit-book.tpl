<div class="form-center">
    <form action="library/admin/editBook" method="POST">
        <label class="oculto"> ---------------- </label>
        <div>
            <h2>Edit Book</h2>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idBook">
                <option value="">Select Book</option>
                {foreach from=$books item=book}
                    <option value="{$book->book_id}">{$book->book_name}</option>
                {/foreach}
            </select>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="text" name="newName" placeholder="new name">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="text" name="newAuthorName" placeholder="new author name">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <textarea name="details" rows="12" placeholder="details"></textarea>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idGenreFk">
                <option value="">select new genre</option>
                {foreach from=$genres item=genre}
                    <option value="{$genre->id}">{$genre->name}</option>
                {/foreach}
            </select>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="submit" value="edit">
        </div>
    </form>
</div>