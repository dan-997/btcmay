<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
</head>
</html>


<?php
if (isset($_POST['submit'])) {
	$staffname = $_POST['staffname'];
	$month = $_POST['month'];
  $year = $_POST['year'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
  $sql = "SELECT SUM(quantity) as total FROM Staff WHERE MONTH(dateDistributed) = $month AND YEAR(dateDistributed) = $year AND staffName = '$staffname';";
	$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<h1> Number of clothes: ".$row["total"]." Within: ".$month."-".$year."</h1>";
    }
  }
  else{
    echo "no result";
  }

      echo "<button><a href='index.html'>Back to main page</a></button>";

// close the database connection
	mysqli_close($conn);
}
?>
