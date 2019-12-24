<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 $uname = $_GET['uname'];
	 
	 $email = $_GET['email'];
	 $gender = $_GET['gender'];

	 
	 $age = $_GET['age'];
	 $mob = $_GET['mob_no'];
	 $ad = $_GET['ad_no'];
	 $address = $_GET['address'];
	 $num = RAND(1000,9999);
	 if($db){
	 		
	 $query = "INSERT into user values($num,'$uname','$email','$gender','$age','$mob','$ad','$address')";
	 $db->query($query);
	 echo "<script type ='text/javascript'>alert('Your user id is $num');</script>";
	 echo'<h2>Please see the train details and seat availability before booking the ticket</h2></br>';
	 echo'<h2>If you already have then go to booking</h2></br>';
	 echo "<a href='train_details.html'><button style='background:blue;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'>Train Details</button></a>";
	 echo "<a href='passenger.html'><button style='background:green;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'> Go to booking</button></a>";
	echo "<a href='seats.php'><button style='background:blue;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'>Seat Availability</button></a>";
				 
	}
	else{
		echo "error";
	}
	mysqli_close($db);
 ?>
 </body>
 </html>
