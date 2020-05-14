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
            <h3>COMPTE D'USUARI</h3>

            <article>
                <form action="" method="POST">
                    Entra el valor del parámetre a canviar i confirma'l.
                    <br>Marca després quin paràmetre del teu compte vols canviar<br>
                    <br><label>Nou valor : </label><input type="text" name="value"/><br>
                    <label>Confirma: </label><input type="text" name="confirmvalue"/><br>
                    Canviar Password <input type="checkbox" name="newpasswd"/>
                    <br><input type="submit" value="CANVIAR" name="enviar" />
                </form>
                <?php
                include_once '../controllerspackage/UserAccountController.php';

                if (filter_input(INPUT_POST, 'newpasswd')) {
                    if (strcmp(filter_input(INPUT_POST, 'value'), filter_input(INPUT_POST, 'confirmvalue')) == 0) {

                        if (changePassword(filter_input(INPUT_POST, 'value'))) {
                            print "<br>Password Modificat<br>";
                        } else {
                            print "<br><i>No ha estat possible modificar el password</i><br>";
                        }
                    } else {
                        print "<br><i>No coincideixen el valor i la seva confirmació</i><br>";
                    }
                }
                ?> 
            </article>
        </section>

        <footer>
            <div class="darkstyle">   
                <a><b> Autor: Jose Meseguer</b> </a>  
            </div>

        </footer>
    </body>
</html>         

