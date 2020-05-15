<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aprenentatge per Projectes</title>
        <meta charset="UTF-8">
        <meta name="title" content="Portal del Modul 3">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header  class="title">
            <h1> P H P. Aprenentatge per Projectes </h1>
            <section id="menu">
                <nav  class="darkstyle">
                    <div>
                        <a href="MainView.php" class="optmenu"> HOME</a>
                    </div>
                </nav>
            </section>
        </header>

        <aside id="leftside">
            <div class="darkstyle">
            </div>
        </aside>
        <aside id="rightside">
            <div class="darkstyle">
            </div>
        </aside>

        <section id="central">
            <a name="principal"></a>
            <br><b>CALCULATION CHALLENGE: Fibonacci </b><br><br>
            <article>
                <?php
                include_once '../controllerspackage/fibo_primo_Controller.php';

                $response = true;
                print "<b>Indica seguido si 5 números son fibonacci o no con un -si- o un -no-<br></b>";
                //comprueba el dato del check input
                if (filter_input(INPUT_POST, 'result') != null) {
                    //mete en una variable lo que contiene el input result
                    $result_string = (string) filter_input(INPUT_POST, 'result');
                    $response = checkF($result_string);
                }

                $challenge = challenge();

                if (strpos($challenge, "CONGRATS!")===false) {
                    if ($response == false){
                        print "<br><b>Resultat incorrecte.</b> Tornem a començar al nivell actual<br><br>";
                    }
                    print "<br>Nivell = " . gamelevel() . "<br>Encerts Seguits = " . numoperssuccess() . " (necesites = " . (3 - numoperssuccess()) . ")";
                    print "<br> Intent = " . attempts() . "<br><br>";
                    print "<b>Repte Actual: " . $challenge . "</b>";
                } else {
                    print "<br><b>" . $challenge . "</b><br>";
                }
                ?>

                <div id="formulario">
                    <form action = "" method="POST">
                        <input type="string" name="result" placeholder="Escriu el resultat"/>
                        <input type="submit" value="Comprobar" id="check_si" name="enviar"/>
                    </form>
                </div>
            </article>
        </section>

        <footer>
            <div class="darkstyle">
                <a><b> Autor: Marc Aguilar Conquistador de Errores</b> </a>
            </div>
        </footer>
    </body>
</html>





