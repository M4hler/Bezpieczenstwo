<?php
require 'db.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($_POST['newpassword'] == $_POST['confirmpassword'])
	{
		$new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
		$email = $_SESSION['email']; //$mysqli->escape_string($_POST['email']);
		$hash = $_SESSION['hash']; //$mysqli->escape_string($_POST['hash']);

		$sql = "UPDATE accounts SET password='$new_password', hash='$hash' WHERE email='$email'";

		if($mysqli->query($sql))
		{
			$_SESSION['message'] = "Password has been reseted successfully";
		}
	}
	else
	{
		$_SESSION['message'] = "Passwords dont match";
		header("location: error.php");
	}
}
?>
