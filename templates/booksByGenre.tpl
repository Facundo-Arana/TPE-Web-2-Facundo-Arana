{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

<div class="main">

    <h2 class="subtitle">resultados</h2>

    <ul>
        {foreach from=$main item=book}                
            <li class="wrapper">
                <div class="writer">
                    <h3>{$book->author}: {$book->name}</h3>

                    {$words = explode(" ", $book->details)};

                    for ($i = 0; $i < 100; $i++) {
                
                    }

                    <p class="detailsShort" id="details">
                        {}
                    </p>
                </div>
                <div>
                    <h3>genero</h3>
                    <p class="detailsShort">{$book->genre}<p>
                </div>
            </li>   
        {/foreach}   
    </ul>
</div>
       

{include 'templates/footer.tpl'}