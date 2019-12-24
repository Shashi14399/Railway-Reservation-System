<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 $uid = $_GET['uid'];
	 $pname = $_GET['pname'];
	 $gender = $_GET['gender'];
	 $train = $_GET['train'];
	 $status = $_GET['status'];
	 $age = $_GET['age'];
	 $quota = $_GET['quota'];
	 $profession = $_GET['profession'];
	 $intr = $_GET['intr'];
	 $pid = RAND(100000,999999);
	 $pnr = RAND(10000000,99999999);
	 $sno = RAND(1,400);
	 $tid = RAND(10000,11000);
	 $lunch = $_GET['lunch'];
	 $breakfast = $_GET['break'];
	 $dinner = $_GET['dinner'];
	 if($db){
		$source = "select source from trains where train_no=$train";
		$src = $db->query($source);
		if ($src->num_rows > 0) {
    while($sr = $src->fetch_assoc()) {
        $pri =  $sr['source'];
	}
		}
	 	
		
	 echo "<h2>Booking Successfull!!</h2>";
	 if($status=='AC'){
		
		if($intr=='Y'){
				$some = "select Intermediate_stn from trains where train_no=$train";
				$som = $db->query($some);
				if ($som->num_rows > 0) {
					while($so = $som->fetch_assoc()) {
						$prin =  $so['Intermediate_stn'];
				}
		}
	 $query = "INSERT into passengers values($pid,$pnr,'$gender','$age','$pname','CNF',$sno,$tid,'$profession','$uid','$pri','$prin','AC')";
	 $db->query($query);
		}
		
		if($intr=='N'){
				$sums = "select destination from trains where train_no=$train";
				$sum = $db->query($sums);
				if ($sum->num_rows > 0) {
					while($su = $sum->fetch_assoc()) {
						$pr =  $su['destination'];
				}
		}
	 $query = "INSERT into passengers values($pid,$pnr,'$gender','$age','$pname','CNF',$sno,$tid,'$profession','$uid','$pri','$pr','AC')";
	 $db->query($query);
		}
		
		$quer = "INSERT into ticket_ac values('$train',$pid)";
		$db->query($quer);
		$que = "UPDATE train_status_ac set ac_seats_booked=ac_seats_booked+1,ac_seats_rem=ac_seats_rem-1 where train_no=$train";
		$db->query($que);
		$ac = "select fare_ac from fare where quota='$quota' and train_no=$train";
		$fareac = $db->query($ac);
		if ($fareac->num_rows > 0) {
    while($row = $fareac->fetch_assoc()) {
        echo "<br><h2>Amount Payable is</h2>" . $row['fare_ac'] . "<br>";
		echo "<a href='ticgen.html'><button style='background:blue;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'>Pay rupees" . $row['fare_ac']  . "</button></a>";
    }
} 
	 }
	 if($status=='GEN'){
		 
		if($intr=='Y'){
				$some = "select Intermediate_stn from trains where train_no=$train";
				$som = $db->query($some);
				if ($som->num_rows > 0) {
					while($so = $som->fetch_assoc()) {
						$prin =  $so['Intermediate_stn'];
				}
		}
	 $query = "INSERT into passengers values($pid,$pnr,'$gender','$age','$pname','CNF',$sno,$tid,'$profession','$uid','$pri','$prin','GEN')";
	 $db->query($query);
		}
		
		if($intr=='N'){
				$sums = "select destination from trains where train_no=$train";
				$sum = $db->query($sums);
				if ($sum->num_rows > 0) {
					while($su = $sum->fetch_assoc()) {
						$pr =  $su['destination'];
				}
		}
	 $query = "INSERT into passengers values($pid,$pnr,'$gender','$age','$pname','CNF',$sno,$tid,'$profession','$uid','$pri','$pr','GEN')";
	 $db->query($query);
		}
		 
		$qu = "INSERT into ticket_gen values('$train',$pid)";
		$db->query($qu);
		$queryy = "UPDATE train_status_gen set gen_seats_booked=gen_seats_booked+1,gen_seats_rem=gen_seats_rem-1 where train_no=$train";
		$db->query($queryy);
		$gen = "SELECT fare_gen FROM fare WHERE quota='$quota' and train_no=$train";
		$faregen = $db->query($gen);
		if ($faregen->num_rows > 0) {
    while($row = $faregen->fetch_assoc()) {
        echo "<br><h2>Amount Payable is</h2>" . $row['fare_gen'] . "<br>";
		echo "<a href='ticgen.html'><button style='background:blue;padding:8px;color:white;margin-left:50px;width:300px;margin-top:100px'>Pay rupees" . $row['fare_gen']  . "</button></a>";
    
    }
} 
	 }
	if($dinner == 'Y' and $lunch=='Y' and $breakfast=='Y')
	{
			$pan = "INSERT into pantry values('YES','YES','YES',$pid)";
			$db->query($pan);
	}
	elseif($dinner == 'Y' and $lunch=='Y' and $breakfast=='N')
	{
			$pan = "INSERT into pantry values('YES','YES','NO',$pid)";
			$db->query($pan);
	}
	elseif($dinner == 'N' and $lunch=='Y' and $breakfast=='Y')
	{
			$pan = "INSERT into pantry values('NO','YES','YES',$pid)";
			$db->query($pan);
	}
	elseif($dinner == 'Y' and $lunch=='N' and $breakfast=='Y')
	{
			$pan = "INSERT into pantry values('YES','NO','YES',$pid)";
			$db->query($pan);
	}
	elseif($dinner == 'Y' and $lunch=='N' and $breakfast=='N')
	{
			$pan = "INSERT into pantry values('YES','NO','NO',$pid)";
			$db->query($pan);
	}
	elseif($dinner == 'N' and $lunch=='N' and $breakfast=='Y')
	{
			$pan = "INSERT into pantry values('NO','NO','YES',$pid)";
			$db->query($pan);
	}
	elseif($dinner == 'N' and $lunch=='Y' and $breakfast=='N')
	{
			$pan = "INSERT into pantry values('NO','YES','NO',$pid)";
			$db->query($pan);
	}
	 }
	else{
		echo "error";
	}
	echo "<script type ='text/javascript'>alert('Your passenger id is $pid');</script>";
	mysqli_close($db);
 ?>
 </body>
 </html>