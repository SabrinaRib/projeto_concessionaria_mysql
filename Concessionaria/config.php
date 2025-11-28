<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'concessionaria');
define('PORTA' , 3307);

$conn = new MySQLi(HOST, USER, PASS, BASE, PORTA);