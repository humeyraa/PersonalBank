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
								
									if(isset($_POST["back"])) {
										header("location: PersonalUIExternal.php");
									}
									
									if(isset($_POST["showloan"])) {
										header("location: CustomerShowLoanExternal.php");
									}
									if(isset($_POST["delete"])) {
										header("location: CustomerDeleteLoanExternal.php");
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
								<option value="0">Loan Type</option>
										<option value="House Loan">House Loan</option>
										<option value="Car Loan">Car Loan</option>
			                            <option value="Education Loan">Education Loan</option>
								</select>
							</td>
							<td>
							<select name = "loanamount">
								<option value="0">Loan Amount</option>
										<option value="1000">1000 </option>
										<option value=" 1500">1500</option>
			                            <option value="2000">2000</option>
								</select>
								</td>
						</tr>
						<tr>
							<td>
						    </td>
							
							<td>
								
							</td>	
						</tr>
                       <tr>
						<td></td>
							<td>
								<select name = "installment">
								<option value="0">Installment Number</option>
								
										<option value="0">0</option>
										<option value=" 2">2</option>
			                            <option value="4">4</option>
			                            <option value="6">6</option>
			                            <option value="8">8</option>
			                            <option value="10">10</option>
			                            <option value="12">12</option>
			                            <option value="14">14</option>
			                            <option value="16">16</option>
			                            <option value="18">18</option>
			                            <option value="20">20</option>
			                            <option value="22">22</option>
			                            <option value="24">24</option>

								</select>
							</td>
														
						</tr>
                         
						<tr>
							
							<td>
								
							</td>
							<td>
								<input type="submit" name="application" value="Make an Application" />
							</td>
						</tr>
						<?php 
									if(isset($_POST["application"])) {
		                                   $Id = ($activeUser->getCustomer_ID());
											$startdate = date("d.m.Y");
										    $selectedtype = $_POST['LoanType'];
										    $selectedamount = $_POST['loanamount'];
										    $selectedinstallment = $_POST['installment'];
											if($selectedamount != "0" && $selectedtype!="0" && $selectedinstallment!="0" ){
												
												$selectedaccount = $_POST['Account'];
												if($selectedaccount !=0){
													$check=0;
		                                     	   $errorMeesage = "";
												if(($activeUser->getCustomer_LoanPoint()) >= "50")
												{
										
													$result = LoanManager::AddLoan($Id,$selectedtype,$selectedamount,$startdate, 
														$selectedinstallment);
													$check=1;
		                                        }
		                                        if($check==0) {
				                                  echo '<script language="javascript">';
				                                   echo 'alert("Loan Application is not succesfull please check boxes!")';
				                                  echo '</script>';
			                               }
			                                   else
				                                   echo '<script language="javascript">';
				                                   echo 'alert("Loan Application is  Successfully!")';
				                                   echo '</script>';
												
											}
										}
													
									}	
							?>
							
						<tr>
							<td>
							
								<input type="submit" name="back" value="Back Main Panel" />
							</td>
							<td>
								
								<input type="submit" name="showloan" value="Show Your Loan Applications" />
							</td>
							<td>
								
								<input type="submit" name="delete" value="Delete Loan Application" />
							</td>
							<td><?php echo $msg ?></td>
							<td></td>
								
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