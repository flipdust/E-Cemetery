<?php

	class DeceasedController{

		public function createDeceasedLot($tfDate,$tfFirstNameNew, $tfMiddleNameNew, $tfLastNameNew, $intCustomerId, $tfLotId, $tfRelationOwner, $dateOfBirthNew, $dateDiedNew, $gender, $tfAmountPaid,$tfTransactionType){

			$sql 		=	"INSERT INTO `dbholygarden`.`tbldeceased` (`strFirstName`, `strMiddleName`, `strLastName`, `intGender`, `dateBirthday`, `dateDeath`, `strRelationship`, `intCustomerId`) 
                                                            VALUES ('$tfFirstNameNew', '$tfMiddleNameNew', '$tfLastNameNew', '$gender', '$dateOfBirthNew', '$dateDiedNew', '$tfRelationOwner', '$intCustomerId')";
			$conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
            $result		= mysql_query($conn,$sql);
            mysql_close($conn);
            
			//select deceased ID
            $conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
			$selectIdDeceased = "SELECT intDeceasedId FROM tbldeceased WHERE intDeceasedId = '".$intDeceasedId."'";
			$resultIdDeceased = mysql_query($conn,$selectIdDeceased);
			$row = mysql_fetch_array($resultIdDeceased);
			$intDeceasedId = $row['intDeceasedId'];
            mysql_close($conn);
			//select service ID
            $conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
			$selectIdService = "SELECT intServiceID FROM tblservice WHERE strServiceName LIKE 'Interment'";
			$resultIdService = mysql_query($conn,$selectIdService);
			$row = mysql_fetch_array($resultIdService);
			$intServiceID = $row['intServiceID'];
            mysql_close($conn);
            
            $conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
			//insert transaction deceased
			$sqlTransDeceased = "INSERT INTO `dbholygarden`.`tbltransactiondeceased` (`dateTransactionDeceased`, `intCustomerid`, `intServiceId`, `intDeceasedId`, `deciAmountPaid`, `intTransactionType`) 
                                                                                VALUES ('$tfDate', '$intCustomerId', '$intServiceID', '$intDeceasedId', '$tfAmountPaid', '$tfTransactionType')";
            $resultTransDeceased = mysql_query($conn,$sql);
            mysql_close($conn);


		}//end function createDeceasedLot

		public function transferDeceased($intDeceasedId,$intLotId,$deciAmountPaid,$intCustomerId){

			$conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
        	//update tblLot
        	$sqlUpdate  = "UPDATE tblLotDeceased SET intLotId='$intLotId' WHERE intDeceasedId='$intDeceasedId'";
        	$resultUpdate = mysql_query($conn,$sqlUpdate);

        	//insert transactiontransfer
        	$sqlInsert  = "INSERT INTO tblTransactionDeceased (intCustomerId, intDeceasedId, intServiceID, dateTransactionDeceased, deciAmountPaid, intTransactionType) VALUES ($intCustomerId, $intDeceasedId, NULL , now(), $deciAmountPaid, 2)";

			$resultInsert = mysql_query($conn,$sqlInsert);
        	
		}//end function transfer Lot

		public function createDeceasedAsh($strFirstName, $strMiddleName, $strLastName, $intCustomerId, $intLotId, $strRelationship, $dateBirth, $dateDeath, $intGender, $deciAmountPaid){

			$conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
			$sql 		=	"INSERT INTO tblDeceased (strFirstName, strMiddleName, strLastName, intCustomerId, strRelationship, dateBirth, dateDeath, intGender) values ($strFirstName, $strMiddleName, $strLastName, $intCustomerId, $strRelationship, $dateBirth, $dateDeath, $intGender)";

			$result		= mysql_query($conn,$sql);

			//select deceased ID
			$selectIdDeceased = "SELECT intDeceasedId FROM tblDeceased WHERE intDeceasedId = '".$intDeceasedId."'";
			$resultIdDeceased = mysql_query($conn,$selectIdDeceased);
			$row = mysql_fetch_array($resultIdDeceased);
			$intDeceasedId = $row['intDeceasedId'];

			//select service ID
			$selectIdService = "SELECT intServiceID FROM tblservice WHERE strServiceName LIKE 'Interment'";
			$resultIdService = mysql_query($conn,$selectIdService);
			$row = mysql_fetch_array($resultIdService);
			$intServiceID = $row['intServiceID'];

			//insert transaction deceased Lot
			$sqlTransDeceased = "INSERT INTO tblTransactionDeceased (intCustomerId, intDeceasedId, intServiceID, dateTransactionDeceased, deciAmountPaid, intTransactionType) VALUES ($intCustomerId, $intDeceasedId, $intServiceID, now(), $deciAmountPaid, 1)";
			$resultTransDeceased = mysql_query($conn,$sql);

		}//end function createDeceasedAsh


		public function transferDeceasedAsh($intDeceasedId,$intAsh,$deciAmountPaid,$intCustomerId){

			$conn 		= mysql_connect(constant('server'),constant('user'),constant('pass'));
        				  mysql_select_db(constant('mydb'));
        	//update tblAsh
        	$sqlUpdate  = "UPDATE tblAshDeceased SET intAshId='$intAshId' WHERE intDeceasedId='$intDeceasedId'";
        	$resultUpdate = mysql_query($conn,$sqlUpdate);

        	//insert transactiontransfer Ash
        	$sqlInsert  = "INSERT INTO tblTransactionDeceased (intCustomerId, intDeceasedId, intServiceID, dateTransactionDeceased, deciAmountPaid, intTransactionType) VALUES ($intCustomerId, $intDeceasedId, NULL , now(), $deciAmountPaid, 2)";

			$resultInsert = mysql_query($conn,$sqlInsert);
        	
		}//end function transfer Ash


	}//end class

?>