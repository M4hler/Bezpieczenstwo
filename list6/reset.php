<?php
require 'db.php';
session_start();
$_SESSION['test'] = "gg";
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
	$email = $mysqli->escape_string($_GET['email']);
	$hash = $mysqli->escape_string($_GET['hash']);

	$_SESSION['email'] = $email;
	$_SESSION['hash'] = $hash;

	$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email' AND hash='$hash'");

	if($result->num_rows == 0)
	{
		$_SESSION['message'] = "Invalid url for password reset";
		header("location: error.php");
	}
}
else
{
	$_SESSION['message'] = "Verification failed";
	header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset password</title>
</head>

<body>
	<div class="form">
		<h1>Choose new password</h1>

		<form action="reset_password.php" method="post">

		<div class="field-wrap">
			<label>
			New password<span class="req">*</span>
			</label>
			<input type="password" required name="newpassword" autocmplete="off" />		
		</div>

		<div class="field-wrap">
			<label>
			Confirm new password<span class="req">*</span>
			</label>
			<input type=password required name="confirmpassword" autocomplete="off" />
		</div>

		<button type="submit" class="button button-block" name="reset_password" />Change</button>
		</form>
	</div>
</body>
</html>
