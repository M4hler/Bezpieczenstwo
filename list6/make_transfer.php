<?php
require 'db.php';
session_start();

$username = $_SESSION['username'];
$dest = $_SESSION['dest'];
$recipient = $_SESSION['recipient'];
$title = $_SESSION['title'];

$result = $mysqli->query("SELECT account_num, balance FROM accounts WHERE login='$username'");
$res = $result->fetch_assoc();

if($res['balance'] >= $_SESSION['amount'])
{
	$num = $res['account_num'];
	$balance = $res['balance'];
	$amount = $_SESSION['amount'];

	$result2 = $mysqli->query("SELECT * FROM accounts WHERE account_num='$dest' AND login='$recipient'");

	if($result2->num_rows > 0)
	{
		$r1 = $mysqli->query("UPDATE accounts SET balance=balance - '$amount' WHERE login='$username'");
		$r2 = $mysqli->query("UPDATE accounts SET balance=balance + '$amount' WHERE login='$recipient'");

		$r3 = $mysqli->query("INSERT INTO transfers VALUES ('$num', '$amount', '$dest', '$recipient', '$title')");

		$_SESSION['message'] = "<br>Transfer made successfully with following data
								<br>Destination account: <p name=\"dest\"> $dest </p>
								<br>Recipient name: <p name=\"recipient\"> $recipient </p>
								<br>Amount: <p name=\"amount\"> $amount </p>
								<br>Title: <p name=\"title\"> $title </p>";
		header("location: success.php");
	}
	else
	{
		echo "  error :(";
	}
}
else
{
	$_SESSION['message'] = "Your balance is too low";
	header("location: error.php");
}
?>
