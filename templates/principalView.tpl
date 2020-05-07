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

                <li><a href="library/catalogue/{$genre->name} "> {$genre->name} </a></li>

            {/foreach}
       
            </ul>
        </nav>
    </div>       
        
       