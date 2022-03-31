<?php
include "db/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="login.php" method="post">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>
<?php

// ' OR '1=1

if(isset($_POST['submit'])){
	$login_email = $_POST['email'];
	$login_pass = $_POST['pass'];

	$login_email = escapeInjection($login_email);
	$login_pass = escapeInjection($login_pass);

	// echo $login_pass;

	$select_user_query = "SELECT * FROM users WHERE users_email = '$login_email'";
	$select_user_result = mysqli_query($connection, $select_user_query);
	$select_user_count = mysqli_num_rows($select_user_result);

	if($select_user_count >= 1){
		while($row = mysqli_fetch_assoc($select_user_result)){
			$db_users_id = $row['users_id'];
			$db_users_name = $row['users_name'];
			$db_users_email = $row['users_email'];
			$db_users_pass = $row['users_pass'];
		}

		if($login_pass == $db_users_pass){
			echo "ok";
		}else{
			?>
<br>
<div class="cus_mess red">
	<p>&#9888; Password Incorrect. Try again.</p>
</div>
<br>
			<?php
		}
	}else{
		?>
<br>
<div class="cus_mess red">
	<p>&#9888; There is no such user with this email. Try Registration.</p>
</div>
<br>
		<?php
	}
}
?>


				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="email" placeholder="Enter your email" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="pass" placeholder="Enter your password" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit">
						Sign In
					</button>
				</div>
	<br>
				<div class="text-center">
					<a href="#" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main2.js"></script>

</body>
</html>