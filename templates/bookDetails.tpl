{include 'templates/header.tpl' }
{include 'templates/nav.tpl'}

<div class="main">
    <section >
        <article >
            <h2 class="subtitle1">{$book->name}</h2>
            <figure>
                <img src="img/{$book->name}.jpg" name="{$book->name}">
                <figcaption>{$book->author}</figcaption>                                        
            </figure> 
                <p class="wrapper">{$book->details}</p>
            </article>                           
    </section>

    <div>
        
    </div>

</div>  

{include 'templates/footer.tpl'}