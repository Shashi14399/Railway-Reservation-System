<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 $pid = $_GET['pid'];
	 if($db){
	 $query = "select pnr_no,train_name,gender,age,name,seat_number,ticket_id,seat_type,Src,Dst from passengers,trains where passenger_id='$pid' and source=Src";
	 $result = $db->query($query);
	 
		echo "
			<table border='1' width='100%'>
			<caption style='font-size:30px'>Ticket</caption>
				<tr>
				<th>PNR No</th>
				<th>Train Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Name</th>
				<th>Seat No</th>
				<th>Ticket Id</th>
				<th>Seat Type</th>
				<th>Source</th>
				<th>Destination</th>
				</tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['pnr_no'] . "</td>";
			echo "<td>" . $row['train_name'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['age'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['seat_number'] . "</td>";
			echo "<td>" . $row['ticket_id'] . "</td>";
			echo "<td>" . $row['seat_type'] . "</td>";
			echo "<td>" . $row['Src'] . "</td>";
			echo "<td>" . $row['Dst'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		$pantry = "select dinner,lunch,breakfast from pantry where passenger_id='$pid'";
		$pan = $db->query($pantry);
		echo "
			<table border='1'>
			<caption style='font-size:30px'>Pantry Coupon</caption>
				<tr>
				<th>Dinner</th>
				<th>Lunch</th>
				<th>Breakfast</th>
				</tr>";
		while($row=mysqli_fetch_array($pan))
		{
			echo "<tr>";
			echo "<td>" . $row['dinner'] . "</td>";
			echo "<td>" . $row['lunch'] . "</td>";
			echo "<td>" . $row['breakfast'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";

	}
	
	 else
	 {
		 echo "error";
	 }
	 echo "<a href='main.html'><button style='background:blue;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'>Home</button></a>";
	 mysqli_close($db);
?>
</body>
</html>