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

  if($username == ""){
      printf("Username can't be blank");
  }
  else{

    $query = "INSERT INTO Users (user_id) VALUES ('$username')";

      if ($mysqli->query($query) === TRUE) {

          printf("Successfully added user");
      }
        else{
          printf("Unable to add user");
        }



  }


	/* close connection */
	$mysqli->close();

?>
