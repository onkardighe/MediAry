<?php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: signin/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>About Us</title>
	<link rel="stylesheet" href="css/style1.css" />
	<link rel="stylesheet" href="css/aboutus.css">
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav class="navbar  h-nav-resp">
        <ul class="nav-list v-class-resp">
            <div class="logo">
                <a href="index.php"><img id="logoimg" src="img/logo.jpg" alt="logo"></a>
                <li><a id="logoname" href="index.php">Mediary</a></li>
            </div>
            <div class="blanknav" id="blanknav"></div>
            <li><a href="contactus.php">Contact us</a></li>
            <button class="navbtn btn" onclick="location.href='vaccCenter.php'">Vaccine Tracker</a></button>
            <div class="userprofile">
                <img src="<?php echo $_SESSION['picture'] ?>" alt="">
                <div class="user_dropdown">
                    <li id="user_dropdown"><a href="account.php">Account</a></li>
                    <li id="user_dropdown"><a href="Google_API/logout.php">Log Out</a></li>
                </div>
            </div>
        </ul>
        <div class="rightnav v-class-resp"></div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
	<div class="section">
		<div class="container">
			<div class="content-section">
				<div class="title">
					<h1>About Us</h1>
				</div>
				<div class="content">
					<h3>We Provide Services For You</h3>
					<p>
						Mediary Provides you an opportunity to Donate the plasma cells for essential patient.
						Blood donated by people who've recovered from COVID-19 has
						antibodies to the virus that causes it. The donated blood is
						processed to remove blood cells, leaving behind liquid (plasma)
						and antibodies. These can be given to people with COVID-19 to
						boost their ability to fight the virus.
					</p>
					<div class="button">
						<a href="">Read More</a>
					</div>
				</div>
				<div class="social">
					<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="image-section">
				<img src="img/bg.jpg" alt="" />
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="footer-left">
			<img src="https://source.unsplash.com/120x50/?medical
        " alt="">
			<p>Convalescent plasma therapy may be given to people with COVID-19 who are in the hospital and are early in their illness or have a weakened immune system.</p>
			<div class="socials">
				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			</div>
		</div>
		<ul class="footer-right">
			<li>
				<h2>Product</h2>
				<ul class="box">
					<li><a href="#">Theme Design</a></li>
					<li><a href="#">Plugin Design</a></li>
					<li><a href="#">CSS Template</a></li>
					<li><a href="#">HTML Template</a></li>
				</ul>
			</li>
			<li class="features">
				<h2>Usefull link</h2>
				<ul class="box">
					<li><a href="https://www.mohfw.gov.in/">Ministry of Health and Family Welfare</a></li>
					<li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">WHO: COVID-19 Home Page</a></li>
					<li><a href="https://www.cdc.gov/coronavirus/2019-ncov/faq.html">Centers for Disease Control and Prevention (CDC)</a></li>
					<li><a href="https://coronavirus.thebaselab.com/">COVID-19 Global Tracker</a></li>
					<li><a href="#">Certifications</a></li>
				</ul>
			</li>
			<li>
				<h2>Legal</h2>
				<ul class="box">
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Contract</a></li>
				</ul>
			</li>
		</ul>
		<div class="footer-bottom">
			<p>An effort by Team Mediary to keep our loved ones safe and informed!</p>
			<p>All rights reserved by ©Mediary 2021 </p>
		</div>
	</footer>
</body>

</html>