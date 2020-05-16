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
                        <a href="UserAccountView.php" class="optmenu">COMPTE USUARI</a>
                        <a href="MathChallengeView.php" class="optmenu">MATEMÀTIQUES</a>
                        <a href="BlankPage.php" class="optmenu">PUZZLES</a>
                        <?php
                            include '../adapterspackage/MySQLAdapter.php';
//                            include '../adapterspackage/DBConnectionFactory.php';
                            include '../controllerspackage/LevelController.php';
                            include '../controllerspackage/ActivityDAO.php';


                            $db = DBConnectionFactory::getConnection();
                            $username = filter_input(INPUT_COOKIE, 'username');
                            $level = filter_input(INPUT_COOKIE, 'userlevel');

                        //                                $user_lvl = executeQuery('select level from users where name = $username');
                            var_dump(selectLevelFibo());
                            if (selectLevelFibo() <= $level) {
                                echo '<a href="Tests_Fibo_View.php" class="optmenu">TEST NUM FIBOS</a>';
                            }
                            if (selectLevelPrimo() <= $level) {
                                echo '<a href="Tests_Primo_View.php" class="optmenu">TEST NUM PRIMOS</a>';
                            }


//                        $data=[];
//
//                        tablaActivity($data);
//
//                        foreach($data as $actividades) {
//
//                            if ($_COOKIE['userlevel'] == 1 && $actividades['nivell'] == 1) {
//
//                                echo "<a href='" . $actividades['nom'] . "ChallengeView.php'>" . $actividades['nom'] . "</a>";
//
//                            } else if ($_COOKIE['userlevel'] == 2 && $actividades['nivell'] < 3) {
//                                echo "<a href='" . $actividades['nom'] . "ChallengeView.php'>" . $actividades['nom'] . "</a>";
//
//                            } else if ($_COOKIE['userlevel'] == 3 && $actividades['nivell'] < 3) {
//                                echo "<a href='" . $actividades['nom'] . "ChallengeView.php'>" . $actividades['nom'] . "</a>";
//                            }
//                        }
                        ?>


                        <a href="BlankPage.php" class="optmenu">JOCS</a>
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
            <h3>BENVINGUT AL PORTAL</h3>
            <article>
                <?php
                $username = filter_input(INPUT_COOKIE, 'username');
                $level = filter_input(INPUT_COOKIE, 'userlevel');
                $points = filter_input(INPUT_COOKIE, 'userpoints');
                print "<h3>Usuari: $username </h3>";
                print "Nivell: $level";
                print "<br><br>Punts: ".(int)$points."<br><br>";
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