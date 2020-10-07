<?php
session_start();
$_SESSION['calculator-results'] = 100;
header('Location: /task2');
