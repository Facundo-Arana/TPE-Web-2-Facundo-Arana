<div class="main">
    <section>
        <article>

            <h2>{$book->name}</h2>
            <p>{$book->details}</p>
        </article>                           
    </section>

    <figure>
        <img src="img/{$book->name}.jpg" name="{$book->name}">
        <figcaption>{$book->author}</figcaption>                                        
    </figure> 
</div>  