{include 'templates/header.tpl' }
{include 'templates/nav.tpl'}

<div class="main">
    <section>
        <article>
            <h2 class="subtitle">{$book->book_name}</h2>


            <figure>
                {*
                <img src="img/{$book->book_name}.jpg" name="{$book->book_name}">
                {$book->author}
                *}
                <figcaption>proximamente portada del libro</figcaption>
            </figure>
            <p class="wrapper">"{$book->details}"</p>
        </article>
    </section>

    <div>

    </div>

</div>

{include 'templates/footer.tpl'}