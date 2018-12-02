<?php
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>SignUp/Login</title>
</head>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['login']))
		{
			require 'login.php';
		}
		elseif(isset($_POST['register']))
		{
			require 'register.php';
		}
	}
?>

<body>
	<div class="form">
		<!--ul class="tab-group">
			<li class="tab"><a href="#signup">Sign Up</a></li>
			<li class="tab active"><a href="#login">Log In</a></li>
		</ul-->

		<div class="tab-content">
			<div id="login">
			<h1>Welcome back</h1>

			<form action="index.php" method="post" autocomplete="off">
				<div class="field-wrap">
				<label>
				Email address<span class ="req">*</span>
				</label>
				<input type="email" required autocomplete="off" name="email" />
				</div>

				<div class="field-wrap">
				<label>
				Password<span class ="req">*</span>
				</label>
				<input type="password" required autocomplete="off" name='password' />
				</div>

				<p class="forgot"><a href="forgot.php">Forgot/Reset password</a></p>

				<button class="button button-block" name="login"/>Log In</button>
			</form>
			</div>

			<div id="signup">
			<h1>Sign up</h1>

			<form name="form" action="index.php" method="post" autocomplete="off">
				<div class="field-wrap">
					<label>
					User name<span class="req">*</span>
					</label>
					<input type="text" required autocomplete="off" name='username' />
				</div>

				<div class="field-wrap">
					<label>
					Email address<span class="req">*</span>
					</label>
					<input type="email" required autocomplete="off" name='email' />
				</div>

				<div class="field-wrap">
					<label>
					Set a password<span class="req">*</span>
					<label>
					<input type="password" required autocomplete="off" name='password' />
				</div>

				<div class="field-wrap">
					<label>
					Repeat password<span class="req">*</span>
					<label>
					<input type="password" required autocomplete="off" name='passwordrepeat' />
				</div>

				<button type="submit" class="button button-block" name="register" />Register</button>
			</form>

			<script>
				var form = document.getElementsByName("form")[0];	
				
				form.addEventListener("submit", 
				function() 
				{
					localStorage.setItem("tab1", null);
					localStorage.setItem("tab2", null);
				});
			</script>

			</div>
		</div> <!--tab-content-->
	</div> <!--form-->
</body>
</html>
















