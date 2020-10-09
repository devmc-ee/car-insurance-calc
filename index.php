<?php  declare(strict_types=1);
session_start();
define('ROOT_DIR', __DIR__);

$request = $_SERVER['REQUEST_URI'];

// define the uri path to index.php if it is not after the domain name; default is

$home_uri = json_decode(
					  file_get_contents( 'package.json' ), true )['home_uri'];

define('HOME_URI',$home_uri);


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insly-Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <ul class="nav tasks-menu">
        <li class="tasks-menu__item"><a href="<?=HOME_URI?>?task=1">Task 1</a></li>
        <li class="tasks-menu__item"><a href="<?=HOME_URI?>?task=2">Task 2</a></li>
        <li class="tasks-menu__item"><a href="<?=HOME_URI?>?task=3">Task 3</a></li>
    </ul>
</nav>

<div class="task-container">
    <div class="task-wrapper">
		<?php
		if (HOME_URI === $request) {
			echo 'Please select the task';
		} else {
			//simple routing
			include ROOT_DIR.'/views/task' . $_GET['task'] . '.php';
		}
		?>
    </div>
</div>
</body>
</html>

<?php session_destroy(); ?>