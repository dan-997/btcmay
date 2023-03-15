<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];
    $status = $_POST['order'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
    $sql = "UPDATE masterfile2023 SET status = '$status' WHERE billno = '$billno'";

	if (mysqli_query($conn, $sql)){
		echo "Status updated";
		echo "<br><br>";
	
		echo "<button><a href='index.html'>Back to main page</a></button>";
	}
// close the database connection
	mysqli_close($conn);
}
?>
