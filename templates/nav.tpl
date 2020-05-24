<div class="side">
    <div class="subtitle">
        <h2>Generos</h2>
    </div>
    <nav>
        <ul>
            {foreach from=$genres item=genre}
                <li><a href="library/home/{$genre->name}">{$genre->name} </a></li>
            {/foreach}
            <li><a href="library/home/allBooks">Todos los libros</a></li>
        </ul>
    </nav>
</div>