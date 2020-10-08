<?php

declare(strict_types=1);

namespace task_solutions\task2;

use task_solutions\task2\inc\Calculator;

session_start();
$inputFieldNumber = 3;
if (empty($_POST) || count($_POST) < $inputFieldNumber) {
    $_SESSION['error'] = 'Something went wrong. Please make sure that all required fields are filled.';
    header('Location: /task2');
    exit();
}

$request = $_POST;
//simple clean up and casting
array_walk($request, function (&$value, $key) {

    if ('userDateTime' === $key) {
        $value = htmlspecialchars($value);
    } else {
        $value = (int)$value;
    }
});
require_once __DIR__ . '/inc/Calculator.php';

$calculator = new Calculator($request['carValue'], $request['taxPercentage'], $request['userDateTime']);
$_SESSION['calculator-results'] = serialize($calculator->getAllData());
$_SESSION['instalmentsNumber'] = $request['instalmentsNumber'];
unset($calculator);
header('Location: /task2');
