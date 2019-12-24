<html>
<head>
<title></title>
</head>
<body>
<?php 
	 $db=mysqli_connect("localhost","root","","railways");
	 if($db){
	
	 $query = "INSERT into signup values('$_GET[name]','$_GET[password]')";
	 $db->query($query);
		header("Location:main.html");
		 
	}
	else{
		echo "error";
	}
	mysqli_close($db);
 ?>
 </body>
 </html>
