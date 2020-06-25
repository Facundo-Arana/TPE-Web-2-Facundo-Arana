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
                                <img class="min_img" src="{$book->img}" />
                            </td>
                        {else}
                            <td>
                                <img class="min_img" alt="no image" />
                            </td>
                        {/if}
                        <td>{$book->genre|truncate:30}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

</div>