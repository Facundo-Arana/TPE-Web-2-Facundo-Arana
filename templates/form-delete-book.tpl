<div class="form-center">
    <form action="library/admin/deleteBook" method="POST">
        <div>
            <label class="oculto">---------</label>
        </div>
        <div>
            <h2 class="">Delete Book</h2>
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
            <input type="submit" value="delete">
        </div>
    </form>
</div>