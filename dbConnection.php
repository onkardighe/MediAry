<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mediary";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!($conn))
    {
        echo "Conenction Failed !".mysqli_connect_error();
    }
?>