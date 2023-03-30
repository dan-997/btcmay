<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];
    $simple = $_POST['simple'];
    $emboidery = $_POST['emboidery'];
    $manik = $_POST['manik'];
    $patching = $_POST['patching'];
    $diamond = $_POST['diamond'];
    $tudung = $_POST['tudung'];
    $repair = $_POST['repair'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// update item done + balance
    $sql = "UPDATE masterfile2023 SET `simple`='$simple',`emboidery`='$emboidery',`manik`='$manik',`patching`='$patching',`diamond`='$diamond',`tudung`='$tudung' WHERE billno = $billno;";

	if (mysqli_query($conn, $sql)){
		echo "Done updated";
		echo "<br><br>";
	
		echo "<button><a href='index.html'>Back to main page</a></button>";
	}
// close the database connection
	mysqli_close($conn);
}
?>
