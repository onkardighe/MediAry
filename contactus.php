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
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="css/style1.css" />
  </head>
  <body>
  <nav class="navbar  h-nav-resp">
        <ul class="nav-list v-class-resp">
            <div class="logo">
                <a href="index.php"><img id="logoimg" src="img/logo.jpg" alt="logo"></a>
                <li><a id="logoname" href="index.php">Mediary</a></li>
            </div>
            <div class="blanknav" id="blanknav"></div>
            <li><a href="aboutus.php">About Us</a></li>
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
    <section class="contact">
      <div class="content">
        <h2>Contact US</h2>
        <!-- <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores et,
          recusandae deleniti laudantium voluptatem accusamus suscipit nihil
          distinctio numquam,
        </p> -->
      </div>
      <div class="container">
        <div class="contactInfo">
          <div class="box">
            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="text">
              <h3>Address</h3>
              <p>
                MET BKC Institute of Engineering,<br />
                Adgaon<br />
                Nashik - 422003.
              </p>
            </div>
          </div>
          <div class="box">
            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
            <div class="text">
              <h3>Phone</h3>
              <p>
                1231231231
              </p>
            </div>
          </div>
          <div class="box">
            <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
            <div class="text">
              <h3>Email</h3>
              <p>
                mediary@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="contactForm">
            <form>
                <h2>Send Message</h2>
                <div class="inputBox">
                    <input type="text" name="" required="required">
                    <span>Full name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <textarea required="required"></textarea>
                    <span>Type Your Message...</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="" value="Send">
                </div>
            </form>
        </div>
      </div>
    </section>
  </body>
</html>
