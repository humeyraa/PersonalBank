<?php
	require_once("LogicLayer/AdminManager.php");
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
							<th><?php echo "Welcome Admin " . $activeUser; ?> </th>
							<?php
							}
							?>
						</tr>
						
						<tr>
							<th>Name</th>
							<th>Phone No</th>
							<th>Email Address</th>
						</tr>
						<?php 
							$adminList = AdminManager::getAllAdmins();
							
							for($i = 0; $i < count($adminList); $i++) {
							?>
							<tr>
								<td><?php echo $adminList[$i]->getAdmin_Name(); ?></td>
								<td><?php echo $adminList[$i]->getAdmin_Phone(); ?></td>
								<td><?php echo $adminList[$i]->getAdmin_Email(); ?></td>
							</tr>
							<?php
							}
						?>
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
					echo "<a href='AdminLoginPanel.php'>Giriş yapınız!</a>";
				}
		?>
	</body> 
</html>
