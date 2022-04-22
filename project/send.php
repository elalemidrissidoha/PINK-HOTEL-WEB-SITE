<?php


if (isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['nbf'])&& isset($_POST['message'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$nbf = validate($_POST['nbf']);
	$message = validate($_POST['message']);

	if (empty($name) || empty($message) || empty($nbf) || empty($message)) {
		header("Location: index.html");
	}else {

		$sql = "INSERT INTO test(name, email, nbf, message) VALUES('$name', '$email', '$nbf', '$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}


		header( "refresh:3; url=http://localhost/project/index.html" );
	}


}
