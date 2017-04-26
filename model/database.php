<?php

	//$dsn = 'mysql:host-localhostldbname='accounts';
	$hostname = 'sql2.njit.edu';
	$username = 'rjc37';
	$password = 'cosette2';
	$database = 'rjc37';

    try {
        
        //$db = new PDO($dsn, $username, $password);
        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
       // include('database_error.php');
	   echo $Exception->getMessage();
        exit();
    }

?>