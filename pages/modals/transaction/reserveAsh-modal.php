<!----------------------------------------------Reserve FORM---------------------------------->
<div class='modal fade' id='<?php echo"modalReserve$intUnitID";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style = 'width:80%; height: 90%;'>
        <div class='modal-content'>
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3><b>BILL OUT FORM</b></h3></center>
            </div>

            <div class='modal-body'>
                <form class='form-horizontal' role='form' action='availUnit.php' method='POST'>
                    
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class ='panel panel-default'>
                                <div class='panel-body'>

                                    <input type='hidden'  name='tfUnitId' value='<?php echo"$intUnitID";?>'  readonly>
                                    <input type='hidden'  name='tfStatus' value='0'  readonly>
                                    <input type='hidden'  name='tfDownpaymentStatus' value='0'  readonly>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Unit Name:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfUnitName' value='<?php echo"$strUnitName";?>'  readonly>
                                        </div>
                                    </div>
                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Level:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfLevel'  value='<?php echo"$strLevelName";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Ash-Crypt:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfAshCrypt'  value='<?php echo"$strAshName";?>'  readonly>
                                        </div>
                                    </div>
                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Selling Price:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfSellingPrice' value='<?php echo "".number_format($dblSellingPrice,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->

                        <div class='col-md-6'>
                            
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <select class='form-control' name = 'selectCustomer' required>
                                            <option value=''selected disabled> --Choose Customer--</option>
                                            <?php
                                                $sql1 =  " select * from dbholygarden.tblcustomer ORDER BY strLastName ASC";
                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                mysql_select_db(constant('mydb'));
                                                $result1 = mysql_query($sql1,$conn);
                                            
                                                while($row1 = mysql_fetch_array($result1)){
                                                    
                                                    $intCustomerId =$row1['intCustomerId'];
                                                    $strFirstName=$row1['strFirstName'];
                                                    $strMiddleName=$row1['strMiddleName'];
                                                    $strLastName=$row1['strLastName'];
                                    
                                    
                                                    echo"<option value='$intCustomerId'>$strLastName, $strFirstName $strMiddleName</option>";
        
                                                }//while
                                            ?>
                                        </select>
                                    </div>
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class ='panel panel-default'>
                                <div class='panel-body'>

                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <?php $date = date('Y-m-d');?>
                                            <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Mode of Payment:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' value='Reserve' name='tfModeOfPayment' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Years to pay:</label>
                                        <div class="col-md-5">
                                            <select class='form-control' name = 'selectYear' required>
                                                <option value=''selected disabled> --Years/Interest--</option>
                                                <?php
                                                    $sql6 =  " select * from dbholygarden.tblinterest WHERE intStatus = '0' ORDER BY intNoOfYear ASC";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result6 = mysql_query($sql6,$conn);
                                                
                                                    while($row6 = mysql_fetch_array($result6)){
                                                        
                                                        $intInterestId =$row6['intInterestId'];
                                                        $intNoOfYear=$row6['intNoOfYear'];
                                                        $deciAtNeedInterest=$row6['deciAtNeedInterest'];
                                                        $deciRegularInterest=$row6['deciRegularInterest'];
                                        
                                        
                                                        echo"<option value='$intInterestId'>$intNoOfYear - $deciRegularInterest %</option>";
            
                                                    }//while
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Downpayment:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                 <?php
                                                    $sql7 =  " select * from dbholygarden.tblbusinessdependency WHERE intBusinessDependencyId = 1";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result7 = mysql_query($sql7,$conn);
                                                    
                                                    while($row7 = mysql_fetch_array($result7)){
                                                                
                                                        $intBusinessDependencyId =$row7['intBusinessDependencyId'];
                                                        $deciBusinessDependencyValue =$row7['deciBusinessDependencyValue'];
                                                        $finalDependencyValue = $deciBusinessDependencyValue/100;

                                                    }//while
                                                        $downpayment = $dblSellingPrice * $finalDependencyValue;
                                                                
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfDownpayment' value='<?php  echo"".number_format($downpayment,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Due date for downpayment:</label>
                                        <div class='col-md-5'>
                                            <?php
                                                    $sql8 =  " select * from dbholygarden.tblbusinessdependency WHERE intBusinessDependencyId = 7";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result8 = mysql_query($sql8,$conn);
                                                    
                                                    while($row8 = mysql_fetch_array($result8)){
                                                                
                                                        $intBusinessDependencyId =$row8['intBusinessDependencyId'];
                                                        $deciBusinessDependencyValue =$row8['deciBusinessDependencyValue'];
                                                        
                                                        $dueDate =date('Y-m-d', strtotime("+ ".number_format($deciBusinessDependencyValue)." days"));
                                                       
                                                    }//while
                                                                
                                                ?>
                                            <input type='date' class='form-control input-md' value='<?php echo "$dueDate"; ?>' name='tfDueDate' readonly>
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
                                                        $reservationFee = $deciBusinessDependencyValue;
     
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
                                                <input type='text' class='form-control input-md tfAmountPaid' name='tfAmountPaid' required/>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->

                        
                    </div><!--row-->
                    <div class='form-group modal-footer'>
                        <?php
                            $balance = $dblSellingPrice - $downpayment;
                         ?> 
                        <input type='hidden' name='tfBalance' value='<?php echo"$balance"; ?>'> 
                        <button type='submit' class='btn btn-success' name= 'btnSubmitReserveAsh'>Submit</button>
                        <input class = 'btn btn-default' type='reset' name = 'btnClear' value = 'Clear Entries'>
                    </div>
                </form>
			</div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->     

  