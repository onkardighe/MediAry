<?php
require_once "../Google_API/config.php";
if (isset($_SESSION['access_token'])) {
	header('Location: ../indexaftersignin.php');
	exit();
}
$loginURL = $gClient->createAuthUrl();

?>

<!-- HTML starts here -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="../css/style.css"/>
	<title>Sign in & Sign up Form</title>
</head>

<body>
	<nav class="navbar h-nav-resp">
		<ul class="nav-list v-class-resp">
		<div class="logo">
                <a href="../index.php"><img id="logoimg" src="../img/logo.jpg" alt="logo"></a>
            </div>
            <div class="logo">
                <li><a id="logoname" href="../index.php">Mediary</a></li>
            </div>
			<div class="blanknav" id="blanknav"></div>
			<div class="blanknav2" id="blanknav"></div>
			<!-- <li><a href="../index.php #services">Services</a></li> -->
			<!-- <li><a href="#contact">Contact us</a></li> -->
			<!-- <div class="buttons">
				<button class="navbtn">Stats</button> 
				<button class="navbtn" onclick="location.href='Google_API/login.php'">Sign In</a></button>
				<button class="navbtn" onclick="location.href='signin/login.php'">Sign In</a></button>
			</div> -->
		</ul>
		<div class="rightnav v-class-resp"></div>
		<div class="burger">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</nav>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form action="#" class="sign-in-form">
					<h2 class="title">LOG IN</h2>
					<p class="social-text">Log in with Google</p>
					<div class="social-media">
						<a href="#" onclick="window.location = '<?php echo $loginURL ?>';" class="social-icon">
							<i class="fab fa-google"></i>
						</a>
						<!-- <a href="#" class="social-icon">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-linkedin-in"></i>
						</a> -->
					</div>
				</form>
				<form action="#" class="sign-up-form">
					<h2 class="title">SIGN UP</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username" />
					</div>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="email" placeholder="Email" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" />
					</div>
					<input type="submit" class="btn" value="Sign up" />
					<p class="social-text">Or Sign up with Google</p>
					<div class="social-media">
						<a href="#" onclick="window.location = '<?php echo $loginURL ?>';" class="social-icon">
							<i class="fab fa-google"></i>
						</a>
						<!-- <a href="#" class="social-icon">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-linkedin-in"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>New User ?</h3>
					<p>
						New User ? Want to become a part of Mediary Family ?
					</p>
					<p>
						Register Here
					</p>
					<button class="btn transparent" id="sign-up-btn">
						Sign up
					</button>
				</div>
				<img src="img/lo.png" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>One of us ?</h3>
					<p>
						Are you already Registered User ? Just Log in.
					</p>
					<button class="btn transparent" id="sign-in-btn">
						Log in
					</button>
				</div>
				<img src="img/doct.png" class="image" alt="" />
			</div>
		</div>
	</div>

	<script src="app.js"></script>
</body>

</html>