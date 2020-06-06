{include 'templates/header.tpl' }
{include 'templates/nav.tpl'}

<div class="main">
    <section>
        <article>
            <h2 class="subtitle">{$book->book_name}</h2>
            <figure>
                
                <img src="{$book->img}" name="{$book->book_name}">
                
                <figcaption>{$book->author}</figcaption>
            </figure>
            <p class="wrapper">"{$book->details}"</p>
        </article>
    </section>
</div>

{include 'templates/footer.tpl'}