<?php
session_start();

if (isset($_SESSION['userid'])) {
	header("Location: ../home/index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="icon" href="../../../assets/img/TEST_oshs.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="../../../assets/img/TEST_oshs.jpg" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
</head>

<body>
	<div class="form-wrapper">
		<div class="flip-card">
			<div class="inner">
				<div class="card-face front-side">
					<div class="image-holder"><img src="../../../assets/img/TEST_oshs.jpg" alt=""></div>
					<form action="../../controller/auth/signup_handler.php" method="post">
						<h3>Sign Up</h3>
						<div class="form-holder"><input type="text" name="name" placeholder="NAME" class="form-control" required=""></div>
						<div class="form-holder"><input type="email" name="email" placeholder="EMAIL" class="form-control" required=""></div>
						<div class="form-holder"><input type="password" name="password" placeholder="PASSWORD" class="form-control" required=""></div>
						<div class="ps-5">
							<input type="checkbox" id="terms" name="is_agree" value=1 required>
							<label for="terms">I agree to the User Agreement and Privacy Policy.</label>
						</div>
						<div class="error-wrapper">
							<ul class="error-list"></ul>
						</div>
						<div class="form-submit center-container"><button>Sign Up</button>
							<p>Already have an account? <a href="login.php">Login</a></p>
						</div>
					</form>
				</div>
				<div class="card-face back-side">
					<h3>Thanks for register!</h3>
				</div>
			</div>
		</div>
	</div>
</body>

</html>