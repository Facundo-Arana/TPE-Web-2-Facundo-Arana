<div class="form-center">
    <form action="library/admin/addBook" method="POST">
        <label class="oculto"> ---------------- </label>
        <div>
            <h2 class="">Add Book</h2>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idGenreFK">
                <option value="">select genre</option>
                {foreach from=$genres item=genre}
                    <option value="{$genre->id}">{$genre->name}</option>
                {/foreach}
            </select>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="text" name="name" placeholder="name">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="text" name="author" placeholder="autor">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <textarea name="details" rows="12" placeholder="details"></textarea>
        </div>
        <label class="oculto"> ---------------- </label>

        <div>
            <input type="submit" value="add">
        </div>
    </form>
</div>