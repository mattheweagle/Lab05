<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "m955e506", "Kiar9och", "m955e506");
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

      echo "USER TABLE:<br>";
      $query = "SELECT * FROM Users";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo $row["user_id"] . "<br>";
    }

    /* free result set */
    $result->free();
}

	/* close connection */
	$mysqli->close();

?>
