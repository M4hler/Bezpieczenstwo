<?php
session_start();
?>

<html>
<head>
	<title>Error</title>
</head>

<body>
	<div class="form">
		<h1>Error</h1>
		<p>
			<?php
			if(isset($_SESSION['message']) and !empty($_SESSION['message']))
			{
				echo $_SESSION['message'];
			}
			else
			{
				header("location: index.php");
			}
			?>
		</p>
	</div>	
</body>
</html>
