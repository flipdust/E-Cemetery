<?php


class createInterest{

    function Create($tfNoOfYear,$tfAtNeedInterest,$tfRegularInterest,$tfStatus){

		$sql = "INSERT INTO `dbholygarden`.`tblinterest` (`intNoOfYear`, `deciAtNeedInterest`, `deciRegularInterest`, `intStatus`) 
                                        VALUES ('$tfNoOfYear','$tfAtNeedInterest','$tfRegularInterest','$tfStatus')";
                                        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
           // echo "<script>alert('Succesfully created!')</script>";
            $alertInterest = new alerts();
            $alertInterest -> alertSuccess();
          
        }
        
    }
        
}

class createTypes{

    function Create($tfTypeName,$tfNoOfLot,$tfSellingPriceFinal,$tfStatus){
		
		

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "SELECT * FROM tbltypeoflot WHERE strTypeName LIKE '$tfTypeName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){
            
			$sql = "INSERT INTO `dbholygarden`.`tbltypeoflot` (`strTypeName`, `intNoOfLot`, `deciSellingPrice`, `intStatus`) 
														VALUES ('$tfTypeName', '$tfNoOfLot', '$tfSellingPriceFinal', '$tfStatus')";
														
														
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
		
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
				//echo "<script>alert('Succesfully created!')</script>";
                $alertTypes = new alerts();
                $alertTypes -> alertSuccess();
			}//if

		}else{
			//echo "<script>alert('duplicate data')</script>";
                $alertTypes1 = new alerts();
                $alertTypes1 -> alertWarning();
        }//else
        
    }//function
        
}//createTypes


class createSection{

    function Create($tfSectionName,$tfNoOfBlock,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblsection WHERE strSectionName like '$tfSectionName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){ 
        
			$sql = "INSERT INTO `tblsection` (`strSectionName`,`intNoOfBlock`,`intStatus`) 
									VALUES ('$tfSectionName','$tfNoOfBlock','$tfStatus' )";
											
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
				//echo "<script>alert('Succesfully created!')</script>";
                $alertSection = new alerts();
                $alertSection -> alertSuccess();

			}//if
		}else{
            //echo "<script>alert('duplicate data')</script>";
                $alertSection1 = new alerts();
                $alertSection1 -> alertWarning();
        }//else
        
    }//function
}//createSection



class createBlock{

    function Create($tfBlockName,$typeBlock,$section,$tfNoOfLot,$tfStatus){


			$sql = "INSERT INTO `dbholygarden`.`tblblock` (`strBlockName`,`intTypeID` ,`intSectionID`, `intNoOfLot`, `intStatus`) 
												VALUES ('$tfBlockName','$typeBlock' ,'$section', '$tfNoOfLot','$tfStatus')";
                                            
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			}//if

    }//function
}//createBlock


class createLot{

    function Create($id,$typeBlock,$lotStatus,$tfStatus){
		$sql = "INSERT INTO `dbholygarden`.`tbllot` (`strLotName`, `intBlockID`, `intLotStatus`, `intStatus`) 
												VALUES ('$id','$typeBlock','$lotStatus','$tfStatus')";
                                        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
          
        }//if
    }//function
}//createLot




class createAC{

    function Create($tfacName,$tfNoOfLevel,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblashcrypt WHERE strAshName like '$tfacName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tblashcrypt` (`strAshName`, `intNoOfLevel`,`intStatus`) 
														VALUES ('$tfacName','$tfNoOfLevel','$tfStatus')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
				//echo "<script>alert('Succesfully created!')</script>";
                $alertAC = new alerts();
                $alertAC -> alertSuccess();
			  
			}//if
		}else{
			//echo "<script>alert('Duplicate Data!')</script>";
            $alertAC1 = new alerts();
            $alertAC1 -> alertWarning();
          
        }//else
    }//function
}//createAC

class createLevelAC{

    function Create($l,$acName,$tfNoOfUnit,$tfStatus,$tfSellingPriceFinal){

		$getDetails = "SELECT strLevelName, intNoOfUnit FROM tbllevelash WHERE intAshID = '$acName' AND intStatus = 0;";
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
		mysql_select_db(constant('mydb'));
	   
		
		$result = mysql_query($getDetails,$conn);
		$flag = true;
		$error1 = "Level is already existing";
		$error2 = "Unit is incorrect ";
        
		while($row = mysql_fetch_array($result)){
			
            $strLevelName = $row['strLevelName'];
            $NoofUnit = $row['intNoOfUnit'];
            
            if(strcmp($l, $strLevelName) == 1 && $NoofUnit == $tfNoOfUnit){
                
            }else{
                $flag = false;
                //echo "<script>alert('An error occurred because: $error1, $error2')</script>";
                $alertLevel = new alerts();
                $alertLevel -> alertWarnAsh();
                break;
            }//else
        }//while
        
		$sql = "INSERT INTO `dbholygarden`.`tbllevelash` (`strLevelName`, `intAshID`,`intNoOfUnit`,`intStatus`,`dblSellingPrice`) 
													VALUES ('$l','$acName','$tfNoOfUnit','$tfStatus','$tfSellingPriceFinal')";
        
		if($flag == true)
            if(mysql_query($sql,$conn)){
                mysql_close($conn);
        
            }//if
        }//if
        
}//createLevelAC


class createAshUnit{

    function Create($id,$levelName,$status,$tfStatus,$tfCapacity){

		$sql = "INSERT INTO `dbholygarden`.`tblacunit` (`strUnitName`, `intLevelAshID`,`intUnitStatus`,`intStatus`,`intCapacity`) 
                                                VALUES ('$id','$levelName','$status','$tfStatus','$tfCapacity')";
                                                
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
        }//if
    }//function
}//createAshUnit

class createRequirement{

    function Create($tfRequirementName,$tfRequirementDesc,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "SELECT * from tblrequirement WHERE strRequirementName LIKE '$tfRequirementName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tblrequirement` (`strRequirementName`, `strRequirementDesc`,`intStatus`) 
                                                VALUES ('$tfRequirementName','$tfRequirementDesc','$tfStatus')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			  //echo "<script>alert('Succesfully created!')</script>";
                $alertRequire = new alerts();
                $alertRequire -> alertSuccess();
			  
			}//if
		}else{
           // echo "<script>alert('Duplicate Data!')</script>";
                 $alertRequire1 = new alerts();
                $alertRequire1 -> alertWarning();

        }//else
        
    }//function
        
}//createRequirement


class createService{

    function Create($tfServiceName,$serviceType,$tfServicePriceFinal,$tfStatus,$checkRequirement){
        // echo "$tfServiceName--$serviceType--$tfServicePriceFinal--$tfStatus,";
        // echo json_encode($checkRequirement);

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblservice WHERE strServiceName like '$tfServiceName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);
        
        if($check_duplicate == 0){

			$sql = "call insertService('$tfServiceName','$tfServicePriceFinal','$tfStatus','$serviceType')";
            
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
            $result = mysql_query($sql);
           
            if(mysql_num_rows($result) > 0){
                $row = mysql_fetch_array($result);
                $serviceId = $row['id'];
                mysql_close($conn);
                for ($x = 0; $x < sizeof($checkRequirement); $x++){
                      
                    
                    $sql = "INSERT INTO `dbholygarden`.`tblservicerequirement` (`intServiceId`, `intRequirementId`) 
                                                                    VALUES ('$serviceId', '$checkRequirement[$x]');";
                    
                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                    mysql_select_db(constant('mydb'));
                    mysql_query($sql);
                    mysql_close($conn);
                    
                }//for
                
			  //echo "<script>alert('Success')</script>";
                $alertService = new alerts();
                $alertService -> alertSuccess();
			  
			}//if
		}else{
            //echo "<script>alert('Duplicate Data!')</script>";
                $alertService1 = new alerts();
                $alertService1 -> alertWarning();
        }//else
        
    }//function
        
}//createService

class createServiceType{

    function Create($tfServiceTypeName,$tfServiceTypeDesc){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblservicetype WHERE strServiceTypeName like '$tfServiceTypeName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tblservicetype` (`strServiceTypeName`, `strServiceTypeDesc`) 
                                                        VALUES ('$tfServiceTypeName','$tfServiceTypeDesc')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			  //echo "<script>alert('Succesfully created!')</script>";
                $alertSerType = new alerts();
                $alertSerType -> alertSuccess();
			  
			}//if
		}else{
            //echo "<script>alert('Duplicate Data!')</script>";

                $alertSerType1 = new alerts();
                $alertSerType1 -> alertWarning();

        }//else
        
    }//function
        
}//createService

class createDiscount{

	function Create($serviceName,$tfDescription,$tfPercentValue,$tfStatus){


			$sql = "INSERT INTO `dbholygarden`.`tbldiscount` (`intServiceID`,`strDescription`, `dblPercent`, `intStatus`) 
												VALUES ('$serviceName','$tfDescription','$tfPercentValue','$tfStatus')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			   //echo "<script>alert('Succesfully created!')</script>";
                $alertDiscount = new alerts();
                $alertDiscount -> alertSuccess();
			 
			}//if
    }//function
}//createDiscount



//TRANSACTION


//FIRST TRANSACTION

class createCustomer{


    function Create($tfFirstName,$tfMiddleName,$newLastName,$tfAddress,$tfContactNo,$dateCreated,$gender,$civilStatus){

        
		$sql = "call insertCustomer('$tfFirstName','$tfMiddleName','$newLastName','$tfAddress','$tfContactNo','$dateCreated','$gender','$civilStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
       
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
           // echo "<script>alert('Succesfully created!')</script>";
            $alertCust = new alerts();
            $alertCust -> alertSuccess();
     
        }//if


        
    }//function
        
}//class

class createAvailUnit{

    function Create($tfLotId,$tfStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunit` (`intLotId`,`intStatus`,`intCustomerId`,`dateAvailUnit`,`strModeOfPayment`,`deciAmountPaid`) 
                                                VALUES ('$tfLotId','$tfStatus','$selectCustomer','$dateCreated','$tfModeOfPayment','$tfAmountFinal')";

        $sql1 = "UPDATE `dbholygarden`.`tbllot` 
                            SET `intLotStatus`='2' WHERE `intLotID`= '$tfLotId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
    
    function createReserve($tfLotId,$tfStatus,$tfDownpaymentStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$selectYear,$tfDownpaymentFinal,$tfBalanceFinal,$dateDownpayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunit` (`intLotId`, `intCustomerId`, `dateAvailUnit`, `strModeOfPayment`, `deciAmountPaid`, `intStatus`, `boolDownpaymentStatus`, `intInterestId`, `deciDownpayment`, `deciBalance`, `datDueDate`) 
                                                    VALUES ('$tfLotId', '$selectCustomer', '$dateCreated', '$tfModeOfPayment', '$tfAmountFinal', '$tfStatus', '$tfDownpaymentStatus', '$selectYear', '$tfDownpaymentFinal', '$tfBalanceFinal', '$dateDownpayment')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tbllot` 
                            SET `intLotStatus`='1' WHERE `intLotID`= '$tfLotId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
    
     function createAtNeed($tfLotId,$tfStatus,$tfDownpaymentStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$selectYear,$tfDownpaymentFinal,$tfBalanceFinal,$dateDownpayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunit` (`intLotId`, `intCustomerId`, `dateAvailUnit`, `strModeOfPayment`, `deciAmountPaid`, `intStatus`, `boolDownpaymentStatus`, `intInterestId`, `deciDownpayment`, `deciBalance`, `datDueDate`) 
                                                    VALUES ('$tfLotId', '$selectCustomer', '$dateCreated', '$tfModeOfPayment', '$tfAmountFinal', '$tfStatus', '$tfDownpaymentStatus', '$selectYear', '$tfDownpaymentFinal', '$tfBalanceFinal', '$dateDownpayment')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tbllot` 
                            SET `intLotStatus`='3' WHERE `intLotID`= '$tfLotId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
        
}//class

class createAvailUnitAsh{
    
    function createSpotAsh($tfUnitId,$tfStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunitash` (`intUnitId`,`intStatus`,`intCustomerId`,`dateAvailUnit`,`strModeOfPayment`,`deciAmountPaid`) 
                                                VALUES ('$tfUnitId','$tfStatus','$selectCustomer','$dateCreated','$tfModeOfPayment','$tfAmountFinal')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblacunit` 
                            SET `intUnitStatus`='2' WHERE `intUnitID`= '$tfUnitId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
    
    function createReserveAsh($tfUnitId,$tfStatus,$tfDownpaymentStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$selectYear,$tfDownpaymentFinal,$tfBalanceFinal,$dateDownpayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunitash` (`intUnitId`, `intCustomerId`, `dateAvailUnit`, `strModeOfPayment`, `deciAmountPaid`, `intStatus`, `boolDownpaymentStatus`, `intInterestId`, `deciDownpayment`, `deciBalance`, `datDueDate`) 
                                                    VALUES ('$tfUnitId', '$selectCustomer', '$dateCreated', '$tfModeOfPayment', '$tfAmountFinal', '$tfStatus', '$tfDownpaymentStatus', '$selectYear', '$tfDownpaymentFinal', '$tfBalanceFinal', '$dateDownpayment')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblacunit` 
                            SET `intUnitStatus`='1' WHERE `intUnitID`= '$tfUnitId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
    
    function createAtNeedAsh($tfUnitId,$tfStatus,$tfDownpaymentStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$selectYear,$tfDownpaymentFinal,$tfBalanceFinal,$dateDownpayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunitash` (`intUnitId`, `intCustomerId`, `dateAvailUnit`, `strModeOfPayment`, `deciAmountPaid`, `intStatus`, `boolDownpaymentStatus`, `intInterestId`, `deciDownpayment`, `deciBalance`, `datDueDate`) 
                                                    VALUES ('$tfUnitId', '$selectCustomer', '$dateCreated', '$tfModeOfPayment', '$tfAmountFinal', '$tfStatus', '$tfDownpaymentStatus', '$selectYear', '$tfDownpaymentFinal', '$tfBalanceFinal', '$dateDownpayment')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblacunit` 
                            SET `intUnitStatus`='3' WHERE `intUnitID`= '$tfUnitId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function

}//class


//SECOND TRANSACTION

class createPaymentLot{
    
    function createDownpaymentLot($tfAvailUnitId,$dateCreated,$tfAmountFinal){
             

        
        $sql = "INSERT INTO `dbholygarden`.`tbldownpaymentlot` (`dateDate`, `deciAmountPaid`, `intAvaiUnitId`) 
                                                    VALUES ('$dateCreated', '$tfAmountFinal', '$tfAvailUnitId')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblavailunit` 
                            SET `boolDownpaymentStatus`='1' WHERE `intAvailUnitId`= '$tfAvailUnitId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
             
            
            if(mysql_query($sql1,$conn)){

                ?>
                    <script type="text/javascript">

                            swal({ 
                              title: "Success",
                               text: "Record has been saved!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/reserveLot-pdf.php?intAvailUnitId=<?php echo $tfAvailUnitId; ?>');
                                  window.location.href='payment.php';

                              
                            
                            });
                                            
                    </script>
                <?php
                
                 mysql_close($conn);
                   
            }//if
            
           
        }//if
        
    }//function createDownpaymentLot
    
    function createCollectionLot($tfAvailUnitId,$dateCreated,$tfAmountFinal,$updatedBalance){
             

        
        $sql = "INSERT INTO `dbholygarden`.`tblcollectionlot` (`dateDate`, `deciAmountPaid`, `intAvailUnitId`, `deciBalance`) 
                                                    VALUES ('$dateCreated', '$tfAmountFinal', '$tfAvailUnitId', '$updatedBalance')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblavailunit` 
                            SET `deciBalance`='$updatedBalance' WHERE `intAvailUnitId`= '$tfAvailUnitId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
             
            
            if(mysql_query($sql1,$conn)){
                ?>
                    <script type="text/javascript">

                            swal({ 
                              title: "Success",
                               text: "Record has been saved!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/collectionLot-pdf.php?intAvailUnitId=<?php echo $tfAvailUnitId; ?>');
                                  window.location.href='payment.php';

                              
                            
                            });
                                            
                    </script>
                <?php
                 mysql_close($conn);
                   
            }//if
            
           
        }//if
        
    }//function createCollectionLot
    
}//class createPaymentLot


class createPaymentAsh{
    
    function createDownpaymentAsh($tfAvailUnitAshId,$dateCreated,$tfAmountFinal){
        
        $sql = "INSERT INTO `dbholygarden`.`tbldownpaymentash` (`dateDate`, `deciAmountPaid`, `intAvailUnitAshId`) 
                                                    VALUES ('$dateCreated', '$tfAmountFinal', '$tfAvailUnitAshId')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblavailunitash` 
                            SET `boolDownpaymentStatus`='1' WHERE `intAvailUnitAshId`= '$tfAvailUnitAshId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
             
          
            if(mysql_query($sql1,$conn)){
                ?>
                    <script type="text/javascript">

                            swal({ 
                              title: "Success",
                               text: "Record has been saved!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/reserveAsh-pdf.php?unitId=<?php echo $tfAvailUnitAshId; ?>');
                                  window.location.href='payment.php';

                              
                            
                            });
                                            
                    </script>
                <?php
                 mysql_close($conn);
                   
            }//if
            
           
        }//if
        
    }//function createDownpaymentAsh
    
    function createCollectionAsh($tfAvailUnitAshId,$dateCreated,$tfAmountFinal,$updatedBalance){
             

        
        $sql = "INSERT INTO `dbholygarden`.`tblcollectionash` (`dateDate`, `deciAmountPaid`, `intAvailUnitAshId`, `deciBalance`) 
                                                    VALUES ('$dateCreated', '$tfAmountFinal', '$tfAvailUnitAshId', '$updatedBalance')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblavailunitash` 
                            SET `deciBalance`='$updatedBalance' WHERE `intAvailUnitAshId`= '$tfAvailUnitAshId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
             
            
            if(mysql_query($sql1,$conn)){
                ?>
                <script type="text/javascript">
                    
                            swal({ 
                              title: "Success",
                               text: "Record has been saved!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/collectionAsh-pdf.php?unitId=<?php echo $tfAvailUnitAshId ?>');
                                  window.location.href='payment.php';

                              
                            
                            });
                </script>
                <?php
                 mysql_close($conn);
                   
            }//if
            
           
        }//if
        
    }//function createCollectionAsh
    
}//class createPaymentAsh


//THIRD TRANSACTION

class unitManagementLot{
    
    function addDeceasedLot ($tfAvailUnitId, $tfDeceasedFirstName, $tfDeceasedMiddleName, $tfDeceasedLastName, $deceasedDateOfBirth, $deceasedDateOfDeath, $deceasedGender, $tfRelationship, $tfDeceasedAge,
                             $tfServiceId, $currentDate, $dateOfInterment, $totalAmount, $amountPaid){

        
        $sql = "INSERT INTO `dbholygarden`.`tbldeceasedlot` (`intAvailUnitId`, `strDeceasedFirstName`, `strDeceasedMiddleName`, `strDeceasedLastName`, `dateDeceasedBirthday`, `dateDeceasedDateOfDeath`, `intDeceasedGender`, `strRelationship`, `intDeceasedAge`, `intServiceId`, `dateCurrentDate`, `dateDateOfInterment`, `deciTotalAmount`, `deciAmountPaid`) VALUES ('$tfAvailUnitId', '$tfDeceasedFirstName', '$tfDeceasedMiddleName', '$tfDeceasedLastName', '$deceasedDateOfBirth', '$deceasedDateOfDeath', '$deceasedGender', '$tfRelationship', '$tfDeceasedAge', '$tfServiceId', '$currentDate', '$dateOfInterment', '$totalAmount', '$amountPaid')";
            
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){

             
				mysql_close($conn);

           
        }//if
        
    }//function addDeceasedLot
    
}//class unitManagementLot

class unitManagementAsh{
    
    function addDeceasedAsh ($tfAvailUnitAshId, $tfDeceasedFirstName, $tfDeceasedMiddleName, $tfDeceasedLastName, $deceasedDateOfBirth, $deceasedDateOfDeath, $deceasedGender, $tfRelationship, $tfDeceasedAge,
                            $tfServiceId, $currentDate, $dateOfInurnment, $totalAmount, $amountPaid){

        
        $sql = "INSERT INTO `dbholygarden`.`tbldeceasedash` (`intAvailUnitAshId`, `strDeceasedFirstName`, `strDeceasedMiddleName`, `strDeceasedLastName`, `dateDeceasedBirthday`, `dateDeceasedDateOfDeath`, `intDeceasedGender`, `strRelationship`, `intDeceasedAge`, `intServiceId`, `dateCurrentDate`, `dateDateOfInterment`, `deciTotalAmount`, `deciAmountPaid`) VALUES ('$tfAvailUnitAshId', '$tfDeceasedFirstName', '$tfDeceasedMiddleName', '$tfDeceasedLastName', '$deceasedDateOfBirth', '$deceasedDateOfDeath', '$deceasedGender', '$tfRelationship', '$tfDeceasedAge', '$tfServiceId', '$currentDate', '$dateOfInurnment', '$totalAmount', '$amountPaid')";
            
            
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){

         
				mysql_close($conn);
           
        }//if
        
    }//function addDeceasedAsh
    
}//class unitManagementAsh

class createTransferCustomer{


    function createTransferLot($tfAvailUnitId,$tfFirstName,$tfMiddleName,$newLastName,$tfAddress,$tfContactNo,$dateCreated,$gender,$civilStatus,$totalAmount,$amountPaid){

        
		$sql = "call insertTransferCustomer('$tfFirstName','$tfMiddleName','$newLastName','$tfAddress','$tfContactNo','$dateCreated','$gender','$civilStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        $row = mysql_fetch_array($result);
        mysql_close($conn);
        $sql2 = "INSERT INTO `dbholygarden`.`tbltransferlot` (`intCustomerId`, `dateCurrentDate`, `deciTotalAmount`, `deciAmountPaid`) 
                                                        VALUES ('$row[0]', curdate(), '$totalAmount', '$amountPaid')";
        $conn2 = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        mysql_query($sql2,$conn2);
        mysql_close($conn2);
        $sql3 = "UPDATE `dbholygarden`.`tblavailunit` SET `intCustomerId`='$row[0]' WHERE `intAvailUnitId`='$tfAvailUnitId'";
        $conn3 = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql3,$conn3)){

             ?>
                <script type="text/javascript">
                    
                            swal({ 
                              title: "Success",
                               text: "Title has been Succesfully Transfered!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/transferTitle-pdf.php?intAvailUnitId=<?php echo $tfAvailUnitId?>&&strFirstName=<?php echo $tfFirstName?>&&strLastName=<?php echo $newLastName?>&&amountPaid=<?php echo $amountPaid?>&&totalAmount=<?php echo $totalAmount?>&&strAddress=<?php echo $tfAddress?>&&strTypeAsh=Lot');
                                  window.location.href='unitmanagement-transaction.php';

                              
                            
                            });
                </script>
                <?php
            
            mysql_close($conn3);
           // echo "<script>alert('Succesfully created!')</script>";
          /*  $alertCust = new alerts();
            $alertCust -> alertSuccess();*/
     
        }//if


        
    }//function
    
    
    function createTransferAsh($tfAvailUnitAshId,$tfFirstName,$tfMiddleName,$newLastName,$tfAddress,$tfContactNo,$dateCreated,$gender,$civilStatus,$totalAmount,$amountPaid){

        
		$sql = "call insertTransferCustomer('$tfFirstName','$tfMiddleName','$newLastName','$tfAddress','$tfContactNo','$dateCreated','$gender','$civilStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        $row = mysql_fetch_array($result);
        mysql_close($conn);
        $sql2 = "INSERT INTO `dbholygarden`.`tbltransferash` (`intCustomerId`, `dateCurrentDate`, `deciTotalAmount`, `deciAmountPaid`) 
                                                        VALUES ('$row[0]', curdate(), '$totalAmount', '$amountPaid')";
        $conn2 = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        mysql_query($sql2,$conn2);
        mysql_close($conn2);
        $sql3 = "UPDATE `dbholygarden`.`tblavailunitash` SET `intCustomerId`='$row[0]' WHERE `intAvailUnitAshId`='$tfAvailUnitAshId'";
        $conn3 = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql3,$conn3)){

             ?>
                <script type="text/javascript">
                    
                            swal({ 
                              title: "Success",
                               text: "Title has been Succesfully Transfered!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/transferTitle-pdf.php?intAvailUnitId=<?php echo $tfAvailUnitAshId?>&&strFirstName=<?php echo $tfFirstName?>&&strLastName=<?php echo $newLastName?>&&amountPaid=<?php echo $amountPaid?>&&totalAmount=<?php echo $totalAmount?>&&strAddress=<?php echo $tfAddress?>&&strTypeAsh=Ash');
                                  window.location.href='unitmanagement-transaction.php';

                              
                            
                            });
                </script>
                <?php
            
            mysql_close($conn3);
           // echo "<script>alert('Succesfully created!')</script>";
            /*$alertCust = new alerts();
            $alertCust -> alertSuccess();*/
     
        }//if


        
    }//function
    
        
}//class





//UTILITIES
class createColor{

    function Create($tfColor,$tfID){

        $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strColor`='$tfColor' WHERE `intCompanyID`= '$tfID' ";
                                            
             
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            
          
        }

              
    }//function
        
}//class

class createDetails{

    function Create($tfID,$tfCompanyName,$tfCompanyAddress,$tfContactNo,$tfEmailAdd){

        $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strCompanyName`='$tfCompanyName' , `strAddress`='$tfCompanyAddress',`strContactNo`='$tfContactNo',`strEmailAddress`='$tfEmailAdd' WHERE `intCompanyID`= '$tfID' ";
                                            
             
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            
          
        }

              
    }//function
        
}//class

class createImgPath{

    function Create($tfID,$tfLogo){

        $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strLogo`='$tfLogo' WHERE `intCompanyID`= '$tfID' ";
                                            
             
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            
          
        }

              
    }//function
        
}//class
?>