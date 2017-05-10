<?php
	require_once('LogicLayer/AdminManager.php');
	if(isset($_POST["AdminPanel"])) {
									
			header("location: PresentationLayer\AdminLoginPanel.php");				
	}
								
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/div.css">
<title> Ceng Bank </title>
</head>
<body>
<div >
<img src="Images/logo.jpg" width="400px" height="150px">
<form id="form1" name="form1" method="post" action="">
	<input type="submit" name="AdminPanel" id="AdminPanel" value="Admin Access" />
</form>
</div>
<div>
</div>
</body>
<html>
