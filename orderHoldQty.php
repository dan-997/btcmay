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
    
    <label for="depoval">Value Completed: </label><br>
        <input type="text" name="valcomp" id="valcomp" required><br><br>

        <input type="submit" name="submit" value="Update Value">
        
    </form>
</body>
</html>


