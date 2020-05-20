{include 'templates/header.tpl' }
    <div class="index"> 
        {if isset($msj) }
            <h2>{$msj}</h2>
        {/if}    

        <div class="login">                    
            <form action="library/home" method="POST">
                <input type="submit" value="acceder como invitado">  
            </form>                   
           
            <div class="subtitle">
                <h2>Registro administrativo</h2>
            </div>
        
            <form action="library/checking" method="POST">  
                <div>   
                    <label class="oculto"> ---------------- </label>
                </div>

                <label>UserName</label>
                <div>                
                    <input type="text" name="user">
                </div>

                <label>Password</label>
                <div>
                    <input type="password" name="password">
                </div>

                <label class="oculto"> ---------------- </label>

                <div>
                    <input type="submit" value="login">                      
                </div>
            </form>
        </div>
    </div>
