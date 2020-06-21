{foreach from=$books item=book}
    <div class="wrapper details">
        <div class="writer">
            <h3> {$book->book_name}</h3>
            <p class="detailsShort">
                "{$book->details|truncate:100}..."<a href='library/book/{$book->book_id}'><span>< ver mas ></span></a>
            </p>
        </div>
        <div class="genre">
            <h3>Genero</h3>
            <p class="detailsShort">{$book->genre}
            <p>
        </div>
    </div>
{/foreach}