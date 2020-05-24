<div class="subtitle">
    <form action="library/admin/deleteGenre" method="POST">
        <div>
            <h2>Delete Genre</h2>
        </div>    
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idGenre">
                <option value="">select genre</option>
                {foreach from=$genres item=genre}
                    <option value="{$genre->id}">{$genre->name}</option>
                {/foreach}
            </select>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="submit" value="delete">
        </div>
    </form>
</div>