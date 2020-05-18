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
    <br><b>CLASSIFICACIONS </b><br><br>
    <article>
        <?php

        include_once '../controllerspackage/fibo_primo_Controller.php';
        include_once '../adapterspackage/MySQLAdapter.php';

        $classif_array = [];

        $query = "SELECT * FROM results";
        $db=DBConnectionFactory::getConnection();
        $classif_array = $db->executeQuery($query, $classif_array);
        echo '<table id="classificationTable">
                <tr>
                    <th>Hoy</th>
                    <th>Mañana</th>
                    <th>Miércoles</th>
                </tr>
';
        foreach ($classif_array as $classif_arrays_row)
        {

        }


//        echo '<table id="classificationTable">
//
//          <tr>
//            <th>Hoy</th>
//            <th>Mañana</th>
//            <th>Miércoles</th>
//          </tr>
//          <tr>
//            <td>Soleado</td>
//            <td>Mayormente soleado</td>
//            <td>Parcialmente nublado</td>
//          </tr>
//          <tr>
//            <td>19°C</td>
//            <td>17°C</td>
//            <td>12°C</td>
//          </tr>
//          <tr>
//            <td>E 13 km/h</td>
//            <td>E 11 km/h</td>
//            <td>S 16 km/h</td>
//          </tr>
//        </table>';



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





