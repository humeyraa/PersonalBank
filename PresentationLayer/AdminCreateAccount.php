<?php 
    require_once("LogicLayer/AccountManager.php");
	require_once("LogicLayer/CustomerManager.php");
	
	session_start();
	$activeUser = null;
	
	if(isset($_SESSION['activeUser'])) {
		$activeUser =  $_SESSION['activeUser'];
	}
	$selectedCust =0;
	if(isset($_POST["accountnumber"]) && isset($_POST["branch"])) {
		
		
		
				
		
			$AccountN = trim($_POST["accountnumber"]);
			$brch = trim($_POST["branch"]);
		
			$check=0;
			$errorMeesage = "";
				if($AccountN != '' && $brch!= '' && strlen($AccountN) == 16){
					$selectedCust = $_POST['Customer'];
					
					$Balance=0;
					$result = AccountManager::CreateNewAccount($selectedCust , $AccountN,$Balance ,$brch );
					
					$check=1;
		
			}
			if($check==0) {
				echo '<script language="javascript">';
				echo 'alert("New Account is not created please check boxes!")';
				echo '</script>';
				
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("New Account is created Successfully!")';
				echo '</script>';
			}
				
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Create Customer Account</title>
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
							<th>Select Customer</th>
							<th></th>
							
						</tr>
						
						<tr>
							<td>
								<select name = "Customer">
								<option>Select Customer</option>
								<?php 
									$CustomerList = CustomerManager::getAllCustomer();
							
									for($i = 0; $i < count($CustomerList); $i++) {
									?>
										<option value="<?php echo $CustomerList[$i]->getCustomer_ID(); ?>"><?php echo $CustomerList[$i]->getCustomer_Name(); ?></option>
									
									<?php
									}
								?>
								</select>
							</td>
							<td>  
								
								
							</td>
							
							
						</tr>
						<tr>	
							<td>
								<a>Account Number :  </a>
							</td>
							<td>
								<input type="number" name="accountnumber"  />
							</td>
						</tr>
						<tr>
							<td>
								<a>Branch :  </a>
							</td>
							<td>
								<input type="text" name="branch" />
							</td>
						</tr>
						<tr>	
							<td>
								
							</td>
							<td>
								<input type="submit" name="createaccount" id="createaccount" value="Create a New Account"  />
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
