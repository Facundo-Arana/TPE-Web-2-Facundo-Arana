<div class="form-center">
    <form action="library/admin/addBook" method="POST" enctype="multipart/form-data">
        <div>
            <h2>Add Book</h2>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <select name="idGenreFK">
                <option value="">select genre</option>
                {foreach from=$genres item=genre}
                    <option value="{$genre->id}">{$genre->name}</option>
                {/foreach}
            </select>
            <input type="text" name="name" placeholder="name">
            <input type="text" name="author" placeholder="autor">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <textarea name="details" rows="6" placeholder="details"></textarea>
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="file" name="img_name" id="imageToUpload">
        </div>
        <label class="oculto"> ---------------- </label>
        <div>
            <input type="submit" value="add">
        </div>
    </form>
</div>