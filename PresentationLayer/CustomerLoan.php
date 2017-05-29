<?php 
	require_once("LogicLayer/CustomerManager.php");
	require_once("LogicLayer/AccountManager.php");
	require_once("LogicLayer/Loan.php");
	require_once("LogicLayer/LoanManager.php");
	session_start();
	$activeUser = null;
	
	if(isset($_SESSION['activeUser'])) {
		$activeUser =  $_SESSION['activeUser'];
	}
	$msg ="";
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>Money Transfer</title>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="style/site.css">
		<link rel="stylesheet" type="text/css" href="style/Money.css">
	</head>
	<body> 
		<?php
			if(isset($activeUser)) {
		?>
		<div id="dvHeader" >
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblHeader">
					<tbody>
					<tr>
					 <td> <img id="logo" src="Images/newlogo.png"   ></td>
		</div>
							<?php 
								if(isset($activeUser)) {
							?> 
                             <div id="yazı">
								<td><strong><?php echo "Welcome " . $activeUser->getCustomer_Name(); ?> </strong></td>
								<?php
								}
								?>
							 </div>
							
							<td>
								<label for="input_exit">
									<img src="Images/exit.png" style="max-height: 35px;">
									<input id="input_exit" type="submit" style="display: none" name="inputExit" value="Göndert" >
								</label>
							<?php 
									if( isset($_POST["inputExit"]) ) {
										header("location: PersonalLoginPanel.php");
									}
								?>
							 	
							 </td>
							
							</tr>
					         <?php 
									if(isset($_POST["back"])) {
										header("location: PersonalUIExternal.php");
									}
									if(isset($_POST["logout"])) {
										header("location: PersonalLoginPanel.php");
									}
								?>
						</tbody>
						</table>
						</form>
						</div>
			<div id="dvMenu" align="center">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblMenu">
					<tbody>
					 <tr>
		 <td><input type="submit" name="Account" id="Accounts" value="Accounts"  /></td>
		 <td></td>
         <td><input type="submit" name="Transfer" id="Transfer" value="Transfer"/></td>
         <td></td>
         <td><input type="submit" name="Card" id="Cards" value="Cards"/></td>
         <td></td>
         <td><input type="submit" name="Payment" id="Payments" value="Payments"/></td>
          <td></td>
         <td><input type="submit" name="Loan" id="Loans" value="Loans"/></td>
         	 <td></td>
         <td><input type="submit" name="Application" id="Applications" value="Applications"/></td>
         <td>
   <div class="box">
    <div class="container-2">
      <span class="icon"><i class="fa fa-search"></i></span>
      <input type="search" id="search" placeholder="Search..." />
  </div>
</div>
       </td>
         </tr>
         </tbody>
         </table>
         </form>
         </div>
		<div id="dvMain">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblUsers">
					<tbody>
							<td>
								<select name = "Account">
								<option value ="0">Select Your Account</option>
								<?php 
									$AccountList = AccountManager::getAllAccountbyCustomer($activeUser->getCustomer_ID());
							
									for($i = 0; $i < count($AccountList); $i++) {
									?>
										<option value="<?php echo $AccountList[$i]->getAccount_ID(); ?>"><?php echo $AccountList[$i]->getAccount_Number(); ?></option>
									
									<?php
									}
								?>
								</select>
									
								<select name = "LoanType">
								<option>Loan Type</option>
								
										<option value="House Loan">House Loan</option>
										<option value="Car Loan">Car Loan</option>
			                            <option value="Education Loan">Education Loan</option>
								</select>
							</td>
							<td>  
								<a>Loan Amount :</a>							
							</td>	
							<td>  
								<input type="text" name="loanamount" />							
							</td>
						</tr>
						<tr>
							<td>
						    </td>
							<td>
								<a>Start Date :</a>
							</td>
							<td>
								<input type="text" name="startdate" />
							</td>	
						</tr>
                       <tr>
						<td></td>
							<td>
								<a>Installment Number :</a>
							</td>
							<td>
								<input type="text" name="installment" />
							</td>								
						</tr>
                         
						<tr>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								<input type="submit" name="application" value="Make an Application" />
							</td>
						</tr>
						<?php 
									if(isset($_POST["application"])) {
										if(isset($_POST["loanamount"]) && isset($_POST["startdate"])) {
		
											$loanamount = trim($_POST["loanamount"]);
											$astartdate = trim($_POST["startdate"]);
											
											
											if($loanamount != '' && $astartdate!= '' ){
												$selectedaccount = $_POST['Account'];
												$selectedtype = $_POST['LoanType'];
												if($selectedaccount !=0 && $selectedtype!=0 ){
												$controlloanpoint = CustomerManager::getCustomerbyID($selectedaccount);
												if($controlloanpoint[0]->getCustomer_LoanPoint() >= 50)
													$msg="Loan application  is Succesfull!!";
											}
												else
											        $msg="Sorry,Loan application  is not Succesfull!!";
													}
												
												}
											}		
							?>

						<tr>
							<td>
								<a href="PersonalUIExternal.php"></a>
								<input type="submit" name="back" value="Back Main Panel" />
							</td>
							<td>
								<a href="PersonalUIExternal.php"></a>
								<input type="submit" name="showloan" value="Show Your Loan Applications" />
							</td>
							<td><?php echo $msg ?></td>
							<td></td>
								<?php 
									if(isset($_POST["back"])) {
										header("location: PersonalUIExternal.php");
									}
									if(isset($_POST["Account"])) {
										header("location: CustomerAccountExternal.php");
									}
									if(isset($_POST["showloan"])) {
										header("location: CustomerLoanExternal.php");
									}
								?>
						</tr>
					</tbody>
					
				</table>
				
			</form>
		</div>
		<?php
			}
			else {
					echo "<a href='PersonaLoginPanel.php'>Giriþ yapýnýz!</a>";
				}
		?>
	</body> 
</html>