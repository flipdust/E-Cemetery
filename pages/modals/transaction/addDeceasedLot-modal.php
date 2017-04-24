<div class='modal fade' id='<?php echo"addDeceasedLot$intLotID";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style = 'width:80%; height: 90%;'>
        <div class='modal-content'>
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3><b>ADD DECEASED</b></h3></center>
            </div>
            
            <div class='modal-body'>
                <form class='form-horizontal' role='form' action='unitmanagement-transaction.php' method='POST'>
                    <div class='row'>
                        <form class='form-horizontal' role='form' action='unitmanagement-transaction.php' method='POST'>
                            <div class='col-md-6'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h2><strong>DECEASED DETAILS</strong></h2>
                                    </div>

                                    <div class='panel-body'>
                                        <?php 
                                        $sql = "SELECT  c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, a.dateAvailUnit, a.strModeOfPayment, a.deciAmountPaid FROM tblcustomer c
                                                INNER JOIN tblavailunit a ON a.intCustomerId = c.intCustomerId
                                                INNER JOIN tbllot l ON a.intLotID = l.intLotID WHERE a.intLotID = '$intLotID'";

                                        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                        mysql_select_db(constant('mydb'));
                                        $result = mysql_query($sql,$conn);
                                        


                                        while($row = mysql_fetch_array($result)){ 
                                            
                                        $intCustomerId =$row['intCustomerId'];
                                                    
                                        }//while($row = mysql_fetch_array($result))
                                        mysql_close($conn);         
        
                                    ?>
                                        <input type='hidden' name='tfCustomer' value='$intCustomerId'>
                                        <input type='hidden' name='tfLotId' value='$intLotID'>
                                        <input type='hidden' name='tfTransactionType' value='0'>
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Relationship to Owner:</label>
                                            <div class='col-md-5'>
                                                <input type='text' class='form-control input-md' name= 'tfRelationOwner' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>First Name:</label>
                                            <div class='col-md-5'>
                                                <input type='text' class='form-control input-md' name= 'tfFirstName' placeholder='First Name' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Middle Name:</label>
                                            <div class='col-md-5'>
                                                <input type='text' class='form-control input-md' name= 'tfMiddleName' placeholder='Middle Name' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Last Name:</label>
                                            <div class='col-md-5'>
                                                <input type='text' class='form-control input-md' name= 'tfLastName' placeholder='Last Name' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Gender:</label>
                                            <div class='col-md-5'>
                                                <input type='radio'  align='right' class='flat form-control input-md' value='0' name='gender'> Male
                                                <input type='radio' align='right' class='flat form-control input-md' value='1' name='gender'>Female
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Date of Birth:</label>
                                            <div class='col-md-5'>
                                                <input type='date' class='form-control input-md' name= 'dateOfBirth' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'> Date Died:</label>
                                            <div class='col-md-5'>
                                                <input type='date' class='form-control input-md' name= 'dateDied' >
                                            </div>
                                        </div>
                                        
                                            
                                    </div><!--panel-body-->
                                </div><!--panel panel-default-->
                            </div><!--col-md-6-->
                            
                            <div class='col-md-6'>
                                <div class='panel-body'>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <?php $date = date('Y-m-d');?>
                                            <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Total Amount to Pay:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' align='left' name= 'tfTotalAmount' id='tfPriceCreate' onkeypress='return validateNumber(event)' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' align='left' name= 'tfAmountPaid' id='tfPriceCreate' onkeypress='return validateNumber(event)' required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <div class='col-md-9 col-sm-9 col-xs-12 col-md-offset-3'>
                                            <button type='submit' class='btn btn-success' name='btnAddDeceasedLot'>Submit</button>
                                            <button type='close' class='btn btn-primary'>Clear Entries</button>
                                        </div>
                                    </div>      


                                </div><!--panel-body-->
                            </div><!--col-md-6-->
                            
                            
                        </form>
                    </div><!--row-->
                    
                </form>
            </div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->     


