<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    if (isset($_POST['submit'])) {
    $billno = $_POST['billno'];
      $conn = mysqli_connect("localhost", "root","", "btcmay");

      // check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      } 

      $sql = "SELECT status,qty,done,qtybalance FROM `masterfile2023` WHERE billno = $billno;";

      $result = mysqli_query($conn,$sql);
    

      if (mysqli_num_rows($result) > 0) {
		// Output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<b> Current Status: </b>" . $row["status"] . "<br>"."<b> Total Quantity:</b> " . $row["qty"] . "<br>"."<b>Quantity Done: </b>" . $row["done"] . "<br><b>Quantity Left: </b>" . $row["qtybalance"] ."<br>";
		}
	} else {
		echo "0 results";
	}
}
    ?>

<form action="orderStatus.php" method="POST">
<br><label for="billno">Bill Number: </label><br>
    <input type="text" name="billno" value="<?php echo $billno; ?>"><br>
    <label for="status">Order Status: </label><br>
        <input type="radio" name="order" id="completed" value="completed">
        <label for="completed">Completed</label><br>
        <input type="radio" name="order" id="taken1" value="taken 1">
        <label for="taken1">Taken 1</label><br>
        <input type="radio" name="order" id="taken2" value="taken 2">
        <label for="taken2">Taken 2</label><br>
        <input type="radio" name="order" id="taken3" value="taken 3">
        <label for="taken3">Taken 3</label><br>
        <input type="radio" name="order" id="taken" value="taken">
        <label for="taken">Taken</label><br>
        <input type="radio" name="order" id="process" value="process">
        <label for="process">Process</label><br>
        <input type="radio" name="order" id="alter" value="alter">
        <label for="alter">Alter</label><br><br>

        <input type="submit" name="submit" value="Update Status">
        
    </form>
</body>
</html>
