<?php
$db = 'task3';
$user = 'root';
$pass = '';
$host = 'localhost';

//@var $sql sql_request.php


try{
	$conn= new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


	print_r($stmt->fetchAll());
}catch (PDOException $error){
	echo "Connection failed: " . $error->getMessage();
}
