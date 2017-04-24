<!----------------------------------------------Reserve FORM---------------------------------->
<div class='modal fade' id='<?php echo"viewReserveLot$intLotID";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style = 'width:80%; height: 90%;'>
        <div class='modal-content'>
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3><b>GENERATE RECEIPT</b></h3></center>
            </div>

            <div class='modal-body'>
                <form class='form-horizontal' role='form' target='_blank' action='../modals/transaction/reservation-pdf.php' method='GET'>
                    
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class ='panel panel-default'>
                                <div class='panel-body'>

                                    <input type='hidden'  name='tfLotId' value='<?php echo"$intLotID";?>'  readonly>
                                    <input type='hidden'  name='tfStatus' value='0'  readonly>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Lot Name:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfLotName' value='<?php echo"$strLotName";?>'  readonly>
                                        </div>
                                    </div>
                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Lot Type:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfTypeName'  value='<?php echo"$strTypeName";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" >
                                         <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>No. of Lot:</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control input-md" min="1" name="tfNoOfLot" value='<?php echo"$intNoOfLot";?>' readonly/>
                                        </div>
                                    </div>
                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Section:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfSectionName' value='<?php echo"$strSectionName";?>'  readonly>
                                        </div>
                                    </div>
                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Block:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfBlockName' value='<?php echo"$strBlockName";?>' readonly>
                                        </div>
                                    </div>
                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Selling Price:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfSellingPrice' value='<?php echo "".number_format($deciSellingPrice,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->

                        <div class='col-md-6'>
                           
                            <div class ='panel panel-default'>
                                <div class='panel-body'>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Customer:</label>
                                        <div class='col-md-5'>
                                            <?php
                                                $sql3="SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, c.strAddress, a.intAvailUnitId, a.dateAvailUnit, a.strModeOfPayment, a.deciAmountPaid, a.intStatus, a.intInterestId, a.deciDownpayment, a.datDueDate, i.intNoOfYear, i.deciRegularInterest FROM tblcustomer c
                                                        INNER JOIN tblavailunit a ON a.intCustomerId = c.intCustomerId
                                                        INNER JOIN tblinterest i ON a.intInterestId = i.intInterestId
                                                        INNER JOIN tbllot l ON a.intLotID = l.intLotID WHERE a.intStatus = '0' AND a.intLotID = '".$intLotID."'";
                                                        
                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                mysql_select_db(constant('mydb'));
                                                $result3 = mysql_query($sql3,$conn);
                                                
                                                while($row3 = mysql_fetch_array($result3)){
                                                    
                                                    $intCustomerId =$row3['intCustomerId'];
                                                    $intAvailUnitId =$row3['intAvailUnitId'];
                                                    $strFirstName=$row3['strFirstName'];
                                                    $strMiddleName=$row3['strMiddleName'];
                                                    $strLastName=$row3['strLastName'];
                                                    $strAddress=$row3['strAddress'];
                                                    $dateAvailUnit=$row3['dateAvailUnit'];
                                                    $intStatus=$row3['intStatus'];
                                                    $intInterestId=$row3['intInterestId'];
                                                    $deciDownpayment=$row3['deciDownpayment'];
                                                    $datDueDate=$row3['datDueDate'];
                                                    $intNoOfYear=$row3['intNoOfYear'];
                                                    $deciRegularInterest=$row3['deciRegularInterest'];
                                                    $strModeOfPayment=$row3['strModeOfPayment'];
                                                    $deciAmountPaid=$row3['deciAmountPaid'];
                                                    
                                                    $interest=$deciRegularInterest/100;
                                                    
                                                    $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                    	
                                                }//while
                                                
                                            ?>
                                            
                                            <input type='text' class='form-control input-md' name='tfCustomer' value="<?php echo $strLastName;echo", $strFirstName $strMiddleName"; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$dateAvailUnit"; ?>' readonly>
                                            <input type='hidden' class='form-control input-md' name='tfAvailUnitId' value='<?php echo "$intAvailUnitId"; ?>' >
                                            <input type='hidden' class='form-control input-md' name='tfAddress' value='<?php echo "$strAddress"; ?>' >
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Mode of Payment:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' value='<?php echo"$strModeOfPayment";?>' name='tfModeOfPayment' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Years To pay:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' value='<?php echo"$intNoOfYear yr - $deciRegularInterest %";?>' name='tfYearsToPay' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Downpayment:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfDownpayment' value='<?php  echo"".number_format($deciDownpayment,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Monthly Amortization:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfamortization' value='<?php  echo"".number_format($amortization,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    

                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        
                        
                        
                    </div><!--row-->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Due date for downpayment:</label>
                                        <div class='col-md-5'>
                                            <input type='date' class='form-control input-md' value='<?php echo "$datDueDate"; ?>' name='tfDueDate' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Reservation Fee:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <?php
                                                    $sql9 =  " select * from dbholygarden.tblbusinessdependency WHERE intBusinessDependencyId = 2";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result9 = mysql_query($sql9,$conn);
                                                    
                                                    while($row9 = mysql_fetch_array($result9)){
                                                                
                                                        $intBusinessDependencyId =$row9['intBusinessDependencyId'];
                                                        $deciBusinessDependencyValue =$row9['deciBusinessDependencyValue'];
                                                        
                                                    }//while
                                                        $reservationFee=$deciBusinessDependencyValue*$intNoOfLot;

                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfReservationFee' value='<?php  echo"".number_format($reservationFee,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' name='tfAmountPaid' value='<?php echo"".number_format($deciAmountPaid,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Change:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                    <?php
                                                    if($deciAmountPaid >= $reservationFee){
                                                        $balance = $deciAmountPaid - $reservationFee;
                                                    }else{
                                                        $balance = $reservationFee - $deciAmountPaid;
                                                        
                                                    }//else
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md'  name='tfBalance' value='<?php echo"".number_format($balance,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class="col-md-6">
                            <button type='submit' class='btn btn-success col-md-12' name= 'btnPrintReserveLot'>Print</button>
                    </form>
                    <form class='form-horizontal' role='form' action='availUnit.php' method='POST'>
                            <input type='hidden' class='form-control input-md' name='tfAvailUnitId' value='<?php echo "$intAvailUnitId"; ?>' >
                            <input type='hidden'  name='tfLotId' value='<?php echo"$intLotID";?>'  readonly>
                            
                            <button class = 'btn btn-danger col-md-12' type='submit' name = 'btnCancelReservation'>Cancel Reservation</button>
                    </form>
                            
                        </div><!--col-md-6-->
                </div><!--row-->
                     
			</div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->     

  