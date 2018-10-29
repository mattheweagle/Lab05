<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$username = $_POST['username'];
	$post = $_POST['post'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "m955e506", "Kiar9och", "m955e506");
  $userExists = false;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

  $query = "SELECT * FROM Users";

  if ($result = $mysqli->query($query)) {

      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          if($username == $row["user_id"]){
            $userExists = true;
          }
      }
  }
  if(!$userExists){
      printf("User does not exist");
  }
  else if($post == ""){
	  printf("Post cannot be blank");
  }
  else{
    $insertPost = "INSERT INTO Posts (content,author_id) VALUES ('$post','$username')";

      if ($mysqli->query($insertPost) === TRUE) {

          printf("successfully added post");
      }
        else{
          printf("unable to add post");
        }



  }


	/* close connection */
	$mysqli->close();

?>
