<?php
if (isset($_POST['submit'])) {
	$memberno = $_POST['memberno'];
	$membername = $_POST['membername'];
	$memberphone = $_POST['memberphone'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
	$sql = "INSERT INTO Customer (memberno, membername, memberphone) values ($memberno,'$membername',$memberphone)";

	if (mysqli_query($conn, $sql)) {
		echo "New Member updated";
        echo "<br><br>";
        echo "<button><a href='index.html'>Back to main page</a></button>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// close the database connection
	mysqli_close($conn);
}
?>
