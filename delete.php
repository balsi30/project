<?php
if (isset ($_GET['id']) ) {
	$id = $_GET ["id"];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database ="schoolclassprogram";

	$connection = new mysqli($servername, $username, $password, $database);

	$sql = "DELETE FROM useraccount WHERE id=$id";
	$connection->query($sql);
}
header("location: /project/index.php");
exit;
?>
