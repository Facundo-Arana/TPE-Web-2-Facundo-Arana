<?php

class view
{
    public function principalView($url){
        echo('aca va el index');
    }

    function home()
    {
        echo '
        <html lang="en">

        <head>
        <!-- <base href="' . URLBASE . '"> -->
            <title>Universidad del alto Perú</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css/style.css">
            <script src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="js/js.js"></script>
        </head>

        <body>
            <header>

                <div>

                    <figure>
                        <img src="img/libary.jpg" name="logo">
                    </figure>

                </div>

                <section class="login">

                    <div>

                        <form action="checking" method="POST">

                            <label>Username</label>

                            <input type="text" name="user">

                            <label>Password</label>
                            
                            <input type="text" name="pass">
                            
                            <label>ocultar</label>
                            
                            <input type="submit" value="login">
                        
                        </form>

                    </div>

                    <div>

                        <h1>virtual library</h1>

                    </div>

                </section>

            </header>

            <div class="conteiner">

                <div class="side">

                    <nav>

                        <h2>catalogo</h2>

                        <ul>
                            <li>aaaa</li>
                            <li>bbbb</li>
                            <li>cccccccc</li>
                            <li>ddddddddddddd</li>
                            <li>eeeeeeeeeee</li>
                            <li>ffffffffffffff</li>
                            <li>ggggggggggggggggggggggg</li>
                            <li>hhhhhhhhhhhh hhhhhhhhhh</li>
                            <li>i</li>
                            <li>jj</li>
                            <li>kkkkkkkkkkkkkkkkkkkkkkkkk</li>
                            <li>ll</li>
                            <li>mm</li>
                            <li>nn</li>
                        </ul>

                    </nav>

                </div>

                

                <div class="main">
                
                    <div class="wrapper">
                    
                        <section>

                            <article>

                                <h2>titulo</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nibh commodo, pulvinar sapien hendrerit, mattis est. 
                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                                    Ut vehicula sodales lectus et laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                                    Mauris eleifend mauris at urna dictum, eu vestibulum lorem ultrices. Fusce eleifend magna ac ex dapibus gravida. 
                                    Suspendisse condimentum feugiat tortor, ut rutrum neque pellentesque vel. Morbi luctus auctor ultrices.
                                    Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut in justo ut neque tempor rutrum nec eu nisl.
                                    Nam dictum quis libero ultrices fermentum. Donec dapibus sollicitudin nisl nec gravida. Sed et tortor vel turpis sagittis rhoncus ac at est.  
                                </p>

                            </article>
                            
                        </section>

                        <figure>
                            <img src="img/portada.jpg" name="portada">
                            <figcaption>imagen desciptiva</figcaption>                                        
                        </figure> 

                    </div>

                    <div class="wrapper">
                    
                    <section>

                        <article>

                            <h2>titulo</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nibh commodo, pulvinar sapien hendrerit, mattis est. 
                                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                                Ut vehicula sodales lectus et laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                                Mauris eleifend mauris at urna dictum, eu vestibulum lorem ultrices. Fusce eleifend magna ac ex dapibus gravida. 
                                Suspendisse condimentum feugiat tortor, ut rutrum neque pellentesque vel. Morbi luctus auctor ultrices.
                                Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut in justo ut neque tempor rutrum nec eu nisl.
                                Nam dictum quis libero ultrices fermentum. Donec dapibus sollicitudin nisl nec gravida. Sed et tortor vel turpis sagittis rhoncus ac at est.  
                            </p>

                        </article>
                        
                    </section>

                    <figure>
                        <img src="img/portada.jpg" name="portada">
                        <figcaption>imagen desciptiva</figcaption>                                        
                    </figure> 
                                           
                </div>
                    
                </div>
            </div>
        </body>
            
        </html>';
    }



}
