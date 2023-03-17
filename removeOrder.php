<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
</head>
</html>


<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
	$sql = "DELETE FROM masterfile2023 WHERE billno = '$billno'";

	if (mysqli_query($conn, $sql)){
		echo "Bill removed";
		echo "<br><br>";
	
		echo "<button><a href='index.html'>Back to main page</a></button>";
	}

// close the database connection
	mysqli_close($conn);
}
?>
