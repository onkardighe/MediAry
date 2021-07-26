<?php
require_once "Google_API/config.php";
if (isset($_SESSION['access_token'])) {
    header('Location: indexaftersignin.php');
    exit();
}
$loginURL = $gClient->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/counter.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Mediary</title>
</head>

<body>
    <nav class="navbar  h-nav-resp">
        <ul class="nav-list v-class-resp">
        <div class="logo">
                <a href="index.php"><img id="logoimg" src="img/logo.jpg" alt="logo"></a>
            </div>
            <div class="logo">
                <li><a id="logoname" href="index.php">Mediary</a></li>
            </div>
            <div class="blanknav" id="blanknav"></div>
            <div class="blanknav3" id="blanknav3"></div>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Contact us</a></li>
            <div class="buttons">
                <!-- <button class="navbtn">Stats</button> -->
                <!-- <button class="navbtn" onclick="location.href='Google_API/login.php'">Sign In</a></button> -->
                <button class="navbtn" onclick="location.href='vaccCenter.php'">Vaccine Tracker</a></button>
            </div>
            <div class="buttons">
                <button class="navbtn" onclick="location.href='signin/login.php'">Sign In</a></button>
            </div>
        </ul>
        <div class="rightnav v-class-resp"></div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    <section class="background firstsection">
        <div class="box-main">
            <div class="firsthalf">
                <div class="counter">
                    <i class="fas fa-lungs-virus"></i>
                    <span class="number" id="number1">1</span>
                    <h3>Total</h3>
                </div>

                <div class="counter">
                    <i class="fas fa-procedures"></i>
                    <span class="number" id="number2">2</span>
                    <h3>Confirmed</h3>
                </div>

                <div class="counter">
                    <i class="fas fa-ambulance"></i>
                    <span class="number" id="number3">3</span>
                    <h3>Recovered</h3>
                </div>

                <div class="counter">
                    <i class="fas fa-user-injured"></i>
                    <span class="number" id="number4">4</span>
                    <h3>Deaths</h3>
                </div>
            </div>
            <!-- <div class="secondhalf">
				<img src="img/img.jpg" alt="img" />
			</div> -->
            <div class="statitiscs">
                <h2>Covid Statistics of India</h2>
                <h2 id="statisticsDate">Date</h2>
            </div>
            <div class="vaccinClass">
                <h1>We are tracking vaccination Centers For You</h1>
                <button class="btn" onclick="location.href='vaccCenter.php'">Vaccine Tracker</button>
            </div>
        </div>
    </section>
    <div class="sec">
        <section class="section" id="services">
            <div class="paras">
                <p class="sectiontag text-big">Wear a Mask</p>
                <p class="sectionsubtag text-small">
                    Be responsible, always wear a mask when in public
                    Wearing a mask reduces the spread of infectious droplets, especially when someone speaks, coughs or sneezes, for diseases like COVID-19.
                </p>
            </div>
            <div class="thumbnail">
                <img src="img/covihack3-1.png" alt="covihack" class="imgfluid" />
            </div>
        </section>
        <section class="section left">
            <div class="paras">
                <p class="sectiontag text-big">Wash Your Hands</p>
                <p class="sectionsubtag text-small">
                    Regular handwashing is one of the best ways to remove germs, avoid getting sick, and prevent the spread of germs to others.
                </p>
            </div>
            <div class="thumbnail">
                <img src="img/covihack3-2.png" alt="covihack" class="imgfluid" />
            </div>
        </section>
        <section class="section">
            <div class="paras">
                <p class="sectiontag text-big">Watch Your Distance</p>
                <p class="sectionsubtag text-small">
                    The virus that causes COVID-19 spreads easily through physical contact from person to person. This is why it is important to reduce the ways people come in close contact with one another.
                </p>
            </div>
            <div class="thumbnail">
                <img src="img/covihack3-3.png" alt="covihack" class="imgfluid" style="width: 400px;" />
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="footer-left">
            <img src="https://source.unsplash.com/120x50/?medical
        " alt=""></h1>
            <p>Convalescent plasma therapy may be given to people with COVID-19 who are in the hospital and are early in their illness or have a weakened immune system.</p>
            <div class="socials">
                <a href="#"><i class="fa fa-facebook"></i></a>
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
    <script src="js/resp.js"></script>
</body>

</html>