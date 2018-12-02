<?php
session_start();
?>

<html>
<head>
	<title>Success</title>
</head>

<body>
	<div class="form">
		<h1>Success</h1>
		<p>
			<?php
			if(isset($_SESSION['message']) and !empty($_SESSION['message']))
			{
				echo $_SESSION['message'] . "<br><a href=profile.php>Profile</a></br>";
			}
			else
			{
				header("location: index.php");
			}
			?>
		</p>

		<script>
			document.getElementsByName("dest")[0].innerHTML = localStorage.getItem("realNumber");
			document.getElementsByName("recipient")[0].innerHTML = localStorage.getItem("realRecipient");
		</script>

	</div>	
</body>
</html>








