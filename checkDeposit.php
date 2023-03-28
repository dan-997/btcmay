<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

      $sql = "SELECT fullamount,deposit,balance FROM `masterfile2023` WHERE billno = $billno;";

      $result = mysqli_query($conn,$sql);
    

      if (mysqli_num_rows($result) > 0) {
		// Output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "Full Amount: " . $row["fullamount"] . "<br>"."Deposit: " . $row["deposit"] . "<br>"."Balance: " . $row["balance"] . "<br>";
		}
	} else {
		echo "0 results";
	}
}
    ?>

<form action="cashDeposit.php" method="POST">
<br><label for="billno">Bill Number: </label><br>
    <input type="text" name="billno" value="<?php echo $billno; ?>"><br>
    <label for="depoval">Deposit Value: </label><br>
        <input type="text" name="depoval" id="depoval" required><br><br>

        <label for="paymenttype">Payment Type: </label><br>
        <input type="radio" name="payment" id="online" value="online transfer">
        <label for="online">Online Transfer</label><br>
        <input type="radio" name="payment" id="card" value="card payment">
        <label for="card">Card Payment</label><br>
        <input type="radio" name="payment" id="cash" value="cash payment">
        <label for="cash">Cash Payment</label><br><br>
    
        <input type="submit" name="submit" value="Cash Deposit">
        
    </form>
</body>
</html>