<?php
	$servername = "sql2.njit.edu";
    $username = "rjc37";
    $password = "cosette2";
    $dbname = "rjc37";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
                                      }


if(!isset($_REQUEST['task'])){
	header('HTTO/1.1 500 Internal Server Error');
	exit("ERROR: There was an error writing to the database. No task data provided.");
}

$params = array(
	/*":createdate" => $_REQUEST['createdate'],
	":duedate" => $_REQUEST['duedate'],*/
     ":task" => $_REQUEST['task']
);

$results = prepareAndExecute('INSERT INTO my_tasks (task)
							VALUES (:task)', $params);

if ($results == NULL || !is_numeric($results)) {
	header('HTTO/1.1 500 Internal Server Error');
	exit("ERROR: There was an error writing to the database.");
}

//echo $results

/*
$sql = "SELECT duedate, task FROM my_tasks WHERE id = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<br> Due Date: ". $row["duedate"]. " " . $row["task"] . "<br>";
}
} else {
    echo "0 results";
}

/*


?>
