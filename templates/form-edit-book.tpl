<div class="form-center">
    <form action="library/admin/editBook" method="POST">
        <div>
            <h2>Edit Book</h2>
        </div>
        <label class="oculto"> ---------------- </label>
        <input class="oculto" type="text" name="idBook" id="idBook" value="">
        <div>
            <input type="text" name="newName" id="newName">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="text" name="newAuthorName" id="newAuthorName">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <textarea name="details" rows="15" id="details"></textarea>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idGenreFk" id="idGenreFk">
                <option value="">select new genre</option>
                {foreach from=$genres item=genre}
                    <option value="{$genre->id}">{$genre->name}</option>
                {/foreach}
            </select>
            <input type="submit" value="edit">
        </div>
    </form>
</div>