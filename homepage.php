<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="schoolclassprogram";

$connection = new mysqli($servername, $username, $password, $database);

if(isset($_POST['btnAdd'])){
		$urname =$_POST['txtID'];
		$pwd = $_POST['txtpassword'];
		$fname = $_POST['txtFname'];
		$lname = $_POST['txtLname'];

			$sql="select * from useraccount where username ='".$urname."'";
			
			$result =mysqli_query($connect,$sql);
			$count = mysqli_num_rows($result);

			if ($count == 0){
				$sql = "INSERT INTO useraccount (username, password, firstname, lastname) VALUES ('$urname', '$pwd', '$fname', '$lname')";
				echo $sql;
				mysqli_query($connect,$sql);
				echo "<script> alert('New record save')</script>";
			}else
				echo "<script> alert('Account already existing')</script>";
		
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
		<h2>Log in</h2>

		<form method="post">
			<input type="hidden" name= "id">
			 <div class="row mb-3">
			 	<label class="col-sm-3 col-form-label">Username</label>
			 	<div class="col-sm-6">
			 		<input type="text" class="form-control" name="username">
			 	</div>
			 </div>
			 <div class="row mb-3">
			 	<label class="col-sm-3 col-form-label">Password</label>
			 	<div class="col-sm-6">
			 		<input type="text" class="form-control" name="password" >
			 	</div> 	
			 </div>
			 <br>
			 <div class="row mb-3">
			 	<div class="offset-sm-3 col-sm-3 d-grid">
			 		<button type="submit" class="btn btn-primary">Log.in</button>
			 	</div>
			 	<div class="col-sm-3 d-grid">
			 		<a class="btn btn-outline-primary" role="button">Cancel</a>
			 	</div>
			 </div>
		</form>
	</div>
</body>
</html>

