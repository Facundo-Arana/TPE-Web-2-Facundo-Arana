{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}
<div class="main">
    <h2 class="subtitle">Resultados</h2>
    {foreach from=$main item=book} {* obtengo solo las primeras 20 palabras de la descripcion del libro *}
        {$split = explode(" ", $book->details)}
        {$words = array()}
        {for $i = 0 to 20}
            {$words[] = $split[{$i}]}
        {/for}
        {$details = implode(" ", $words)}
        <div class="wrapper">
            <div class="writer">
                <h3>{$book->author}: {$book->name}</h3>
                <p class="detailsShort">
                    {$details}..."<a href='library/home/{$genero}/{$book->id}'><span>< ver mas></span></a>
                </p>
            </div>
            <div class="genre">
                <h3>Genero</h3>
                <p class="detailsShort">{$book->genre}
                <p>
            </div>
        </div>
    {/foreach}
</div>
{include 'templates/footer.tpl'}