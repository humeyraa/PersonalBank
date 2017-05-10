<?php 
	require_once("LogicLayer/CustomerManager.php");
	session_start();
	$activeUser = null;
	
	if(isset($_SESSION['activeUser'])) {
		$activeUser =  $_SESSION['activeUser'];
	}
	
	
	
?>

<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Customer List and Delete Panel </title>
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
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<?php
							}
							?>
						</tr>
						<tr>
							
							<th><?php echo "Customer List and Delete " ?> </th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							
						</tr>
						<tr>
							<th>Name</th>
							<th>TC No</th>
							<th>Customer No</th>
							<th>Phone No</th>
							<th>E-mail Address</th>
							<th>Delete</th>
							
						</tr>
							
							<?php 
							$CustomerList = CustomerManager::getAllCustomer();
							
							for($i = 0; $i< count($CustomerList); $i++) {
							?>
							<tr>
								<td><?php echo $CustomerList[$i]->getCustomer_Name(); ?></td>
								<td><?php echo $CustomerList[$i]->getCustomer_TC(); ?></td>
								<td><?php echo $CustomerList[$i]->getCustomer_Number(); ?></td>
								<td><?php echo $CustomerList[$i]->getCustomer_Phone(); ?></td>
								<td><?php echo $CustomerList[$i]->getCustomer_Email(); ?></td>
								
								<td><input type="submit" name="del" value="Delete" /></td>
								
								
							</tr>
							<?php
							}
						    ?>
							<tr>
							<td>
								<input type="text" name="cust_no"/>
							</td>
								
							<td>
							<form id="form1" name="form1" method="post" action="">
								<input type="submit" name="del" value="Delete" />
							</form>
							<?php
							$check=0;
								if(isset($_POST["del"])) {
									$customer_number = trim($_POST["cust_no"]);
									if($customer_number != '' && strlen($customer_number) ==8){
										$result = CustomerManager::DeleteCustomer($customer_number);
										if(!$result){
											echo '<script language="javascript">';
											echo 'alert("New Customer is not deleted please check boxes!")';
											echo '</script>';
											
										}
										else{
											echo '<script language="javascript">';
											echo 'alert("New Customer is deleted Successfully!")';
											echo '</script>';
											
										}
										
									}
									
									else{
										echo '<script language="javascript">';
										echo 'alert("New Customer is not deleted please check boxes!")';
										echo '</script>';
									}
									
								}
							?>
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
						
							<tr>
							
							<td>
							<form id="form1" name="form1" method="post" action="">
								<input type="submit" name="back" value="Back Admin Panel" />
								</form>
								<?php 
									if(isset($_POST["back"])) {
										header("location: AdminUI.php");
									}
								?>
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
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