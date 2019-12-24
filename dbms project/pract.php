<html>
<head>
<title></title>
</head>
<body>
<?php 
	
	if($_GET['lunch']=='lunch' and $_GET['dinner']=='dinner')
	{
		echo 'dinner and lunch';
	}
	elseif($_GET['dinner']=='dinner')
	{
		echo 'dinner';
	}
	else
	{
		echo 'lunch';
	}
 ?>
 </body>
 </html>