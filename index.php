<?php
	require_once('LogicLayer/AdminManager.php');
	if(isset($_POST["AdminPanel"])) {
									
			header("location: AdminLoginPanel.php");				
	}
	else if(isset($_POST["PersonalAccount"])) {
									
			header("location: PersonalLoginPanel.php");				
	}
								
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/div.css">
<title> Ceng Bank </title>
</head>
<body>
<div >
<form id="form1" name="form1" method="post" action=""> 
<img src="Images/logo.jpg" width="400px" height="150px">

<tr>

	<td><input type="submit" name="AdminPanel" id="AdminPanel" value="Admin Access" /></td>
	


	<td><input type="submit" name="PersonalAccount" id="PersonalAccount" value="Personal" /></td>
	</tr>

</form>
</div>
<div>
</div>
</body>
<html>
