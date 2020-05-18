<?php
//pasar cosas de aquí a la vista


//
//
//
//
//function initchallenge() {
//    $_SESSION['initialized'] = 1;
//    $_SESSION['gamelevel'] = 1;
//    $_SESSION['oper'] = "+";
//    $_SESSION['attempts'] = 0;
//    $_SESSION['numoperssuccess'] = 0;
//    $_SESSION['challengecompleted'] = 0;
//}
//
//function challenge(): string {
//    //para cuando el session challenge complete es 1 es que se ha completado y hay que sacar los puntos a pasear
//    if (isset($_SESSION['challengecompleted']) and $_SESSION['challengecompleted'] == 1) {
//        $points = userRewards();
//        finishchallenge();
//        return "CONGRATS! CHALLENGE COMPLETED!<br><br>Has aconsseguit $points punts dels 1.000 possibles";
//    }
//    //si no está inicializado llama a la función para inicializar
//    if (isset($_SESSION['initialized']) == null) {
//        initchallenge();
//    }
//    $_SESSION['value1'] = rand(1, 11);
//    $_SESSION['value2'] = rand(1, 11);
//    return ($_SESSION['value1'] . " " . $_SESSION['oper'] . " " . $_SESSION['value2']);
//}
//
//function gamelevel() {
//    return $_SESSION['gamelevel'];
//}
//
//function numoperssuccess() {
//    return $_SESSION['numoperssuccess'];
//}
