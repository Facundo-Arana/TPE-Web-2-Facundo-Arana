<?php
include_once('index.php');


class view
{


    /**
     *  Muestrael index.php
     * 
     */
    public function showIndex()
    {
        echo callIndex();
    }



    /**
     *  Muestra los libros de un genero especifico.
     * 
     */
    public function showBooksByGenre($listGenres,$booksByGenre)
    {
        echo $this->getHeader();
        echo $listGenres;
        echo $booksByGenre;
        echo $this->closeHtml();
    }

    /**
     *  Muestra la pagina para navegar por el sitio.
     *  
     * 
     */
    public function showAbout($listGenres)
    {
        echo $this->getHeader();
        echo $listGenres;
        echo $this->about();
        echo $this->closeHtml();
    }

    public function showError()
    {
        echo ('error');
    }



    /**
     *  Muestra los libros buscados.
     *  $catalogue es el arreglo que fue traido desde la db con los datos de la tabla 'catalogue'.
     * 
     */
    public function showBooksDatails($catalogue)
    {
        $html = ('<div class="main">');
        foreach ($catalogue as $book) {
            $html .= ('
                    <div class="wrapper">
                        <section>
                            <article>
                                <h2>' . $book->name . '</h2>
                                <p> ' . $book->details . '</p>
                            </article>                           
                        </section>
                        <figure>
                            <img src="img/' . $book->name . '.jpg" name="' . $book->name . '">
                            <figcaption>' . $book->author . '</figcaption>                                        
                        </figure> 
                    </div>
                ');
        }
        $html .= ('</div>');
        return $html;
    }


    /**
     *  Genera una lista de generos de libros.
     *  $catalogue es el arreglo que fue traido desde la db con los datos de la tabla 'literary_genre'.
     * 
     */
    public function getGenresList($catalogue)
    {
        $html = ('
            <div class="side">
                <nav>
                    <h2>generos</h2>
                    <ul>');
        foreach ($catalogue as $genre) {
            $html .= ('  <li><a href="library/catalogue/' . $genre->name . '">' . $genre->name . '</a></li>');
        }
        $html .= ('
                    </ul>
                </nav>
            </div>       
        ');
        return $html;
    }


    private function getHeader()
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

            <div class="conteiner">');
        return $html;
    }

    private function about()
    {
        $html = ('   
        <div class="main">   
            <div class="wrapper">                  
                <section>
                    <article>
                        <h2>about</h2>
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
            </div>
        </div>');
        return $html;
    }

    private function closeHtml()
    {
        $html = ('
                         
            </div>   <!--conteiner-->
        </body>

        </html>');
        return $html;
    }
}
