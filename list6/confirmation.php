<?php
session_start();

$_SESSION['amount'] = $_POST['amount'];
$_SESSION['dest'] = $_POST['dest'];
$_SESSION['recipient'] = $_POST['recipient'];
$_SESSION['title'] = $_POST['title'];
?>

<html>
<head>
	<title>Confirmation</title>
</head>

<body>
	<div class="form">
		<h1>Confirmation</h1>
		Amount: <p name="amount"> <?php echo $_POST['amount']; ?> </p> <br>
		Destination account number: <p name="dest"> <?php echo  $_POST['dest']; ?> </p> <br>
		Recipent login: <p name="recipient"> <?php echo $_POST['recipient']; ?> </p> <br>
		Title: <p name="title"> <?php echo $_POST['title']; ?> </p> <br>

		<script>
			document.getElementsByName("dest")[0].innerHTML = localStorage.getItem("realNumber");
			document.getElementsByName("recipient")[0].innerHTML = localStorage.getItem("realRecipient");
			
			var tab1 = localStorage.getItem("tab1").split(",");
			if(tab1.length == 1)
			{
				tab1 = [localStorage.getItem("realNumber")];
			}
			else 
			{
				tab1.push(localStorage.getItem("realNumber"));
			}
			localStorage.setItem("tab1", tab1);

			var tab2 = localStorage.getItem("tab2").split(",");
			if(tab2.length == 1)
			{
				tab2 = [localStorage.getItem("realRecipient")];
			}
			else 
			{
				tab2.push(localStorage.getItem("realRecipient"));
			}
			localStorage.setItem("tab2", tab2);
			console.log(localStorage);
		</script>

		<form action="make_transfer.php" method="post" autocomplete="off">
			<button class="button button-block" name="confirmation"/>Confirm</button>
		</form>
		
		<form action="profile.php" method="post" autocomplete="off">
			<button class="button button-block" name="confirmation"/>Reject</button>
		</form>
	</div>	
</body>
</html>
