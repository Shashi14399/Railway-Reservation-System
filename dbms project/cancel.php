<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 $pid = $_GET['pid'];
	 	 $train = $_GET['train'];
	 if($db){
		 $much=$db->query("select * from passengers where passenger_id='$pid'");
		 if(mysqli_num_rows($much)<1){
				echo "<h1>Invalid Passenger id</h1>";
		 }
		 else{
		 $tac = "Delete from ticket_ac where passenger_id='$pid'";
		 $db->query($tac);
		 $tgen = "Delete from ticket_gen where passenger_id='$pid'";
		 $db->query($tgen);
		 $query = "select seat_type from passengers where passenger_id='$pid'";
		 $flag = $db->query($query);
		 if ($flag->num_rows > 0) {
					while($fla = $flag->fetch_assoc()) {
						$result =  $fla['seat_type'];
				}
		}
		if($result=='AC'){
			$que = "UPDATE train_status_ac set ac_seats_booked=ac_seats_booked-1,ac_seats_rem=ac_seats_rem+1 where train_no=$train";
			$db->query($que);
		}
		if($result=='GEN'){
			$quer = "UPDATE train_status_gen set gen_seats_booked=gen_seats_booked-1,gen_seats_rem=gen_seats_rem+1 where train_no=$train";
			$db->query($quer);
		}
		$pantry = "Delete from pantry where passenger_id='$pid'";
		$db->query($pantry);
		$del = "Delete from passengers where passenger_id='$pid'";
		$db->query($del);
		echo "<h2>Your Ticket has been successfuly canceled</h2>";
		echo "<a href='main.html'><button style='background:blue;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'>Home</button></a>";
	 }
	 }
	 else {
		 echo "error";
	 }
	mysqli_close($db);
 ?>
 </body>
 </html>