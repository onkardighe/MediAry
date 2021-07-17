<?php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: signin/login.php');
    exit();
}
else
{
    include("plasmaFormConnection.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register here</title>
    <link rel="stylesheet" href="css/plasmaDonateForm.css">
    <link rel="stylesheet" href="css/style.css">
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
            <div class="blanknav2" id="blanknav2"></div>
            <!-- <div class="blanknav3" id="blanknav3"></div> -->
            <li><a href="aboutus.php">About Us</a></li>
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
    <!-- BODY STARTS HERE -->
    <div class="main">
        <div class="register">
            <h2>Register Here</h2>

            <form id="register" method="get">
                <label>First Name </label>
                <br>
                <input type="text" name ="fname" id="name" placeholder="Enter First Name">
                <br><br>
                <label >Last Name</label>
                 <br>
                <input type="text" name="lname" id="name" placeholder="Enter Last Name">
                <br><br>
                 <label>Age</label>
                <br>
                <input type="number" name="age" id="name" placeholder="How old are you ?">
                <br><br>
                 
                <label>Gender</label>
                <br>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" id="male" value="Male">
                &nbsp;
                <span id="male">Male</span>

                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" id="female" value="Female">
                &nbsp;
                <span id="male">Female</span>
                
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" id="othergender" value="Other">
                &nbsp;
                <span id="male">Other</span>
                <br><br>
                
                <label>Blood Group</label>
                <br>
                <input type="text" name="bloodgroup" id="name" placeholder="Blood Group">
                <br><br> 

                <label>Date of Discharge (Recovery From Covid)</label>
                <br>
                <input type="date" name="dateofrecovery" id="name">
                <br><br>

                <label>Mobile Number</label>
                <br>
                <input type="tel" pattern="[0-9]{10}" name="mobilenumber" id="name">
                <br><br>


                <label>Email</label>
                <br>
                <input type="email" name="email" id="name" placeholder="Enter Valid Email">
                <br><br>

                <label>Any other Madical issues (Other than covid)</label>
                <br>
                <input type="text" name="othermedicalissue" id="name">
                <br><br> 
                <input class="btn" type="submit" value="Submit" name="submit" id="submit"> 
            </form>
        </div><!-- End register-->
    </div><!-- End main-->
</body>
</html>


<?php

    if(isset($_GET["submit"]))
    {
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $age = $_GET['age'];
        $gender = $_GET['gender'];
        $bloodgroup = $_GET['bloodgroup'];
        $dateofrecovery = $_GET['dateofrecovery'];
        $mobilenumber = $_GET['mobilenumber'];
        $email = $_GET['email'];
        $othermedicalissue = $_GET['othermedicalissue'];
    
        $query = "INSERT INTO `plasma_registration`(`fname`,`lname`,`age`,`gender`,`bgrp`,`recoverydate`,`mono`,`email`,`other`) VALUES ('$fname','$lname','$age','$gender','$bloodgroup','$dateofrecovery','$mobilenumber','$email','$othermedicalissue')";

    
        $data = mysqli_query($conn,$query);
    
        if($data)
        {
            echo "data inserted into database";
        }
        else
        {
            echo "Failed to insert data";
        }
    }


?>