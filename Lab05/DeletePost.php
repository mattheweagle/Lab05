<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$checkboxes = $_POST['checkbox'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "m955e506", "Kiar9och", "m955e506");
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
 
	for($i = 0; $i< sizeof($checkboxes); $i++){
		$query = "DELETE FROM Posts WHERE post_id = '$checkboxes[$i]'";
		if($mysqli->query($query) === TRUE){
			echo "Post " . $checkboxes[$i] . " deleted successfully<br>";
		}
		else{
			echo "Error deleting record: " . $mysqli->error;
		}
			
	}
	

	/* close connection */
	$mysqli->close();

?>