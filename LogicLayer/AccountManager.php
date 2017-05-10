<?php
	require_once("DataLayer/DB.php");
	require_once("Account.php");
	
	class AccountManager{
		
			public static function CreateNewAccount( $Customer_ID , $Account_Number,$Balance ,$Branch){
				$db = new DB();
				$success = $db->executeQuery("INSERT INTO account_info(Customer_ID , Account_Number,Balance ,Branch) VALUES ('$Customer_ID' , '$Account_Number','$Balance ','$Branch')");
				return $success;
			}
		
			public static function DeleteAccount ($accountid) {
				$db = new DB();
				$result = $db->getDataTable("DELETE FROM acccount_info WHERE Account_ID='$accountid'"); 
				return $result;
			}
			
			public static function getAllAccount () {
				$db = new DB();
				$result = $db->getDataTable("select Account_ID , Customer_ID , Account_Number,Balance ,Branch from account_info order by Customer_ID");
			
				$allAccounts = array();
			
				while($row = $result->fetch_assoc()) {
					$accountObj = new Account($row["Account_ID"], $row["Customer_ID"], $row["Account_Number"],$row["Balance"],$row["Branch"]);
					array_push($allAccounts, $accountObj);
				}
				return $allAccounts;
			}
	}
	
 ?>