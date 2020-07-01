{foreach from=$books item=book}
    <div class="wrapper details">
        <div class="writer">
            <h3> <a href='library/book/{$book->book_id}'>{$book->book_name}</a></h3>
            <p class="detailsShort">
                "{$book->details|truncate:200}..."<a href='library/book/{$book->book_id}'><span>
                        < ver mas>
                    </span></a>
            </p>
        </div>
        <div class="genre">
            <figure>
                <a href='library/book/{$book->book_id}'>
                    <img class="min_img" src="{$book->img}" alt="no image" name="{$book->book_name}">
                </a>
            </figure>
    
            <p class="detailsShort">{$book->genre}
            <p>
        </div>
    </div>
{/foreach}