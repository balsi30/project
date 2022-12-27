<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="schoolclassprogram";

$connection = new mysqli($servername, $username, $password, $database);

$username = "";
$password = "";
$firstname = "";
$lastname = "";
 
$errorMessage = "";
$successMessage = "";

 if ( $_SERVER ['REQUEST_METHOD'] == 'POST'){
 	$uname = $_POST ['username'];
 	$pw = $_POST ['password'];
 	$fname = $_POST ['firstname'];
 	$lname = $_POST ['lastname'];
    
 	do {
 		if (empty($uname) || empty($pw) || empty($fname) || empty($lname) ) {
 		$errorMessage = "All the fields are required";
 		break;
 	}
    
    $check_query = "SELECT * FROM useraccount WHERE username='$uname'";
    $check_result = $connection->query($check_query);
    if($check_result->num_rows>0)
    {
        $errorMessage = "Username name is already existing.";
 		break;
		
    }

    
    
 	$sql = 'INSERT INTO useraccount (username, password, firstname, lastname)'.
 			"VALUES ('$uname', '$pw', '$fname', '$lname')";
 	$result = $connection->query($sql);

 	if (!$result){
 		$errorMessage = "Invalid query: " .$connection->error;
 		break;
 	}

 	$uname = "";
 	$pw = "";
 	$fname = "";
 	$lname = "";

 	$successMessage = "Succesfully Added";

 	header("location: /porject/index.php");
 	exit;

 	}while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="If-edge">
	<meta name ="viewport" content="width=device-width, initial-scale=1.0">
	<title>School Class Program</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container my-5">
		<h2>User Account</h2>

		<?php
		if ( !empty ($errorMessage)) {
			echo "
			<div class='alert alert-warning alert-dismisible fade show' role='alert'>
				<strong>$errorMessage</strong>
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				
			</div>
			";

		}
		?>

		<form method="post">
			 <div class="row mb-3">
			 	<label class="col-sm-3 col-form-label">Username</label>
			 	<div class="col-sm-6">
			 		<input type="text" class="form-control" name="username" value="<?php  echo $username; ?>">
			 	</div>
			 </div>
			 <div class="row mb-3">
			 	<label class="col-sm-3 col-form-label">Password</label>
			 	<div class="col-sm-6">
			 		<input type="text" class="form-control" name="password" value="<?php  echo $password; ?>">
			 	</div>
			 </div>
			 <div class="row mb-3">
			 	<label class="col-sm-3 col-form-label">Firstname</label>
			 	<div class="col-sm-6">
			 		<input type="text" class="form-control" name="firstname" value="<?php  echo $firstname; ?>">
			 	</div>
			 </div>
			 <div class="row mb-3">
			 	<label class="col-sm-3 col-form-label">Lastname</label>
			 	<div class="col-sm-6">
			 		<input type="text" class="form-control" name="lastname" value="<?php  echo $lastname; ?>">
			 	</div>
			 </div>

			 <?php
			 if ( !empty ($successMessage)) {
			 	echo "
			 	<div class='row mb-3'>
			 		<div class= 'offset-sm-3 col-sm-6'>
			 			<div class='alert alert-success alert-dismisible fade show' role='alert'>
			 				<strong>$successMessage</strong>
			 				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label></button>
			 				
			 			</div>
			 		</div>
			 	</div>
			 	";
			 }
			 ?>
		
			 <div class="row mb-3">
			 	<div class="offset-sm-3 col-sm-3 d-grid">
			 		<button type="submit" class="btn btn-primary">Submit</button>
			 	</div>
			 	<div class="col-sm-3 d-grid">
			 		<a class="btn btn-outline-primary" href="/project/index.php" role="button">Cancel</a>
			 	</div>
			 </div>
		</form>
	</div>
</body>


