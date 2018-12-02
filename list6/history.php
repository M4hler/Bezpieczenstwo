<?php
require 'db.php';
session_start();

$username = $_SESSION['username'];

$result = $mysqli->query("SELECT * FROM transfers WHERE account_num = (SELECT account_num FROM accounts WHERE login='$username')");

if ($result->num_rows > 0) 
{
	echo "<hl>History</hl>";
    while($row = $result->fetch_assoc()) 
	{
        echo "<br> Source: " . $row['account_num'] . 
				"<br> Amount: " . $row['amount'] . 
				"<br> Destination: " . $row['account_dest'] . 
				"<br> Dest user name: " . $row['login'] . 
				"<br> Title: " . $row['title'] . "<br>";
    }
} 
else 
{
    echo "0 results";
}
?>
