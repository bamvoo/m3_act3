<?php
//pasar cosas de aquí a la vista

//funciones fibonacci
function crearFibo($array_fibo):int{

    $a = 2;
    $b = 1;
    $c = 0;
    $array_fibo[0] = 0;
    $array_fibo[1] = 1;
    for($n= 2;$n < 18;$n++ ){
        //2 3 5 8 13 ...
        $c = $b + $a;
        $array_fibo[$n] = $a ;
        $b = $a;
        $a = $c;
    }
    return  $array_fibo;
}

function comprobarFibo( int $n ):boolean{

    $result = false;
    $array_fibo = [];
    crearFibo($array_fibo);
    foreach ($array_fibo as $pos_array){
        if($pos_array == $n)
            return true;
    }
    return $result;
}

function randFibo(){
    $array_fibo = [];
    crearFibo($array_fibo);
    $random = rand(0,19);
    return $array_fibo[$random];
}

//funciones de números primos

function crearPrimo($array_primo):int{

    for($n= 0;$n < 20;$n++ ){
        for($m = 0;$m < 20;$m++){
            if($m % $m == 0 and $m % 1 == 0){
                $array_primo[$n] = $m;
            }
        }
    }
    return $array_primo;
}

function comprobarPrimo( int $n ):boolean{

    $result = false;
    $array_primo = [];
    crearPrimo($array_primo);
    foreach ($array_primo as $pos_array){
        if($pos_array == $n)
            return true;
    }
    return $result;
}

function randPrimo(){
    $array_primo = [];
    crearFibo($array_primo);
    $random = rand(0,19);
    return $array_primo[$random];
}

/////////////////////////////////////////////////
function challenge(): string {
    //para cuando el session challenge complete es 1 es que se ha completado y hay que sacar los puntos a pasear
    if (isset($_SESSION['challengecompleted']) and $_SESSION['challengecompleted'] == 1) {
        $points = userRewards();
        finishchallenge();
        return "CONGRATS! CHALLENGE COMPLETED!<br><br>Has aconsseguit $points punts dels 1.000 possibles";
    }
    //si no está inicializado llama a la función para inicializar
    if (isset($_SESSION['initialized']) == null) {
        initchallenge();
    }

    $_SESSION['value1'] = rand(1, 1500);
    return ($_SESSION['value1']);

//    if($_SESSION['fibo&primo'] = 0) {
//        $_SESSION['v0'] = rand(1, 3);
//        $_SESSION['v1'] = randFibo();
//        $_SESSION['v2'] = rand(1, 810);
//        $_SESSION['v3'] = rand(1, 810);
//        if ($_SESSION['v0'] == 1)
//            return ($_SESSION['v3'] . " - " . $_SESSION['v1'] . " - " . $_SESSION['v2']);
//        elseif ($_SESSION['v0'] == 2)
//            return ($_SESSION['v1'] . " - " . $_SESSION['v2'] . " - " . $_SESSION['v3']);
//        else
//            return ($_SESSION['v2'] . " - " . $_SESSION['v3'] . " - " . $_SESSION['v1']);
//    }
//    else{
//        $_SESSION['v0'] = rand(1, 3);
//        $_SESSION['v1'] = randPrimo();
//        $_SESSION['v2'] = rand(1, 810);
//        $_SESSION['v3'] = rand(1, 810);
//        if ($_SESSION['v0'] == 1)
//            return ($_SESSION['v3'] . " - " . $_SESSION['v1'] . " - " . $_SESSION['v2']);
//        elseif ($_SESSION['v0'] == 2)
//            return ($_SESSION['v1'] . " - " . $_SESSION['v2'] . " - " . $_SESSION['v3']);
//        else
//            return ($_SESSION['v2'] . " - " . $_SESSION['v3'] . " - " . $_SESSION['v1']);
//    }

}
/////////////////////////////////////////////////
/* Hacer que pregunte 4 veces seguidas si es fibo o no un número  */
function initchallenge() {
    $_SESSION['initialized'] = 1;
    $_SESSION['gamelevel'] = 1;
    //    $_SESSION['fibo&primo'] = 0;
    $_SESSION['attempts'] = 0;
    $_SESSION['numoperssuccess'] = 0;
    $_SESSION['challengecompleted'] = 0;
}

//si es correcto te lleva al siguiente level
function checkP(int $result_n, string $result_t): bool {

    $_SESSION['attempts'] = $_SESSION['attempts'] + 1;

    if (comprobarPrimo($result_n) == true and $result_t == "si" ) {
        $_SESSION['numoperssuccess'] = $_SESSION['numoperssuccess'] + 1;
        if ($_SESSION['numoperssuccess'] == 3) {
            if ($_SESSION['gamelevel'] == 4) {
                $_SESSION['challengecompleted'] = 1;
            } else {
                $_SESSION['gamelevel'] = $_SESSION['gamelevel'] + 1;
                $_SESSION['numoperssuccess'] = 0;
            }
        }
        return true;
    } elseif(comprobarPrimo($result_n) == false and $result_t == "no" ) {
        $_SESSION['numoperssuccess'] = $_SESSION['numoperssuccess'] + 1;
        if ($_SESSION['numoperssuccess'] == 3) {
            if ($_SESSION['gamelevel'] == 4) {
                $_SESSION['challengecompleted'] = 1;
            } else {
                $_SESSION['gamelevel'] = $_SESSION['gamelevel'] + 1;
                $_SESSION['numoperssuccess'] = 0;
            }
        }
        return true;
    } else{
        $_SESSION['numoperssuccess'] = 0;
        return false;
    }
}
//si es correcto te lleva al siguiente level
function checkF(int $result): bool {

    $_SESSION['attempts'] = $_SESSION['attempts'] + 1;

    if (comprobarFibo($result) == true) {
        $_SESSION['numoperssuccess'] = $_SESSION['numoperssuccess'] + 1;
        if ($_SESSION['numoperssuccess'] == 3) {
            if ($_SESSION['gamelevel'] == 4) {
                $_SESSION['challengecompleted'] = 1;
            } else {
                $_SESSION['gamelevel'] = $_SESSION['gamelevel'] + 1;
                $_SESSION['numoperssuccess'] = 0;
            }
        }
        return true;
    } else{
        $_SESSION['numoperssuccess'] = 0;
        return false;
    }
}
//cambiar entre operadores
//function oper() {
//    switch ($_SESSION['gamelevel']) {
//        case 1: $_SESSION['oper'] = "+";
//            break;
//        case 2: $_SESSION['oper'] = "-";
//            break;
//        case 3: $_SESSION['oper'] = "*";
//            break;
//        case 4 : $_SESSION['oper'] = "/";
//            break;
//    }
//}

function gamelevel() {
    return $_SESSION['gamelevel'];
}

function attempts() {
    return $_SESSION['attempts'];
}

function numoperssuccess() {
    return $_SESSION['numoperssuccess'];
}

function finishchallenge() {
    unset($_SESSION['initialized']);
    unset($_SESSION['gamelevel']);
    unset($_SESSION['attempts']);
    unset($_SESSION['numoperssuccess']);
    unset($_SESSION['challengecompleted']);
}

//esta le da los puntos al usuario al pasar la prueba
function userRewards():int {
    $gamepoints = (12 / (int)$_SESSION['attempts']) * 1000;
    $points = $gamepoints + (int)filter_input(INPUT_COOKIE, 'userpoints');

    setcookie('userpoints', $points, 0, '/', 'localhost');
    $level = (int)filter_input(INPUT_COOKIE, 'userlevel');
    if ($level == 1) {
        $level++;
        setcookie('userlevel', $level, 0, '/', 'localhost');
    }
    $dbconnection = DBConnectionFactory::getConnection();
    $user = new User((int)filter_input(INPUT_COOKIE, 'userid'),
            filter_input(INPUT_COOKIE, 'username'),
            $level, $points);
    $dbuser = new UserDAO($user, $dbconnection);
    $dbuser->updateStatus();
    return $gamepoints;
}