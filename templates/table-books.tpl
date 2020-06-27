<div class="form-center">
    <div>
        <h2>All Books</h2>
    </div>
    <label class="oculto"> ---------------- </label>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>description</th>
                    <th>cover</th>
                    <th>genre</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$books item=book}
                    <tr>
                        <td>{$book->book_name|truncate:30}</td>
                        <td>{$book->author|truncate:30}</td>
                        <td>{$book->details|truncate:30}</td>
    
                        {if ($book->img)}
                            <td>
                                <img class="min_img" name="change_covers" src="{$book->img}" alt="{$book->book_id}" />
                            </td>
                        {else}
                            <td>
                                <a name="change_covers" value="{$book->book_id}"><img class="min_img" alt="no image" /></a>
                            </td>
                        {/if}
    
                        <td>{$book->genre|truncate:30}</td>
                        <form action="library/admin/deleteBook" method="POST">
                            <td>
                                <input type="text" class="none" name="idBook" value="{$book->book_id}">
                                <input type="submit" value="delete">
                            </td>
                        </form>
                        <td>
                            <button name="selectedToEdit" value="{$book->book_id}">edit</button>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

</div>