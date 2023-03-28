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

	// extract data from the database
    $sql = "select billno,dateordered,collectiondate,memberno,fullamount,deposit,balance,simple,emboidery,manik,patching,diamond,tudung,repair,qty,cutter,sewer,beader,embpatch,status FROM masterfile2023 WHERE billno = $billno ORDER BY status";
    $counter = "select count(*) AS total FROM masterfile2023 WHERE billno = $billno";
    $result = $conn->query($sql);
    $result2 = $conn->query($counter);

    if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {
        echo "<h1>".$row["total"]." number of items </h1>";
      }
    }


    if ($result->num_rows > 0) {
      echo "<table id='customers'><tr><th>Bill No</th><th>Date Ordered</th><th>Collection Date</th><th>Member No</th><th>Full Amount</th><th>Deposit</th><th>Balance</th><th>Simple</th><th>Emboidery</th><th>Manik</th><th>Patching</th><th>Diamond</th><th>Tudung</th><th>Repair</th><th>Quantity</th><th>Cutter</th><th>Sewer</th><th>Beader</th><th>Embpatch</th><th>Status</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["billno"]."</td><td>".$row["dateordered"]."</td><td>".$row["collectiondate"]."</td><td>".$row["memberno"]."</td><td>".$row["fullamount"]."</td><td>".$row["deposit"]."</td><td>".$row["balance"]."</td><td>".$row["simple"]."</td><td>".$row["emboidery"]."</td><td>".$row["manik"]."</td><td>".$row["patching"]."</td><td>".$row["diamond"]."</td><td>".$row["tudung"]."</td><td>".$row["repair"]."</td><td>".$row["qty"]."</td><td>".$row["cutter"]."</td><td>".$row["sewer"]."</td><td>".$row["beader"]."</td><td>".$row["embpatch"]."</td><td>".$row["status"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  echo "<br><button><a href='index.html'>Back to main page</a></button>";	// close the database connection
	mysqli_close($conn);
}
?>