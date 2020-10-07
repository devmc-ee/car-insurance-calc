<?php declare(strict_types=1);
session_start();

$inputFieldNumber = 3;
if (empty($_POST) || count($_POST) < $inputFieldNumber) {
	$_SESSION['error'] = 'Something went wrong. Please make sure that all required fields are filled.';
	header('Location: /task2');
	exit();
}
$request = $_POST;
array_walk($request, function (&$value, $key) {
	if ('userDateTime' === $key) {
		$value = htmlspecialchars($value);
	} else {
		$value = (int)$value;
	}

});
var_dump($request);



require_once __DIR__ . '/inc/Calculator.php';

$calculator = new Calculator(
	$request['carValue'],
	$request['taxPercentage'],
	$request['instalmentsNumber'],
	$request['userDateTime']);
echo '<pre>';
print_r($_POST);
echo '</pre>';