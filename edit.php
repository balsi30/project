<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="schoolclassprogram";


$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$username = "";
$password = "";
$firstname ="";
$lastname = "";
$errorMessage = "";
$sucessMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {	
	
	if ( !isset($_GET["id"]) ) {
		header("location: /project/index.php");
		exit;
	}

	$id = $_GET ["id"];


$sql = "SELECT * FROM useraccount where id=$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if (!$row){
	header("location: /project/index.php");
	exit;
}

$username = $row['username'];
$password = $row['password'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
}
else {

$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

do{
	if ( empty($id) || empty($username) || empty ($password) || empty($firstname) || empty($lastname) ) {
	$errorMessage = "All the fields are required";
	break;
}

$sql = "UPDATE useraccount SET username = '$username', password = '$password', firstname ='$firstname', lastname = '$lastname' WHERE id = $id";

	$result = $connection->query($sql);

	if (!$result){
		$errorMessage = "Invalid query: " .$connection->error;
		break;
	}

	$successMessage = "Client updated correctly";

	header("location: /project/index.php");
	exit;
	
}while (true);
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
			<input type="hidden" name= "id" value= "<?php  echo $id;?>">
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
			 <br>
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
</html>