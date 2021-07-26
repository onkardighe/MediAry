<?php

// SIGN UP
if(isset($_POST["signup_submit"]))
    {
        $username = $_POST['signup_username'];
        $email = $_POST['signup_email'];
        $pwd = $_POST['signup_pwd'];

			


		$query_check_username = "SELECT * FROM `signup_user` WHERE username='$username'";
		$query_check_email = "SELECT * FROM `signup_user` WHERE email='$email'";
		$res_username = mysqli_query($conn,$query_check_username);
		$res_email = mysqli_query($conn,$query_check_email);
    
		if (mysqli_num_rows($res_username) > 0) 
		{
			echo "<script>alert('Username already taken');</script>";
		}
		else if(mysqli_num_rows($res_email) > 0)
		{
			echo "<script>alert('Email already Registered');</script>";
		}
		else
		{
			// Encryption
			$pwd_len = strlen($pwd);
			$encrp_pwd = encrypt($pwd,$pwd_len);	

			$query = "INSERT INTO `signup_user`(`username`,`email`,`pwd`) VALUES ('$username','$email','$encrp_pwd')";
			$data = mysqli_query($conn,$query);
		
			if($data)
			{
				session_start();
                $_SESSION['access_token'] = "Yes";
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
				$_SESSION['picture'] = "https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659651_960_720.png";


				echo "<script>alert('You are Registered !\nLog in To Continue ');</script>";
				echo "<script>location.href='../indexaftersignin.php';</script>";
			}
			else
			{
				echo "<script>alert('Invalid Data !');</script>";
			}
			exit();
		}
    }

// LOG IN 

if(isset($_POST["login_submit"]))
    {
        $email = $_POST['login_email'];
        $pwd = $_POST['login_pwd'];

		// Decryption
		$pwd_len = strlen($pwd);
		$decryp_pwd = encrypt($pwd,$pwd_len);

		
		
		$query_check_email = "SELECT * FROM `signup_user` WHERE email='$email'";
		$query_check_pwd = "SELECT * FROM `signup_user` WHERE pwd='$decryp_pwd'";
		$query_check_emailGoogle = "SELECT * FROM `google_users` WHERE email='$email'";
		$res_email = mysqli_query($conn,$query_check_email);
		$res_pwd = mysqli_query($conn,$query_check_pwd);
		$res_emailGoogle = mysqli_query($conn,$query_check_emailGoogle);
		
		//Check For Admin
		$query_check_emailAdmin = "SELECT * FROM `admin` WHERE email='$email'";
		$query_check_pwdAdmin = "SELECT * FROM `admin` WHERE pwd='$decryp_pwd'";
		$res_emailAdmin = mysqli_query($conn,$query_check_emailAdmin);
		$res_pwdAdmin = mysqli_query($conn,$query_check_pwdAdmin);
		
		if(mysqli_num_rows($res_emailAdmin) > 0)
		{
			if(mysqli_num_rows($res_pwdAdmin) > 0)
			{
				session_start();
				$_SESSION['access_token'] = 'admin';
				
				$result = $res_emailAdmin->fetch_assoc();

				$_SESSION['username'] = $result["username"];
				$_SESSION['email'] = $email;
				$_SESSION['picture'] = "https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659651_960_720.png";
				$_SESSION['last_seen_plasmaForm'] = $result["lastplasmaseen"];
				echo "<script>location.href='../indexaftersignin.php';</script>";
				exit();
			}
		}
		else if(mysqli_num_rows($res_email) > 0)
		{
			if(mysqli_num_rows($res_pwd) > 0)
			{
				session_start();
				$_SESSION['access_token'] = "Yes";
				
				$result = $res_email->fetch_assoc();

				$_SESSION['username'] = $result["username"];
				$_SESSION['email'] = $email;
				$_SESSION['picture'] = "https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659651_960_720.png";
				echo "<script>location.href='../indexaftersignin.php';</script>";
				exit();
			}
			else	
			{
				echo "<script>alert('Incorrect Password !');</script>";
			}
			
		}
		else if(mysqli_num_rows($res_emailGoogle) > 0)
		{
			session_start();
			$_SESSION['access_token'] = "Yes";

			$result = $res_emailGoogle->fetch_assoc();
			
			$_SESSION['givenName'] = $result["fname"];
			$_SESSION['familyName'] = $result["lname"];
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			$_SESSION['picture'] = $result["profile"];

			echo "<script>location.href='../indexaftersignin.php';</script>";
			exit();
		}
		else
		{
			echo "<script>alert('Invalid Data !');</script>";
			exit();
		}
    }

	// Function For Encryption

	function encrypt($string, $key)
	{
		for($i = 0; $i < strlen($string); $i++)
		{
			$string[$i] = chr(ord($string[$i]) ^ $key);
		} 
		return $string;
	}
?>