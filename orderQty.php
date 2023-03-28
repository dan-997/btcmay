<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];
    $done = $_POST['valcomp'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// update item done + balance
    $sql = "UPDATE masterfile2023 SET done = done + $done WHERE billno = $billno;";
    $sql .= "UPDATE masterfile2023 SET qtybalance = ((SELECT qty FROM masterfile2023 WHERE billno = '$billno') - (SELECT done FROM masterfile2023 WHERE billno = '$billno')) WHERE billno = '$billno'";

	if (mysqli_multi_query($conn, $sql)){
		echo "Done updated";
		echo "<br><br>";
	
		echo "<button><a href='index.html'>Back to main page</a></button>";
	}
// close the database connection
	mysqli_close($conn);
}
?>
