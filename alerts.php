<?php
	$today = date("Y-m-d");
	$end = $_POST['endOrderDate'];

	// connect to the database
	$conn = mysqli_connect("localhost", "root","", "btcmay");

	// check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// show all result for patching (3 days) into the database
    $sql = "select billno,dateordered,collectiondate,memberno,simple,emboidery,manik,patching,diamond,tudung,repair,qty,cutter,sewer,beader,embpatch,status FROM masterfile2023 WHERE collectiondate = dateadd(day,3,convert(datetime,$today)";

    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
        echo "<table id='customers'><tr><th>Bill No</th><th>Date Ordered</th><th>Collection Date</th><th>Member No</th><th>Full Amount</th><th>Deposit</th><th>Balance</th><th>Payment Type</th><th>Simple</th><th>Emboidery</th><th>Manik</th><th>Patching</th><th>Diamond</th><th>Tudung</th><th>Repair</th><th>Quantity</th><th>Cutter</th><th>Sewer</th><th>Beader</th><th>Embpatch</th><th>Status</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["billno"]."</td><td>".$row["dateordered"]."</td><td>".$row["collectiondate"]."</td><td>".$row["memberno"]."</td><td>".$row["fullamount"]."</td><td>".$row["deposit"]."</td><td>".$row["balance"]."</td><td>".$row["payment"]."</td><td>".$row["simple"]."</td><td>".$row["emboidery"]."</td><td>".$row["manik"]."</td><td>".$row["patching"]."</td><td>".$row["diamond"]."</td><td>".$row["tudung"]."</td><td>".$row["repair"]."</td><td>".$row["qty"]."</td><td>".$row["cutter"]."</td><td>".$row["sewer"]."</td><td>".$row["beader"]."</td><td>".$row["embpatch"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }

    // insert data into the database
    $sql = "select billno,dateordered,collectiondate,memberno,fullamount,deposit,balance,payment,simple,emboidery,manik,patching,diamond,tudung,repair,qty,cutter,sewer,beader,embpatch,status FROM masterfile2023 WHERE dateordered between '$start' and '$end'";

    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
        echo "<table id='customers'><tr><th>Bill No</th><th>Date Ordered</th><th>Collection Date</th><th>Member No</th><th>Full Amount</th><th>Deposit</th><th>Balance</th><th>Payment Type</th><th>Simple</th><th>Emboidery</th><th>Manik</th><th>Patching</th><th>Diamond</th><th>Tudung</th><th>Repair</th><th>Quantity</th><th>Cutter</th><th>Sewer</th><th>Beader</th><th>Embpatch</th><th>Status</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["billno"]."</td><td>".$row["dateordered"]."</td><td>".$row["collectiondate"]."</td><td>".$row["memberno"]."</td><td>".$row["fullamount"]."</td><td>".$row["deposit"]."</td><td>".$row["balance"]."</td><td>".$row["payment"]."</td><td>".$row["simple"]."</td><td>".$row["emboidery"]."</td><td>".$row["manik"]."</td><td>".$row["patching"]."</td><td>".$row["diamond"]."</td><td>".$row["tudung"]."</td><td>".$row["repair"]."</td><td>".$row["qty"]."</td><td>".$row["cutter"]."</td><td>".$row["sewer"]."</td><td>".$row["beader"]."</td><td>".$row["embpatch"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      
    // insert data into the database
    $sql = "select billno,dateordered,collectiondate,memberno,fullamount,deposit,balance,payment,simple,emboidery,manik,patching,diamond,tudung,repair,qty,cutter,sewer,beader,embpatch,status FROM masterfile2023 WHERE dateordered between '$start' and '$end'";

    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
        echo "<table id='customers'><tr><th>Bill No</th><th>Date Ordered</th><th>Collection Date</th><th>Member No</th><th>Full Amount</th><th>Deposit</th><th>Balance</th><th>Payment Type</th><th>Simple</th><th>Emboidery</th><th>Manik</th><th>Patching</th><th>Diamond</th><th>Tudung</th><th>Repair</th><th>Quantity</th><th>Cutter</th><th>Sewer</th><th>Beader</th><th>Embpatch</th><th>Status</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["billno"]."</td><td>".$row["dateordered"]."</td><td>".$row["collectiondate"]."</td><td>".$row["memberno"]."</td><td>".$row["fullamount"]."</td><td>".$row["deposit"]."</td><td>".$row["balance"]."</td><td>".$row["payment"]."</td><td>".$row["simple"]."</td><td>".$row["emboidery"]."</td><td>".$row["manik"]."</td><td>".$row["patching"]."</td><td>".$row["diamond"]."</td><td>".$row["tudung"]."</td><td>".$row["repair"]."</td><td>".$row["qty"]."</td><td>".$row["cutter"]."</td><td>".$row["sewer"]."</td><td>".$row["beader"]."</td><td>".$row["embpatch"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
    echo "<br><button><a href='index.html'>Back to main page</a></button>";
	// close the database connection
	mysqli_close($conn);
?>