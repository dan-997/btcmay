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

      $sql = "SELECT simple,emboidery,manik,patching,diamond,tudung,repair FROM `masterfile2023` WHERE billno = $billno;";

      $result = mysqli_query($conn,$sql);
    

      if (mysqli_num_rows($result) > 0) {
		// Output data of each row
		while($row = mysqli_fetch_assoc($result)) {
            $simple = $row["simple"];
            $emboidery = $row["emboidery"];
            $manik = $row["manik"];
            $patching = $row["patching"];
            $diamond = $row["diamond"];
            $tudung = $row["tudung"];
            $repair = $row["repair"];
	}
	} else {
		echo "0 results";
	}
}
    ?>

<form action="orderTypeUpdate.php" method="POST">
<br><label for="billno">Bill Number: </label><br>
    <input type="text" name="billno" value="<?php echo $billno; ?>"><br>
    
    <label for="ordertype">Order Type: </label><br>
        <label for="simple">Simple</label> 
        <input type="number" name="simple" id="simple" value="<?php echo $simple; ?>"><br>
        <label for="emboidery">Emboidery</label>
        <input type="number" name="emboidery" id="emboidery" value="<?php echo $emboidery; ?>"><br>
        <label for="manik">Manik </label>
        <input type="number" name="manik" id="manik" value="<?php echo $manik; ?>"><br>
        <label for="patching">Patching </label>
        <input type="number" name="patching" id="patching" value="<?php echo $patching; ?>"><br>
        <label for="diamond">Diamond </label>
        <input type="number" name="diamond" id="diamond" value="<?php echo $diamond; ?>"><br>
        <label for="tudung">Tudung </label>
        <input type="number" name="tudung" id="tudung" value="<?php echo $tudung; ?>"><br>
        <label for="repair">Repair </label>
        <input type="number" name="repair" id="repair" value="<?php echo $repair; ?>"><br><br>

        <input type="submit" name="submit" value="Update order type">
        
    </form>
</body>
</html>


