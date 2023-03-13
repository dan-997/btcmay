<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];
    $staffname = $_POST['staffname'];
    $department = $_POST['department'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    
    

	// insert data into the database
	$sql = "UPDATE masterfile2023 SET $department = '$staffname' WHERE billno = $billno";

	if (mysqli_query($conn, $sql)) {
		echo "New Order updated";
        echo "<br><br>";
        echo "<button><a href='index.html'>Back to main page</a></button>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	// this is another test
	// close the database connection
	mysqli_close($conn);
}
?>
