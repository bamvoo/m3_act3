<?php

declare(strict_types=1);

function operation(int $value1, int $value2, string $oper): int {
    $result = null;
    switch ($oper) {
        case "+": $result = $value1 + $value2;
            break;
        case "-": $result = $value1 - $value2;
            break;
        case "*": $result = $value1 * $value2;
            break;
        case "/": $result = (int) ($value1 / $value2);
    }
    return $result;
}
