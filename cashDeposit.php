<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];
    $deposit = $_POST['depoval'];
    $payment = $_POST['payment'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
	$sql = "INSERT INTO depositTable (billno, deposit, paymentType) VALUES ('$billno', '$deposit', '$payment');";
    $sql .= "UPDATE masterfile2023 SET deposit = ((SELECT deposit FROM masterfile2023 WHERE billno = '$billno') + '$deposit') WHERE billno = '$billno';";
    $sql .= "UPDATE masterfile2023 SET balance = ((SELECT fullamount FROM masterfile2023 WHERE billno = '$billno') - (SELECT deposit FROM masterfile2023 WHERE billno = '$billno')) WHERE billno = '$billno'";

	if (mysqli_multi_query($conn, $sql)){
		echo "Bill updated";
		echo "<br><br>";
	
		echo "<button><a href='index.html'>Back to main page</a></button>";
	}
// close the database connection
	mysqli_close($conn);
}
?>
