{include 'templates/header.tpl'}
<header>
    <div>
        <figure>
            <img src="img/libary.jpg" name="logo">
        </figure>
    </div>

    <section class="front">
        <div>
            <form action="checking" method="POST">
                <label>Username</label>

                <input type="text" name="user">

                <label>Password</label>
                            
                <input type="text" name="pass">
                            
                            
                <input type="submit" value="login">                      
            </form>
        </div>

        <div class="title">                
            <h1>virtual library</h1>
        </div>
    </section>
</header>

<div class="conteiner">

    <div class="side">
        <nav>
            <h2>generos</h2>
            <ul>
      
            {foreach from=$side item=genre} 

                {$split = explode(" ", $genre->name)}

                {if (isset($split[1]))}
                    <li><a href="library/catalogue/{$split[0]}-{$split[1]}"> {$genre->name} </a></li>
                {else}
                    <li><a href="library/catalogue/{$split[0]}"> {$genre->name} </a></li>
                {/if}   

            {/foreach}
       
            </ul>
        </nav>
    </div>       
        
       