<?php

include_once 'pdoConnect.php';

if(!isset($_REQUEST['fname'])){
	header('HTTO/1.1 500 Internal Server Error');
	exit("ERROR: There was an error writing to the database. No fname data provided.");
}

$params = array(
	/*":email" => $_REQUEST['email'],
	":password" => $_REQUEST['password'],*/
    ":fname" => $_REQUEST['fname']
    ":lname" => $_REQUEST['lname'],
    ":phone" => $_REQUEST['phone'],
    ":birthday" => $_REQUEST['birthday'],
    ":gender" => $_REQUEST['gender']
);

$results = prepareAndExecute('UPDATE accounts (fname, lname, phone, birthday, gender)
							VALUES (:fname, :lname, :phone, :birthday, :gender)', $params);

if ($results == NULL || !is_numeric($results)) {
	header('HTTO/1.1 500 Internal Server Error');
	exit("ERROR: There was an error writing to the database.");
}

//echo $results

?>