<?php
session_start();
if (!isset($_SESSION['access_token'])) {
	header('Location: index.php');
	exit();
} else if ($_SESSION['access_token'] == 'admin') {
	echo "<script>document.getElementById('plasmaResources').style.display = 'none'</script>";
	include("dbConnection.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Account</title>
	<link rel="stylesheet" href="css/account.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/account.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>


<!-- BODY STARTS HERE -->

<body>
	<div class="container">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<img src="<?php echo $_SESSION['picture'] ?>" alt="User Profile Picture">
								</div>
								<h5 class="user-name"><?php echo $_SESSION['givenName'] ?> <?php echo $_SESSION['familyName'] ?></h5>
								<h5 class="user-name"><?php echo $_SESSION['username'] ?></h5>
								<h6 class="user-email"><?php echo $_SESSION['email'] ?></h6>
								<button class="btn" onclick="location.href='Google_API/logout.php'">Log Out</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="plasmaResources" id="plasmaResources" style="display: block;">
		<div class="plasmadata">
			<h2>Recent Plasma Registrations</h2>
			<table>
				<thead style="color: white">
					<tr>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Age</td>
						<td>Gender</td>
						<td>Blood Group</td>
						<td>Date of Recovery</td>
						<td>Mobile Number</td>
						<td>Email</td>
						<td>Other Medical Issues</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "select * from plasma_registration limit 100;";
					$queryResult = $conn->query($query);

					$lastPlasmaData = $_SESSION['last_seen_plasmaForm'];
					$row_number = 1;
					while ($queryRow = $queryResult->fetch_row()) {
						if ($row_number >= $lastPlasmaData) {
							$row_id = "rowId" . $row_number;
							echo "<tr id='$row_id'>";
							for ($i = 1; $i < $queryResult->field_count; $i++) {
								echo "<td>$queryRow[$i]</td>";
							}
							echo '<td class="action">
								<a href="" class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>';
							echo "<a href='' class='delete' id='$row_id' name='delete' Onclick='DeleteDonor($row_id)'><i class='fas fa-trash-alt'></i></a>
							</td>";
							echo '</tr>';
						}
						echo "<script>console.log($row_number)</script>";
						$row_number++;
					}
					$_SESSION['last_seen_plasmaForm'] = mysqli_num_rows($queryResult);
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>


<?php





if ((mysqli_num_rows($queryResult)) ==  $lastPlasmaData) {
	echo "<script>document.getElementById('plasmaResources').style.display = 'none'</script>";
}
$conn->close();

?>