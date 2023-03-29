<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
</head>
</html>

<?php
if (isset($_POST['submit'])) {
	$phoneno = $_POST['phoneno'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// insert data into the database
    $sql = "select m.billno,m.dateordered,m.collectiondate,m.memberno,m.fullamount,m.deposit,m.balance,m.simple,m.emboidery,m.manik,m.patching,m.diamond,m.tudung,m.repair,m.qty,m.done,m.qtybalance,m.cutter,m.sewer,m.beader,m.embpatch,m.status FROM masterfile2023 m JOIN Customer c ON m.memberno = c.memberno WHERE c.memberphone = $phoneno";
    $counter = "SELECT m.status, COUNT(*) AS statuscount
    FROM masterfile2023 m JOIN Customer c on m.memberno = c.memberno 
    WHERE c.memberphone = $phoneno
    GROUP BY m.status ;";
    $result = $conn->query($sql);
    $result2 = $conn->query($counter);

    

    if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {
        echo "<h1>".$row["status"]." number: ".$row["statuscount"]. "</h1>";
      }
    }

    $summage = "SELECT SUM(simple) AS ss, SUM(emboidery) AS se, sum(manik) as sm, sum(patching) as sp, sum(diamond) as sd, sum(tudung) as st, sum(repair) as sr 
    FROM masterfile2023 m join Customer c on m.memberno = c.memberno
    WHERE c.memberphone = $phoneno;";

    $result3 = $conn->query($summage);
    if ($result3->num_rows > 0) {
      while($row = $result3->fetch_assoc()) {
        echo "<p> Simple: ".$row["ss"]." | Emboidery: ".$row["se"]." | Manik: ".$row["sm"]." | Patching: ".$row["sp"]." | Diamond: ".$row["sd"]." | Tudung: ".$row["st"]." | Repair: ".$row["sr"]. "</p>";
      }
    }
    else{
      echo "error";
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
    echo "<br><button><a href='index.html'>Back to main page</a></button>";
	// close the database connection
	mysqli_close($conn);
}
?>