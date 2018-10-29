<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$username = $_POST['username'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "m955e506", "Kiar9och", "m955e506");
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
 
$query = "SELECT * FROM Posts WHERE author_id = '$username'";

echo "Post table for " . $username . ":<br>";


if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "Post ID: " . $row["post_id"] . " Content: " . $row["content"] . " Author ID: " . $row["author_id"] . "<br>";
    }

    /* free result set */
    $result->free();
}

	/* close connection */
	$mysqli->close();

?>
