{include 'templates/header.tpl' }
{include 'templates/nav.tpl'}

<div class="main">
    <section>
        <div class="wrapper">
            <div>
                <figure>
                    <img src="{$book->img}" name="{$book->book_name}">
                </figure>

            </div>
            <div >
                <h2 class="subtitle">{$book->book_name}</h2>
                <p>"{$book->details}"</p>
            </div>
    </section>
</div>

{include 'templates/footer.tpl'}