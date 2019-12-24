<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 if($db){
	 $query = "Select * from train_status_ac";
	 $result = $db->query($query);
	 
		echo "
			<table border='1'>
			<caption style='font-size:30px'>AC Seats</caption>
				<tr>
				<th>Train No</th>
				<th>Seats Booked</th>
				<th>Seats Remaining</th>
				<th>Total Seats</th>
				</tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['train_no'] . "</td>";
			echo "<td>" . $row['ac_seats_booked'] . "</td>";
			echo "<td>" . $row['ac_seats_rem'] . "</td>";
			echo "<td>" . $row['ac_seats_total'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		
		$quer = "Select * from train_status_gen";
		$res = $db->query($quer);
	 
		echo "
			<table border='1'>
			<caption style='font-size:30px'>General Seats</caption>
				<tr>
				<th>Train No</th>
				<th>Seats Booked</th>
				<th>Seats Remaining</th>
				<th>Total Seats</th>
				</tr>";
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>" . $row['train_no'] . "</td>";
			echo "<td>" . $row['gen_seats_booked'] . "</td>";
			echo "<td>" . $row['gen_seats_rem'] . "</td>";
			echo "<td>" . $row['gen_seats_total'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
			
	}
	
	 else
	 {
		 echo "error";
	 }
	 mysqli_close($db);
?>
</body>
</html>