<?php
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

if($result->num_rows == 0)
{
	$_SESSION['message'] = "User with that email doesn't exist";
	header("location: error.php");
}
else
{
	$user = $result->fetch_assoc();

	if(password_verify($_POST['password'], $user['password']))
	{
		$_SESSION['email'] = $user['email'];
		$_SESSION['username'] = $user['login'];
		$_SESSION['logged_in'] = true;

		header("location: profile.php");
	}
	else
	{
		$_SESSION['message'] = "Wrong password";
		header("location: error.php");
	}
}
?>
