
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="If-edge">
	<meta name ="viewport" content="width=device-width, initial-scale=1.0">
	<title>School Class Program</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container my-5">
		<h2>List of Teachers</h2>
		<a class="btn btn-primary" href="/project/create.php" role="button">User Account</a>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th>FirstName</th>
					<th>LastName</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database ="schoolclassprogram";

				$connection = new mysqli($servername, $username, $password, $database);

				if ($connection->connect_error) {
					die("Connection failed: " .$connection->connect_error);
				}

				$sql = "SELECT * FROM useraccount";
				$result = $connection->query($sql);

				if (!$result) {
					die("Invalid query: " .$connection->error);
				}
				while ($row = $result->fetch_assoc()) {
					echo "
					<tr>
					<td>$row[username]</td>
					<td>$row[password]</td>
					<td>$row[firstname]</td>
					<td>$row[lastname]</td>
					<td>
						<a class ='btn btn-primary btn-sm' href='/project/edit.php?id=$row[id]'>Edit</a>
						<a class ='btn btn-primary btn-sm' color href='/project/delete.php?id=$row[id]'>Delete</a>
					</td>
				</tr>
					";
				}
				?>
				
			</tbody>
			
		</table>
		
	</div>

</body>
</html>
