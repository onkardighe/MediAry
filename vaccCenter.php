<?php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: signin/login.php');
    exit();
} else {
    include("dbConnection.php");
}
?>

<!-- HTML STARTS HERE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/vaccCenter.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/vaccCenter.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Mediary Vaccinations</title>
</head>


<body>
    <nav class="navbar h-nav-resp">
        <ul class="nav-list v-class-resp">
            <div class="logo">
                <a href="index.php"><img id="logoimg" src="img/logo.jpg" alt="logo"></a>
            </div>
            <div class="logo">
                <li><a id="logoname" href="index.php">Mediary</a></li>
            </div>
            <div class="blanknav" id="blanknav"></div>
            <div class="blanknav2" id="blanknav2"></div>
            <div class="blanknav3" id="blanknav3"></div>
            <div class="vacctrack" id="vacctrack"></div>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Contact us</a></li>
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
    <section class="bg" id="bg">
        <nav class="vaccnav" id="">
            
            <button class="btn" onclick="openVaccCent()">Vaccination Centers</button>
            <button class="btn" onclick="openbeds()">Beds</button>
            <button class="btn" onclick="location.href='plasmaDonateForm.php'">Donate Plasma</button>
            <button class="btn" onclick="openPlasmaResources()">Plasma Resources</button>
        </nav>
        <!-- VACCINE CLASS -->
        <div class="vaccform" id="vaccform" style="display: block;">
        <br><br><br><br>
            <h1>Vaccine Tracker</h1>
            <h2>Select Vaccination Centers</h2>

            <form name="form1" id="form1" action="/action_page.php">
                <br><br>
                States:
                <br>
                <select name="subject" id="states">
                    <option value="" selected="selected">Select State</option>
                </select>
                <br><br>
                Districts:
                <br>
                <select name="topic" id="district">
                    <option value="" selected="selected">Select District</option>
                </select>
                <br><br><br>
                <h4 id="availcent">Available Centers Are</h4>
                <select name="chapter" id="centers">
                    <option value="" selected="selected">Select One of Them</option>
                </select>
                <br><br>
            </form>
            <button class="btn" id="searchBtn" onclick="toggle()">Search</button>
            <div id="popup" class="popup">
                <h2 id="centName">Name</h2>
                <table class="table">
                    <tr>
                        <td>
                            <h3>Vaccine : </h3>
                        </td>
                        <td>
                            <h3 id="availVaccine">Vaccine</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Available Doses : </h3>
                        </td>
                        <td>
                            <h3 id="availDoses">Doses</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Minimum Age Limit : </h3>
                        </td>
                        <td>
                            <h3 id="ageLimit">Minimum Age Limit</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Fees : </h3>
                        </td>
                        <td>
                            <h3 id="fees">Fees </h3>
                        </td>
                    </tr>
                </table>
                <a href="" onclick="toggle()" class="close-icon">
                    <i class="fas fa-times-circle fa-2x"></i>
                </a>
            </div>
        </div>

        <!-- BEDS CLASS  -->
        <!-- <div class="bedform" id="bedform" style="display: block;">  -->
        <div class="bedform" id="bedform" style="display: none;">
            <br><br><br><br>
            <h1>Beds in Nashik</h1>
            <br><br>
            <h3>Select Any hospital</h3>
            <form name="form1" id="form1" action="/action_page.php">
                <select name="hospital" id="hospital">
                    <option value="" selected="selected">Select Hospital</option>
                </select>
            </form>
            <div id="popuphospital" class="popuphospital" style="display: none;">
                <h1 id="hospitalName" style="color: black;">Name</h1>
                <table class="tablebeds">
                    <tr>
                        <td>
                            <h3> Doctor Name:</h3>
                        </td>
                        <td>
                            <h3 id="hospdoctname">Doctor Name</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3> Address:</h3>
                        </td>
                        <td>
                            <h3 id="hospaddress">Address</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3> Contact Number:</h3>
                        </td>
                        <td>
                            <h3 id="hospcontact">Contact Number</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Available General Beds:</h3>
                        </td>
                        <td>
                            <h3 id="hospavailgenbeds">General Beds</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Available Oxygen Beds:</h3>
                        </td>
                        <td>
                            <h3 id="hospavailoxybeds">Oxygen Beds</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Available ICU Beds:</h3>
                        </td>
                        <td>
                            <h3 id="hospavailicubeds">ICU Beds</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Available Ventilator Beds:</h3>
                        </td>
                        <td>
                            <h3 id="hospavailventbeds">Ventilator Beds</h3>
                        </td>
                    </tr>
                </table>
                <a href="" onclick="" class="close-icon">
                    <i class="fas fa-times-circle fa-2x"></i>
                </a>
            </div>
        </div>

        <!-- PLASMA RESOURCES  -->
        <div class="plasmaResources" id="plasmaResources" style="display: none;">
        <br><br><br><br>
            <div class="plasmadata">
                <table>
                    <thead style="color: white">
                        <tr>
                            <td>Sr. No.</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Age</td>
                            <td>Gender</td>
                            <td>Blood Group</td>
                            <td>Date of Recovery</td>
                            <td>Mobile Number</td>
                            <td>Email</td>
                            <td>Other Medical Issues</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from plasma_registration limit 100;";
                        $queryResult = $conn->query($query);
                        while ($queryRow = $queryResult->fetch_row()) {
                            echo "<tr>";
                            for ($i = 0; $i < $queryResult->field_count; $i++) {
                                echo "<td>$queryRow[$i]</td>";
                            }   
                            echo "</tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-left">
            <img src="https://source.unsplash.com/120x50/?medical
        " alt=""></h1>
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