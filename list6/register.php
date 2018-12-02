<?php
$_SESSION['email'] = $_POST['email'];
$_SESSION['user name'] = $_POST['username'];

$pass = $_POST['password'];
$passrepeat = $_POST['passwordrepeat'];

if($pass != $passrepeat)
{
	$_SESSION['message'] = "Passwords do not match";
	header("location: error.php");
}
else
{
	$username = $mysqli->escape_string($_POST['username']);
	$email = $mysqli->escape_string($_POST['email']);
	$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	$hash = $mysqli->escape_string(md5(rand(0, 1000)));

	$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'") or die($mysqli->error());

	if($result->num_rows > 0)
	{
		$_SESSION['message'] = 'User with this email already exists!';
		header("location: error.php");
	}
	else
	{
		$sql = "INSERT INTO accounts (login, email, password, hash) " . "VALUES ('$username', '$email', '$password', '$hash')";

		if($mysqli->query($sql))
		{
			$_SESSION['logged_in'] = true;
			$_SESSION['message'] = "Success";

			header("location: profile.php");
		}
		else
		{
			$_SESSION['message'] = "Registration failed";
			header("location: error.php");
		}
	}
}
?>
