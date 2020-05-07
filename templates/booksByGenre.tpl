{include 'templates/header.tpl'}
{include 'templates/principalView.tpl'}

<div class="main">

    {foreach from=$main item=book}
            
        <div class="wrapper">
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
          
    {/foreach}   

</div>
       

{include 'templates/footer.tpl'}