<?php 
	require_once("LogicLayer/CustomerManager.php");
	session_start();
	$activeUser = null;
	
	if(isset($_SESSION['activeUser'])) {
		$activeUser =  $_SESSION['activeUser'];
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Admin Interface</title>
		<link rel="stylesheet" type="text/css" href="style/site.css">
	</head>
	<body> 
		<?php
			if(isset($activeUser)) {
		?>
		<div id="dvMain">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblUsers">
					<tbody>
						<tr>
							<?php 
								if(isset($activeUser)) {
							?> 
							<th><?php echo "Welcome " . $activeUser->getCustomer_Name(); ?> </th>
							<?php
							}
							?>
						</tr>
						
						<tr>
							<th>Name</th>
							<th>Phone No</th>
							<th>Email Address</th>
						</tr>
						
							
						<tr>
							
							<td>
								<form id="form1" name="form1" method="post" action="">
								<input type="submit" name="newCustomer" id="newCustomer" value="Add New Customer" />
								</form>
							</td>
							<td>
								<input type="submit" name="deleteCustomer" id="deleteCustomer" value="Delete Customer" />
							</td>
							<td>
								<input type="submit" name="CreateAccountforCustomer" id="CreateAccountforCustomer" value="Create Account for Customer" />
							</td>
							
						</tr>
						<tr>
							<td><a>TC No:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_TC() ?> <a/></td>
							
						</tr>
						<tr>
							<td><a>Customer Number:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_Number() ?> <a/></td>
							
						</tr>
						<tr>
							<td><a>Password:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_Password() ?> <a/></td>
							<td><input type="text" name="pass" /></td>
						</tr>
						<tr>
							<td><a>Birth Date:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_BirthDate() ?> <a/></td>
						</tr>
						<tr>
							<td><a>Phone No:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_TC() ?> <a/></td>
							<td><input type="text" name="TC" /></td>
						</tr>
						<tr>
							<td><a>E-Mail Address:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_Email() ?> <a/></td>
							<td><input type="text" name="TC" /></td>
						</tr>
						<tr>
							<td><a>Home Address:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_Address() ?> <a/></td>
							<td><input type="text" name="TC" /></td>
						</tr>
						<tr>
							<td><a>Loan Point:<a/></td>
							<td><a><?php echo $activeUser->getCustomer_LoanPoint() ?> <a/></td>
							<td><input type="text" name="TC" /></td>
						</tr>
						
						
						
						<?php
					
							if(isset($_POST["newCustomer"])) {
								header("location: AdminCustomerAddExternal.php");
							}
							else if(isset($_POST["deleteCustomer"])) {
								header("location: AdminDeleteCustomerExternal.php");
							}
							else if(isset($_POST["CreateAccountforCustomer"])) {
								header("location: AdminCreateAccountExternal.php");
							}
						
						?>
						
						
					</tbody>
					
				</table>
				
				
						
				
						
				
			</form>
		</div>
		<?php
			}
			else {
					echo "<a href='AdminLoginPanel.php'>Giriþ yapýnýz!</a>";
				}
		?>
	</body> 
</html>