<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Member</title>
</head>
<body>
<?php 
      $conn = mysqli_connect("localhost", "root","", "btcmay");
	
      // check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      } 

      $sql = "select max(memberno) as max_member from Customer;";


      $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result) > 0) {
		// Output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "Current Member Number: " . $row["max_member"] . "<br>";
		}
	} else {
		echo "0 results";
	}
    ?>
    <h2>New Member</h2>
    <form action="newMember.php" method="POST">
        <label for="memberno">Member Number: </label>
        <input type="text" name="memberno" id="memberno" required><br><br>

        <label for="membername">Member Name: </label>
        <input type="text" name="membername" id="membername" required><br><br>

        <label for="memberphone">Member Phone: </label>
        <input type="text" name="memberphone" id="memberphone" required minlength="7" ><br><br>
       
        <input type="submit" name="submit" value="Send Member">
        
    </form>
</body>
</html>