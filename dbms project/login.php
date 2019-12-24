<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 if($db){
		 $na=$_GET["name"];
			$pa=$_GET["password"];
			$flag=$db->query("SELECT * FROM signup WHERE Name='$na'");
			if(mysqli_num_rows($flag)>=1){
				$res=mysqli_fetch_object($flag);
				$p=$res->password;
				if($pa===$p){
					header("Location:main.html");
			}}
		 else{
			 echo "<h1>Your Username and password do not match</h1>";
		 }
		 
	
	 
	}
	else{
		echo "error";
	}
	mysqli_close($db);
 ?>
 </body>
 </html>
