<?php
$request = $_SERVER['REQUEST_URI'];
require_once __DIR__ . '/tasks_solutions/task1/functions.php';
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insly-Test</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <ul class="tasks-menu">
        <li class="tasks-menu__item"><a href="task1">Task 1</a></li>
        <li class="tasks-menu__item"><a href="task2">Task 2</a></li>
        <li class="tasks-menu__item"><a href="Task3">Task 3</a></li>
    </ul>
</nav>
<div class="task-container">
    <div class="task-wrapper">
		<?php

		if ('/' === $request) {
			echo 'Please select the task';
		} else {
			//simple routing
			include 'views/' . $request . '.php';
		}
		?>
    </div>
</div>
</body>
</html>

