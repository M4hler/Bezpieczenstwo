<?php
$user = $_POST['user'];
$pass = $_POST['pass'];

echo "username: " . $user;
echo " password: " . $pass;
?>

<html>
	<head>
	</head>

	<body>
	<form action="test.php" method="post">

	<b>username</b><br/>
	<input type="text" name="user" /><br/>
	<b>password</b><br/>
	<input type="password" name="pass" /><br/>
	<input type="submit" value="Login"/>
	</form>
</html>
