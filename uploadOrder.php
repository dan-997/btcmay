<?php
if (isset($_POST['submit'])) {
	$billno = $_POST['billno'];
	$dateordered = $_POST['dateordered'];
	$collectiondate = $_POST['collectiondate'];
    $memberno = $_POST['memberno'];
    $fullamount = $_POST['fullamount'];
    $deposit = $_POST['deposit'];
    $balance = $fullamount - $deposit;
    $payment = $_POST['payment'];
    $simple = $_POST['simple'];
    $emboidery = $_POST['emboidery'];
    $manik = $_POST['manik'];
    $patching = $_POST['patching'];
    $diamond = $_POST['diamond'];
    $tudung = $_POST['tudung'];
    $repair = $_POST['repair'];
    $qty = $simple + $emboidery + $manik + $patching + $diamond;
    $status = 'pending';

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
	$sql = "INSERT INTO masterfile2023 (billno, dateordered, collectiondate, memberno, fullamount, deposit, balance, simple, emboidery, manik, patching, diamond, tudung, repair, qty, cutter, sewer, beader, embpatch, status) VALUES ('$billno', '$dateordered', '$collectiondate', '$memberno', '$fullamount', '$deposit', '$balance', '$simple', '$emboidery', '$manik', '$patching', '$diamond', '$tudung', '$repair', '$qty', '', '', '', '', '$status');";
	$sql .= "INSERT INTO depositTable (billno, deposit, paymentType) VALUES ('$billno', '$deposit', '$payment') ";

	if (mysqli_multi_query($conn, $sql)){
		echo "<h3>".$billno." ".$dateordered." ".$collectiondate." ".$memberno." ".$fullamount." ".$deposit." ".$balance." ".$simple." ".$emboidery." ".$manik." ".$patching." ".$diamond." ".$tudung." ".$repair." ".$qty." ".$status."</h3>";
		echo "<br><br>";
		echo "New Order updated";
		echo "<br><br>";
	
		echo "<button><a href='index.html'>Back to main page</a></button>";
	}
// close the database connection
	mysqli_close($conn);
}
?>
