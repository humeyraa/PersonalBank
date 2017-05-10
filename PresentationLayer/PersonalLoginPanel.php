<?php 
	require_once('LogicLayer/CustomerManager.php');
	
	if( isset($_POST["uName"]) && isset($_POST["uPassword"]) ) 
	{ 
		$customer_name = trim($_POST["uName"]);
		$login_password = trim($_POST["uPassword"]);
		
		$result = CustomerManager::getCustomer($customer_name, $login_password);
		
		
		if($result[0]->getCustomer_ID() == null)
		{
			$message = "Incorrect entry, try again";
		}
		else
		{
			session_start();
			$_SESSION['activeUser'] = $result[0];
			
			header("location: PersonalUIExternal.php");
		}	
	}
	else
	{
		$message = "";
	} 
?> 
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>PHP Session</title>
		<style type="text/css">
			form {
			width: 400px;
			margin-left: auto;
			margin-right: auto;
			padding: 15px;
			background-color: #FAFAFA;
			}
		</style>
	</head>
	<body> 
		<form action="<?php $_PHP_SELF ?>" method="POST"> 
			<table>
				<tr>
					<td>
						Enter Customer Number : 
					</td>
					<td>
						<input type="text" name="uName" />
					</td>
				</tr>
				<tr>
					<td>
						Enter Password : 
					</td>
					<td>
						<input type="password" name="uPassword" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?php echo $message; ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" />
					</td>
				</tr>
			</table>
		</form> 
	</body> 
</html>