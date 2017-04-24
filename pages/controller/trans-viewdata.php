<?php

class lot{

    function viewLot(){
        
		$sql = "Select l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, t.deciSellingPrice, t.intNoOfLot, s.strSectionName, l.intLotStatus, l.intStatus 
                    FROM tbllot l  
                        INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                        INNER JOIN	tbltypeoflot t ON b.intTypeID = t.intTypeID
                        INNER JOIN tblsection s	ON b.intSectionID = s.intSectionID WHERE l.intStatus = '0' AND l.intLotStatus='Available' ORDER BY  strLotName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        


        while($row = mysql_fetch_array($result)){ 
			  
          $intLotID =$row['intLotID'];
          $strLotName =$row['strLotName'];
          $strBlockName =$row['strBlockName'];
          $strTypeName=$row['strTypeName'];
          $intNoOfLot=$row['intNoOfLot'];
          $deciSellingPrice=$row['deciSellingPrice'];
          $strSectionName =$row['strSectionName'];
          $intStatus =$row['intStatus'];
                      
          echo 
			  "<tr>
                    <td style ='font-size:18px;'>$strLotName</td>
                    <td style ='font-size:18px;'>$strBlockName</td>
                    <td style ='font-size:18px;'>$strTypeName</td>
                    <td style ='font-size:18px;'>$strSectionName</td>
                    <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciSellingPrice,2)."</td>
                    
                    <td align='center'>
                        <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalSpot$intLotID'>Spotcash</button>
                        <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalReserve$intLotID'>Reserve</button>
                        <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalAtneed$intLotID'>Atneed</button>
                    </td>";
                    require("../modals/transaction/spotcash-modal.php");
                    require('../modals/transaction/reserve-modal.php');
                    require('../modals/transaction/atneed-modal.php');

                  
                    
              echo"</tr>";
                
            }//while($row = mysql_fetch_array($result))
            mysql_close($conn);         
    }//function viewLot()    
    
	
	function selectBlock(){
		$sql = " SELECT b.intBlockID as blockID, b.strBlockName as Bname, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName as Sname FROM tblblock b INNER JOIN tblsection s 
                ON b.intSectionID = s.intSectionID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ;";
                
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value = '". $row['blockID']."'>". $row['Bname']." ( ".$row['Sname']." )</option>";
        }
         mysql_close($conn);
    }//function selectBlock
    
}//class Lot-Unit
//___________________________________________________


class ashUnit{

    function viewAshUnit(){
        
		$sql = "SELECT ac.intUnitID, ac.strUnitName, ac.intUnitStatus, ac.intStatus, l.strLevelName, l.dblSellingPrice, a.strAshName FROM tblacunit ac 
                    INNER JOIN tbllevelash l ON ac.intLevelAshID = l.intLevelAshID
                    INNER JOIN tblashcrypt a ON l.intAshID = a.intAshID WHERE ac.intStatus = 0 AND ac.intUnitStatus = 'Available' ORDER BY ac.strUnitName ASC";
 
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){ 
            
            $intUnitID =$row['intUnitID'];
            $strUnitName =$row['strUnitName'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $dblSellingPrice =$row['dblSellingPrice'];
            $intStatus=$row['intStatus'];
            
              
            echo 
                "<tr>
                    <td style ='font-size:18px;'>$strUnitName</td>
                    <td style ='font-size:18px;'>$strLevelName</td>
                    <td style ='font-size:18px;'>$strAshName</td>
                    <td style ='font-size:18px; text-align:right;'>₱ ".number_format($dblSellingPrice,2)."</td>
                    
                    <td align='center'>
                        <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalSpot$intUnitID'>Spotcash</button>
                        <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalReserve$intUnitID'>Reserve</button>
                        <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalAtneed$intUnitID'>Atneed</button>
                    </td>";
                    require("../modals/transaction/spotcashAsh-modal.php");
                    require('../modals/transaction/reserveAsh-modal.php');
                    require('../modals/transaction/atneedAsh-modal.php');

                
                
            echo"</tr>";
                
        }//while($row = mysql_fetch_array($result))
        mysql_close($conn);
                 
    }//function viewAshUnit()


	
	function selectLevel(){
        
		$sql = " select la.intLevelAshID as levelAsh, la.strLevelName as levelName, la.dblSellingPrice, ac.strAshName as ashName, la.intStatus from tbllevelash la
		            INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE la.intStatus = '0' ORDER BY ac.strAshName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result)){
            
            $intLevelAshID = $row['levelAsh'];
            $strLevelName = $row['levelName'];
            $strAshName = $row['ashName'];
            
            echo "<option value = '$intLevelAshID'>$strLevelName ($strAshName)</option>";
        }//while
        mysql_close($conn);
    }//function selectLevel()
	
}//class ashUnit
//________________________________________________



class downpayment{
    
    function viewDownpaymentLot(){
        
        $sql = "SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, l.strLotName, a.intAvailUnitId, a.strModeOfPayment, a.intStatus, a.boolDownpaymentStatus, a.intInterestId, a.deciDownpayment, a.datDueDate, i.intNoOfYear, i.deciRegularInterest, i.deciAtNeedInterest FROM                     tblcustomer c
                    INNER JOIN tblavailunit a ON a.intCustomerId = c.intCustomerId
                    INNER JOIN tblinterest i ON a.intInterestId = i.intInterestId
                    INNER JOIN tbllot l ON a.intLotID = l.intLotID WHERE a.intStatus = 0 AND a.boolDownpaymentStatus = 0 AND a.boolForfeitedNotice is null ORDER BY c.strLastName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        


        while($row = mysql_fetch_array($result)){ 
			  
          $intCustomerId =$row['intCustomerId'];
          $strFirstName =$row['strFirstName'];
          $strMiddleName =$row['strMiddleName'];
          $strLastName=$row['strLastName'];
          
          $strLotName=$row['strLotName'];
          
          $intAvailUnitId=$row['intAvailUnitId'];
          $strModeOfPayment =$row['strModeOfPayment'];
          $intStatus =$row['intStatus'];
          $boolDownpaymentStatus =$row['boolDownpaymentStatus'];
          $intInterestId =$row['intInterestId'];
          $deciDownpayment =$row['deciDownpayment'];
          $datDueDate =$row['datDueDate'];
          
          $intNoOfYear =$row['intNoOfYear'];
          $deciRegularInterest =$row['deciRegularInterest'];
          $deciAtNeedInterest =$row['deciAtNeedInterest'];
          
                      
          echo 
			  "<tr>
                    <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                  
                    <td align='center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#viewDownpaymentLot$intAvailUnitId'>
                            <i class='glyphicon glyphicon-eye-open'></i>
                        </button>
                    </td>";
                     require("../modals/transaction/downpaymentLot-modal.php");
                    // require('../modals/transaction/reserve-modal.php');
                    // require('../modals/transaction/atneed-modal.php');

              echo"</tr>";
                
            }//while($row = mysql_fetch_array($result))
            mysql_close($conn);
        
    }//function viewDownpaymentLot
    
    function viewDownpaymentAsh(){
        
        $sql = "SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, l.strUnitName, a.intAvailUnitAshId, a.strModeOfPayment, a.intStatus, a.boolDownpaymentStatus, a.intInterestId, a.deciDownpayment, a.datDueDate, i.intNoOfYear, i.deciRegularInterest, i.deciAtNeedInterest FROM                     tblcustomer c
                    INNER JOIN tblavailunitash a ON a.intCustomerId = c.intCustomerId   
                    INNER JOIN tblinterest i ON a.intInterestId = i.intInterestId
                    INNER JOIN tblacunit l ON a.intUnitID = l.intUnitID WHERE a.intStatus = 0 AND a.boolDownpaymentStatus = 0  AND a.boolForfeitedNotice is null ORDER BY c.strLastName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        


        while($row = mysql_fetch_array($result)){ 
			  
          $intCustomerId =$row['intCustomerId'];
          $strFirstName =$row['strFirstName'];
          $strMiddleName =$row['strMiddleName'];
          $strLastName=$row['strLastName'];
          
          $strUnitName=$row['strUnitName'];
          
          $intAvailUnitAshId=$row['intAvailUnitAshId'];
          $strModeOfPayment =$row['strModeOfPayment'];
          $intStatus =$row['intStatus'];
          $boolDownpaymentStatus =$row['boolDownpaymentStatus'];
          $intInterestId =$row['intInterestId'];
          $deciDownpayment =$row['deciDownpayment'];
          $datDueDate =$row['datDueDate'];
          
          $intNoOfYear =$row['intNoOfYear'];
          $deciRegularInterest =$row['deciRegularInterest'];
          $deciAtNeedInterest =$row['deciAtNeedInterest'];
          
                      
          echo 
			  "<tr>
                    <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                  
                    <td align='center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#viewDownpaymentLot$intAvailUnitAshId'>
                            <i class='glyphicon glyphicon-eye-open'></i>
                        </button>
                    </td>";
                     require("../modals/transaction/downpaymentAsh-modal.php");
                   
              echo"</tr>";
                
            }//while($row = mysql_fetch_array($result))
            mysql_close($conn);
        
    }//function viewDownpaymentAsh
    
}//class downpayment

class collection{
    
    function viewCollectionLot(){
        
        $sql = "SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, l.strLotName, tl.deciSellingPrice, a.intAvailUnitId, a.strModeOfPayment, a.intStatus, a.boolDownpaymentStatus, a.intInterestId, a.deciDownpayment, a.deciBalance, a.datDueDate, i.intNoOfYear, i.deciRegularInterest,      i.deciAtNeedInterest FROM tblcustomer c
                    INNER JOIN tblavailunit a ON a.intCustomerId = c.intCustomerId
                    INNER JOIN tblinterest i ON a.intInterestId = i.intInterestId
                    INNER JOIN tbllot l ON a.intLotID = l.intLotID
                    INNER JOIN tblblock b ON b.intBlockID =l.intBlockID
                    INNER JOIN tbltypeoflot tl ON tl.intTypeID = b.intTypeID WHERE a.intStatus = 0 AND a.boolDownpaymentStatus = 1  AND a.boolForfeitedNotice is null ORDER BY c.strLastName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        


        while($row = mysql_fetch_array($result)){ 
			  
          $intCustomerId =$row['intCustomerId'];
          $strFirstName =$row['strFirstName'];
          $strMiddleName =$row['strMiddleName'];
          $strLastName=$row['strLastName'];
          
          $strLotName=$row['strLotName'];
          $deciSellingPrice=$row['deciSellingPrice'];
          
          $intAvailUnitId=$row['intAvailUnitId'];
          $strModeOfPayment =$row['strModeOfPayment'];
          $intStatus =$row['intStatus'];
          $boolDownpaymentStatus =$row['boolDownpaymentStatus'];
          $intInterestId =$row['intInterestId'];
          $deciDownpayment =$row['deciDownpayment'];
          $deciBalance =$row['deciBalance'];
          $datDueDate =$row['datDueDate'];
          
          $intNoOfYear =$row['intNoOfYear'];
          $deciRegularInterest =$row['deciRegularInterest'];
          $deciAtNeedInterest =$row['deciAtNeedInterest'];
          
                      
          echo 
			  "<tr>
                    <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                  
                    <td align='center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#viewCollectionLot$intAvailUnitId'>
                            <i class='glyphicon glyphicon-eye-open'></i>
                        </button>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#viewCollectionHistoryLot$intAvailUnitId'>History</button>
                    </td>
                    ";
                    
                    require("../modals/transaction/collectionLot-modal.php");
                   
  
                        
        echo "</tr>";
                
            }//while($row = mysql_fetch_array($result))
            mysql_close($conn);
        
    }//function viewCollectionLot
    
    function viewCollectionAsh(){
        
        $sql = "SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, l.strUnitName, tl.dblSellingPrice, a.intAvailUnitAshId, a.strModeOfPayment, a.intStatus, a.boolDownpaymentStatus, a.intInterestId, a.deciDownpayment, a.deciBalance, a.datDueDate, i.intNoOfYear, i.deciRegularInterest, i.deciAtNeedInterest FROM tblcustomer c
                    INNER JOIN tblavailunitash a ON a.intCustomerId = c.intCustomerId
                    INNER JOIN tblinterest i ON a.intInterestId = i.intInterestId
                    INNER JOIN tblacunit l ON a.intUnitID = l.intUnitID
                    INNER JOIN tbllevelash tl ON tl.intLevelAshID = l.intLevelAshID WHERE a.intStatus = 0 AND a.boolDownpaymentStatus = 1 AND a.boolForfeitedNotice IS NULL ORDER BY c.strLastName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        


        while($row = mysql_fetch_array($result)){ 
			  
          $intCustomerId =$row['intCustomerId'];
          $strFirstName =$row['strFirstName'];
          $strMiddleName =$row['strMiddleName'];
          $strLastName=$row['strLastName'];
          
          $strUnitName=$row['strUnitName'];
          $dblSellingPrice=$row['dblSellingPrice'];
          
          $intAvailUnitAshId=$row['intAvailUnitAshId'];
          $strModeOfPayment =$row['strModeOfPayment'];
          $intStatus =$row['intStatus'];
          $boolDownpaymentStatus =$row['boolDownpaymentStatus'];
          $intInterestId =$row['intInterestId'];
          $deciDownpayment =$row['deciDownpayment'];
          $deciBalance =$row['deciBalance'];
          $datDueDate =$row['datDueDate'];
          
          $intNoOfYear =$row['intNoOfYear'];
          $deciRegularInterest =$row['deciRegularInterest'];
          $deciAtNeedInterest =$row['deciAtNeedInterest'];
          
                      
          echo 
			  "<tr>
                    <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                  
                    <td align='center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#viewCollectionAsh$intAvailUnitAshId'>
                            <i class='glyphicon glyphicon-eye-open'></i>
                        </button>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#viewCollectionHistoryAsh$intAvailUnitAshId'>History</button>
                        
                    </td>";
                     require("../modals/transaction/collectionAsh-modal.php");
                    // require('../modals/transaction/reserve-modal.php');
                    // require('../modals/transaction/atneed-modal.php');

              echo"</tr>";
                
            }//while($row = mysql_fetch_array($result))
            mysql_close($conn);
        
    }//function viewCollectionLot
    
}//class collection


// class unitManagementLot{

//     function viewService(){
        
// 		$sql = "SELECT s.intServiceID, s.strServiceName, s.dblServicePrice, d.dblPercent, d.strDescription FROM tblservice s
//                 INNER JOIN tbldiscount d ON d.intServiceID = s.intServiceID
//                 INNER JOIN tblservicetype st ON st.intServiceTypeId = s.intServiceTypeId WHERE s.intStatus = 0 AND st.strServiceTypeName = 'Service Scheduling' ORDER BY s.strServiceName ASC";

//         $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
//         mysql_select_db(constant('mydb'));
//         $result = mysql_query($sql,$conn);

//         while($row = mysql_fetch_array($result)){ 

//         $intServiceID   =$row['intServiceID'];
//         $strServiceName =$row['strServiceName'];
//         $dblServicePrice=$row['dblServicePrice'];
//         $dblPercent     =$row['dblPercent'];
//         $strDescription =$row['strDescription'];

//         echo '<option value ="'.$intServiceID.'">'.$strServiceName.'</option>';

//         }//while($row1 = mysql_fetch_array($result1))
//         mysql_close($conn1);
//     }//function viewSErvice
    
	
    
// }//class unitManagementLot
// //___________________________________________________




















class interest{

    function viewInterest(){
        
		$sql = "SELECT * FROM tblinterest ORDER BY intNoOfYear ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
             
            $intInterestId      =$row['intInterestId'];
            $intNoOfYear        =$row['intNoOfYear'];
            $deciAtNeedInterest =$row['deciAtNeedInterest'];
            $deciRegularInterest=$row['deciRegularInterest'];
            $intStatus          =$row['intStatus'];
              
            echo 
                "<tr>
                   <td style = 'font-size:18px; text-align: right;'>$intNoOfYear</td>
				   <td style = 'font-size:18px; text-align: right;'>$deciAtNeedInterest</td>
				   <td style = 'font-size:18px; text-align: right;'>$deciRegularInterest</td>
                </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewInterest()
    
   

}//class interest
//______________________________________________________________


class types{

    function viewTypes(){
		$sql = "Select * from tbltypeoflot WHERE intStatus = 0 ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intTypeID = $row['intTypeID']; 
                $strTypeName = $row['strTypeName'];
                $intNoOfLot = $row['intNoOfLot'];
                $dblSellingPrice = $row['dblSellingPrice'];
                $intStatus = $row['intStatus']; 
                
                echo "<tr>
                          <td style = 'font-size:18px;'>$strTypeName</td>
                          <td style = 'font-size:18px; text-align: right;'>$intNoOfLot</td>
                          <td style = 'font-size:18px; text-align: right;'>₱ ".number_format($dblSellingPrice,2)."</td>
                    
                         
                      </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewTypes()         
}//class lot type
//_________________________________________


class section{
    
    function viewSection(){
		
        $sql = "Select * from tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
            while($row = mysql_fetch_array($result)){
                
                $intSectionID = $row['intSectionID']; 
                $strSectionName = $row['strSectionName'];
                $intNoOfBlock = $row['intNoOfBlock'];
                $intStatus = $row['intStatus']; 
                
                echo "<tr>
                          <td style ='font-size:20px;'>$strSectionName</td>
                          <td style = 'text-align: right; font-size: 18px;'>$intNoOfBlock</td>
                       </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewSection()
}//class section
//________________________________________________________________
	
class block{

    function viewBlock(){
        
		$sql = "SELECT b.intBlockID, b.strBlockName, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName FROM tblblock b INNER JOIN tblsection s 
                ON b.intSectionID = s.intSectionID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ORDER BY strSectionName ASC";
        
                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                mysql_select_db(constant('mydb'));
                $result = mysql_query($sql,$conn);
        
		        while($row = mysql_fetch_array($result)){
            
                $intBlockID = $row['intBlockID']; 
                $strBlockName = $row['strBlockName'];
                $intNoOfLot = $row['intNoOfLot'];
                $intStatus = $row['intStatus'];
                $strTypeName = $row['strTypeName'];
                $strSectionName = $row['strSectionName'];
                 
                
                echo "<tr>
                          <td style ='font-size:18px;'>$strBlockName</td>
                          <td style ='font-size:18px;'> $strTypeName</td>
                          <td style ='font-size:18px;'> $strSectionName</td>
                          <td style ='font-size:18px; text-align:right;'>$intNoOfLot</td>
                      </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewBlock()         


	function selectSection(){
		$sql = " select * from dbholygarden.tblsection where intStatus='0' ORDER BY strSectionName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value = ".$row['intSectionID'].">".$row['strSectionName']."</option>";
        }
         mysql_close($conn);
    }

    function selectTypeBlock(){
        
		$sql = " select * from dbholygarden.tbltypeoflot where intStatus='0' ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value =". $row['intTypeID'].">".$row['strTypeName']."</option>";
        }
         mysql_close($conn);
    }

}//class block
//____________________________________________________	




class ashCrypt{

    function viewAshCrypt(){
		
		$sql = "Select * from tblashcrypt where intStatus='0' order by strAshName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
       
		while($row = mysql_fetch_array($result))
		  { 
            $intAshID = $row['intAshID'];
            $strAshName =$row['strAshName'];
            $intNoOfLevel =$row['intNoOfLevel'];
            
              
		echo "<tr>
                  <td style ='font-size:18px;'>$strAshName</td>
				  <td style = 'text-align: right; font-size:20px;'>$intNoOfLevel</td>
              </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewBuilding()
	
}//class aschcrypt
//___________________________________________


class levelAC{

    function viewLevelAC(){
        
		$sql = "Select la.intLevelAshID, la.strLevelName, la.intStatus, la.intNoOfUnit, ac.strAshName, la.dblSellingPrice from tbllevelash la
		          INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID where la.intStatus ='0' ORDER BY la.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
            $intLevelAshID =$row['intLevelAshID'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intNoOfUnit =$row['intNoOfUnit'];
            $dblSellingPrice =$row['dblSellingPrice'];
              
			echo "<tr>
                    <td style ='font-size:18px;'>$strLevelName</td>
				    <td style ='font-size:18px;'>$strAshName</td>
                    <td style = 'text-align: right; font-size:18px;'>$intNoOfUnit</td>
                    <td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblSellingPrice,2)."</td>
                 </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewLA()
    
    
	
	function selectAC(){
		$sql = " select * from dbholygarden.tblashcrypt where intStatus='0' Order by strAshName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result))
        {
            $intAshID = $row['intAshID'];
            $strAshName = $row['strAshName'];
            
            echo "<option value = '$intAshID'>$strAshName</option>";
        }
         mysql_close($conn);
    }//function selectAC()
	
}//class level
//____________________________________________________

class interestForLevel{

    function viewInterest(){
        
		$sql = "SELECT iL.intInterestID, iL.intYear, iL.dblPercent, iL.intStatus, iL.intAtNeed, l.strLevelName, a.strAshName FROM tblinterestforlevel iL
		          INNER JOIN tbllevelash l ON iL.intLevelAshID = l.intLevelAshID 
                  INNER JOIN tblashcrypt a ON l.intAshID = a.intAshID WHERE iL.intStatus='0' ORDER BY l.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
            $intInterestID =$row['intInterestID'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intYear     =$row['intYear'];
            $dblPercent =$row['dblPercent'];
            $intStatus=$row['intStatus'];
            $intAtNeed=$row['intAtNeed'];
            
            if($intAtNeed==1){
              $tfAtNeed ="Yes";
            }else{
                $tfAtNeed="No";
            }
            
            $dblPercentValue = $dblPercent*100;
              
		echo "<tr>
                <td style ='font-size:18px;'>$strLevelName ($strAshName)</td>
                <td style = 'text-align: right; font-size:18px;'>$intYear</td>
                <td style = 'font-size:18px;'>$tfAtNeed</td>
                <td style = 'text-align: right; font-size:18px;'>$dblPercentValue %</td>
             </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewInterest()
    
    function selectLevel(){
        
		$sql = "SELECT la.intLevelAshID, la.strLevelName, la.dblSellingPrice, ac.strAshName, la.intStatus from tbllevelash la
                    INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE la.intStatus = '0' ORDER BY ac.strAshName ASC";
                                                                          
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value =". $row['intLevelAshID'].">".$row['strLevelName']." (".$row['strAshName'].")</option>";
        }
         mysql_close($conn);
    }//function selectLevel

}//class interestForlevel
//_______________________________________________________

class service{

    function viewService(){
		
        $sql = "SELECT s.intServiceID, s.strServiceName, s.dblServicePrice, st.strServiceTypeName FROM tblservice s 
                    INNER JOIN tblservicetype st ON s.intServiceTypeId = st.intServiceTypeId WHERE s.intStatus='0' ORDER BY s.strServiceName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){
             
              $intServiceID = $row['intServiceID'];
              $strServiceName = $row['strServiceName'];
              $strServiceTypeName = $row['strServiceTypeName'];
              $dblServicePrice = $row['dblServicePrice'];
              
             
              
	           echo "<tr>
                        <td style ='font-size:18px;'>$strServiceName</td>
                        <td style ='font-size:18px;'>$strServiceTypeName</td>
                        <td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblServicePrice,2)."</td>
                    </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewService()
    
    function selectServiceType(){
		$sql = "SELECT * FROM tblservicetype ORDER BY strServiceTypeName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result)){
            
            $intServiceTypeId = $row['intServiceTypeId'];
            $strServiceTypeName = $row['strServiceTypeName'];
            
            echo "<option value = '$intServiceTypeId'> $strServiceTypeName </option>";
        }//while
         mysql_close($conn);
    }//function selectServiceType()


}//class service
//____________________________________________________

class discount{

    function viewDiscount(){
        
		$sql = "select d.intDiscountID, s.strServiceName, d.strDescription, d.dblPercent, d.intStatus FROM tbldiscount d
	                   INNER JOIN tblservice s ON d.intServiceID = s.intServiceID where d.intStatus='0' ORDER BY s.strServiceName ASC";

        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){ 
              
              $intDiscountID =$row['intDiscountID'];
              $strServiceName =$row['strServiceName'];
              $strDescription =$row['strDescription'];
              $dblPercent =$row['dblPercent'];
              $intStatus =$row['intStatus'];
              
              $dblPercentValue = $dblPercent*100;               
             
		      echo "<tr>
                        <td style ='font-size:18px;'>$strServiceName</td>
                        <td style ='font-size:18px;'>$strDescription</td>
                        <td style = 'text-align: right; font-size:18px;'>$dblPercentValue %</td>
                    </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewDiscount()

        function selectService(){
		$sql = " select * from dbholygarden.tblService where intStatus='0' order by strServiceName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result))
        {
            $intServiceID = $row['intServiceID'];
            $strServiceName = $row['strServiceName'];
            
            echo "<option value = '$intServiceID'>$strServiceName</option>";
        }
         mysql_close($conn);
    }//function selectService()
	
}//class discount
    

?>   
