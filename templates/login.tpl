{include 'templates/header.tpl' }
    <div class="index"> 
        <div class="login">                    
            <form action="library/catalogue" method="POST">
                <input type="submit" value="acceder como invitado">  
            </form>                   
           
            <div class="subtitle">
                <h2>registro solo administrador</h2>
            </div>
        
            <form action="checking" method="POST">  
                <div>   
                    <label class="oculto"> ---------------- </label>
                </div>

                <label>UserName</label>
                <div>                
                    <input type="text" name="user">
                </div>

                <label>Password</label>
                <div>
                    <input type="text" name="pass">
                </div>

                <label class="oculto"> ---------------- </label>

                <div>
                    <input type="submit" value="login">                      
                </div>
            </form>
        </div>
    </div>
{include 'templates/footer.tpl'}