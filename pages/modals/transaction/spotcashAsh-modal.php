<!----------------------------------------------Spot FORM---------------------------------->
<div class='modal fade' id='<?php echo"modalSpot$intUnitID";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
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
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Ash-crypt:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfAshCrypt' value='<?php echo"$strAshName";?>'  readonly>
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
                            </div><!--panel-default-->
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
                                </div>
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
                                            <input type='text' class='form-control input-md' value='Spotcash' name='tfModeOfPayment' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Discounted Price:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <?php
                                                    $sql2 =  " select * from dbholygarden.tblbusinessdependency WHERE intBusinessDependencyId = 3";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result2 = mysql_query($sql2,$conn);
                                                    
                                                    while($row2 = mysql_fetch_array($result2)){
                                                        
                                                        $intBusinessDependencyId =$row2['intBusinessDependencyId'];
                                                        $deciBusinessDependencyValue =$row2['deciBusinessDependencyValue'];
                                                        $finalDependencyValue=$deciBusinessDependencyValue/100;
                                                        
                                                        
                                                    }//while
                                                $discountSpot = $dblSellingPrice * $finalDependencyValue;
                                                $finalAmount = $dblSellingPrice - $discountSpot;
                                                        
                                                
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfDiscountedPrice' value='<?php  echo"".number_format($finalAmount,2)."";?>' readonly/>
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
                            </div><!--panel-default-->
                        </div><!--col-md-6-->
                        
                        
                    </div><!--row-->
                    <div class='form-group modal-footer'> 
                        <button type='submit' class='btn btn-success' name= 'btnSubmitSpotcashAsh'>Submit</button>
                        <input class = 'btn btn-default' type='reset' name = 'btnClear' value = 'Clear Entries'>
                    </div>
                        
                </form>
			</div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->

				