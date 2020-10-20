<?php

declare(strict_types=1);


require_once '../vendor/autoload.php';

use CarInsurance\inc\Calculator;
use CarInsurance\inc\CalculatorResultsView;

$inputFieldNumber = 3;
if (empty($_POST) || count($_POST) < $inputFieldNumber) {
    exit(json_encode(['error'=>'Something went wrong. Please make sure that all required fields are filled.',
        'request_data'=>$_POST]));
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

$calculator = new Calculator($request['carValue'], $request['taxPercentage'], $request['userDateTime']);

$resultViewBuilder = new CalculatorResultsView($calculator->getAllData(),(int) $request['instalmentsNumber']);

echo json_encode(['html'=>$resultViewBuilder->getTable()]);

unset($calculator);
die();