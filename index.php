<?php
// session_start();
// if (isset($_SESSION['user'])) {

// 	header('location:add_inquiry.php');
// } else {
// }
?>
<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login- Inquiry System</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<link rel="stylesheet" type="text/css" href="css/form.css" />

</head>

<body>

	<h2>Venturetech Inquiry System: Sign in/up Form</h2>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input type="text" placeholder="Name" />
				<input type="email" placeholder="Email" />
				<input type="password" placeholder="Password" />
				<button>Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#" method="post">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your account</span>
				<input type="text" placeholder="Username" name="un" />
				<input type="password" placeholder="Password" name="pass" />
				<a href="#">Forgot your password?</a>
				<input type="submit" value="Sign In" name="login" class="" style="border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;">
			</form>

			<?php
			if (isset($_POST['login'])) {
				$un = $_POST['un'];
				$pass = $_POST['pass'];


				$query = "Select * from user where email = '$un' and password = '$pass'";
				$res = mysqli_query($con, $query);

				$count = mysqli_num_rows($res);

				if ($count > 0) {
					$_SESSION['user'] = $un;

					// Simulate an HTTP redirect:
			?>
					<script>
						window.location.replace("add_inquiry.php");
					</script>
				<?php

				} else {
				?>
					<script>
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Something went wrong!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					</script>

			<?php
				}
			}

			?>

		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<p>
			Created with <i class="fa fa-heart"></i> by
			<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
			- Read how I created this and how you can join the challenge
			<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
		</p>
	</footer>
</body>

</html>