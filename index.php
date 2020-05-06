<?php

function CallIndex()
{
    $html = ('
        <html lang="en">
        <head>
            <base href=' . URLBASE . '> 
            <title>TPe WEb</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css/style.css">
            <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="js/js.js"></script>
        </head>

        <body>
            <div class="index"> 
                <div class="login">                    
                    <form action="library/catalogue" method="POST">
                        <input type="submit" value="acceder como invitado">  
                    </form>
                    
                    <div>   
                        <div class="subtitle">
                            <h2>registro para administrador</h2>
                        </div>
                        <form action="checking" method="POST">                     
                            <label>admin</label>
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

            </div>
                
        </body>
        </html>
    ');
    return $html;
}
