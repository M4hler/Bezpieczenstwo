<?php
require 'db.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $mysqli->escape_string($_POST['email']);
	$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

	if($result->num_rows == 0)
	{
		$_SESSION['message'] = "User with that email doesnt exist";
		header("location: error.php");
	}
	else
	{
		$user = $result->fetch_assoc();

		$email = $user['email'];
		$hash = $user['hash'];
		$username = $user['login'];

		$_SESSION['message'] = "<p>Please check your email <span>$email</span> for a confirmation link to complete password reset</p>";

		$to = $email;
		$subject = 'Password Reset Link';
		$message_body = 'Hello '.$username.',
						Please click this link to reset password:
						localhost/reset.php?email='.$email.'&hash='.$hash;

		mail($to, $subject, $message_body);

		header("location: success.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
</head>

<body>
	<h1>Reset your password</h1>

	<form action="forgot.php" method="post" autocomplete="off">
		<div class="field-wrap">
		<label>
		Email address<span class ="req">*</span>
		<input type="email" required autocomplete="off" name="email" />
		</label>
		</div>

		<button class="button button-block" name="reset"/>Reset</button>
	</form>
</body>
</html>
