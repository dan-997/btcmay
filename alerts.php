<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./style.css" type="text/css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php

	$current_date = '2023-05-01';

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// show all result for simple (3 days) into the database
    $sql = "SELECT billno,collectiondate,simple,qtybalance
    FROM masterfile2023
    WHERE collectiondate BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    AND status like 'process' AND simple > 0 AND qtybalance > 0;";


$result = mysqli_query($conn,$sql);

echo "<h1>Simple (1 days)</h1>";
if (mysqli_num_rows($result) > 0) {
// Output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "<p>Simple Due: " . "<b>".$row["billno"] ."</b>". " | Collection Date: ". $row["collectiondate"]." | Simple : ".$row["simple"]." | Qty Balance : ".$row["qtybalance"]."</p>";
}
} else {
echo "0 results";
}

		// show all result for patching (3 days) into the database
    $sql2 = "SELECT billno,collectiondate,patching,qtybalance
    FROM masterfile2023
    WHERE collectiondate BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
    AND status like 'process' AND patching > 0 AND qtybalance > 0;";


$result2 = mysqli_query($conn,$sql2);

echo "<h1>Patching (3 days)</h1>";
if (mysqli_num_rows($result2) > 0) {
// Output data of each row
while($row = mysqli_fetch_assoc($result2)) {
echo "<p>Bill number: " ."<b>".$row["billno"] ."</b>" . " | Collection Date: ". $row["collectiondate"]." | Patching : ".$row["patching"]." | Qty Balance : ".$row["qtybalance"]."</p>";
}
} else {
echo "0 results";
}

	// show all result for manik (7 days) into the database
  $sql3 = "SELECT billno,collectiondate,manik,qtybalance
  FROM masterfile2023
  WHERE collectiondate BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
  AND status like 'process' AND manik > 0 AND qtybalance > 0;";


$result3 = mysqli_query($conn,$sql3);

echo "<h1>Manik (7 days)</h1>";
if (mysqli_num_rows($result3) > 0) {
// Output data of each row
while($row = mysqli_fetch_assoc($result3)) {
echo "<p>Bill number: " ."<b>".$row["billno"] ."</b>". " | Collection Date: ". $row["collectiondate"]." | Manik : ".$row["manik"]." | Qty Balance : ".$row["qtybalance"]."</p>";
}
} else {
echo "0 results";
}
  
  
  echo "<br><button><a href='index.html'>Back to main page</a></button>";
	// close the database connection
	mysqli_close($conn);
?>
</body>
</html>