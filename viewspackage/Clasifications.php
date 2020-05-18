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

        $query = "SELECT * FROM results ORDER BY punts DESC";
        $db=DBConnectionFactory::getConnection();
        $classif_array[] = $db->executeQuery($query, $classif_array);
        echo '<table id="classificationTable">
                <tr>
                    <th>actividad</th>
                    <th>usuario</th>
                    <th>puntuación</th>
                </tr>
        ';
        foreach ($classif_array as $classif_arrays_row)
        {
            echo '<tr>
                    <td>'.$classif_arrays_row['codi_act'].'</td> 
                    <td>'.$classif_arrays_row['codi_user'].'</td> 
                    <td>'.$classif_arrays_row['punts'].'</td>
                  </tr>';
        }
        echo '</table>';


        ?>

    </article>
</section>

<footer>
    <div class="darkstyle">
        <a><b> Autor: Marc Aguilar Conquistador de Errores</b> </a>
    </div>
</footer>
</body>
</html>





