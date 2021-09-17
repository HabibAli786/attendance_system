<?php

$con = mysqli_connect("localhost", "root", "testcase123", "staff");

	// Get values from the form
	$username = $_POST ['email'];
	$password = $_POST ['password'];

	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password); 

	// connect to the server and select database
	mysqli_select_db($con, "staff");


	// query the database for user
	$result = mysqli_query($con, "SELECT * FROM staff_id WHERE email = '$username' AND password = '$password'")
				or die ("failed to query database");

	$row = mysqli_fetch_array($result);
	if ($row['email'] == $username && $row['password'] == $password){
		echo("You have logged in");
	} else {
		echo("You cannot log onto the website");
	}




?>