<?php
require 'db.php';
session_start();
?>

<html>
<head>
	<title>Profile</title>
</head>

<body>
	<h1>
		<?php
		$username = $_SESSION['username'];
		echo "Profil " . $username;

		$result = $mysqli->query("SELECT balance FROM accounts WHERE login='$username'");
		$res = $result->fetch_assoc();

		echo "<br> Your balance: " . $res['balance'] . "</br>";
		?>
	</hl>

	<form action=transfer.php method="post" autocomplete="off">
		<button type="submit" class="button button-block" name="transfer" />Make transfer</button>
	</form>

	<form action=history.php method="post" autocomplete="off">
		<button type="submit" class="button button-block" name="history" />History</button>
	</form>
</body>
</html>
