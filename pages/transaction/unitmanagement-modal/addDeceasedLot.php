<div class="modal fade" id="addDeceasedLot<?php echo $intAvailUnitId ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
    <div class="modal-dialog" role="document" style = "width:80%; height: 90%;">
        <div class="modal-content">
             <div class="modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3><b>ADD DECEASED</b></h3></center>
            </div>
            
            <div class='modal-body'>
                <form class='form-vertical' role='form' action='unitmanagement-transaction.php' method='POST'>
                    <div class = "row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <input type="hidden" class="form-control input-md" name= "tfAvailUnitId" value="<?php echo $intAvailUnitId ?>" required>
                                        <input type="hidden" class="form-control input-md" name= "tfLotId" value="<?php echo $intBlockID ?>" required>
                                        
                                        <div class="form-group">
                                            <div class="col-md-4" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Deceased First Name:
                                                <input type="text" onkeyup="checkForm(<?php echo $intAvailUnitId ?>)" id="fn<?php echo $intAvailUnitId ?>" class="form-control input-md" name= "tfDeceasedFirstName" placeholder="First Name" required>
                                            </div>
                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                                Deceased Middle Name:
                                                <input type="text" class="form-control input-md" name= "tfDeceasedMiddleName" placeholder="Middle Name" >
                                            </div>
                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Deceased Last Name:
                                                <input type="text" onkeyup="checkForm(<?php echo $intAvailUnitId ?>)" class="form-control input-md" id="ln<?php echo $intAvailUnitId ?>" name= "tfDeceasedLastName" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div><!--ROW-->
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <div class="col-md-6" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Date of Birth:
                                                <input type="date" class="form-control input-md" id="birth<?php echo $intAvailUnitId ?>" name= "tfDateOfBirth" max= "<?php echo date("Y-m-d"); ?>" onchange = "computeAge('<?php echo $intAvailUnitId ?>')" required>
                                            </div>
                                            
                                            <div class="col-md-6" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Date of Death:
                                                <input type="date" class="form-control input-md" id="death<?php echo $intAvailUnitId ?>" onchange = "computeAge('<?php echo $intAvailUnitId ?>')"  max= "<?php echo date("Y-m-d"); ?>" name= "tfDateOfDeath" required >
                                            </div>
                                        </div>
                                    </div><!--ROW-->
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4" style="margin-top: 30px;">
                                                <span style="color:red;">*</span>
                                                Gender:<br>
                                                <input type="radio" checked align="right" class="input-md" name="deceasedGender" value="0" > MALE
                                                <input type="radio" align="right" class="input-md" name="deceasedGender"  value="1" >FEMALE
                                            </div>
                                            
                                            <div class="col-md-4" style="margin-top:.30em;">
                                                <span style="color:red;">*</span>
                                                Relationship to Owner:
                                                <input onkeyup="checkForm(<?php echo $intAvailUnitId ?>)" type="text" class="form-control input-md" id="relationship<?php echo $intAvailUnitId ?>" name= "tfRelationship" placeholder="Relationship to Owner" required>
                                            </div>
                                            <div class="col-md-4" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Age:
                                                <input type="text" class="form-control input-md" name="tfDeceasedAge" id= "age<?php echo $intAvailUnitId ?>" placeholder="Age" readonly>
                                            </div>
                                        </div>
                                    </div><!--ROW-->
                                    
                                </div><!--panel body -->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Service:</label>
                                            <div class="col-md-7">
                                                    <?php
                                                        $sql1 = "SELECT s.intServiceID, s.strServiceName, s.dblServicePrice, d.dblPercent, d.strDescription FROM tblservice s
                                                                INNER JOIN tbldiscount d ON d.intServiceID = s.intServiceID
                                                                INNER JOIN tblservicetype st ON st.intServiceTypeId = s.intServiceTypeId WHERE s.intStatus = 0 AND st.strServiceTypeName = 'Service Scheduling' AND s.strServiceName = 'Interment' ORDER BY s.strServiceName ASC";

                                                        $conn1 = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                        mysql_select_db(constant('mydb'));
                                                        $result1 = mysql_query($sql1,$conn1);

                                                        while($row1 = mysql_fetch_array($result1)){ 

                                                        $intServiceID   =$row1['intServiceID'];
                                                        $strServiceName =$row1['strServiceName'];
                                                        $dblServicePrice=$row1['dblServicePrice'];
                                                        $dblPercent     =$row1['dblPercent'];
                                                        $strDescription =$row1['strDescription'];


                                                        }//while($row1 = mysql_fetch_array($result1))
                                                         
                                                     
                                                    ?>
                                                    <input type='text' class='form-control input-md'  name = "" value='<?php echo $strServiceName ?>' readonly/>
                                                    <input type='hidden' class='form-control input-md' id="service<?php echo $intAvailUnitId ?>" name = "tfServiceId" value='<?php echo $intServiceID ?>' readonly/>

                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <div class="col-md-6" style="margin-top: 30px;">Date:
                                                <?php $date = date('Y-m-d');?>
                                                <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                            </div>
                                            <div class="col-md-6" style="margin-top: 30px;"><span style="color:red;">*</span>Date of Interment:
                                                <input type='date' onchange="checkForm(<?php echo $intAvailUnitId ?>)" id="dateOfInterment<?php echo $intAvailUnitId ?>" class='form-control input-md' name='tfDateOfInterment' value='' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <div class="col-md-6" style="margin-top: 30px;">
                                                Total Amount to Pay:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input type='text' value="<?php echo $dblServicePrice ?>" class='form-control input-md tfAmountPaid' id="price<?php echo $intAvailUnitId ?>" name='tfTotalAmount' readonly/>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-6" style="margin-top: 30px;">
                                                <span style="color:red;">*</span>
                                                Amount Paid:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input onkeyup="checkForm(<?php echo $intAvailUnitId ?>)" type='text' id="amountPaid<?php echo $intAvailUnitId ?>" class='form-control input-md tfAmountPaid' name='tfAmountPaid' required/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            <div class="form-group" id="changeDiv<?php echo $intAvailUnitId ?>" style="display:none">
                                                <span style="color:red;">*</span>
                                                Change:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input type='text' id="change2<?php echo $intAvailUnitId ?>" class='form-control input-md tfAmountPaid' name='' readonly/>
                                                </div>
                                            </div>
                                        
                                        <div class='form-group col-md-offset-7'> 
                                            <button type='submit' disabled id="submit<?php echo $intAvailUnitId ?>" class='btn btn-success' name= 'btnSubmitDeceasedLot'>Submit</button>
                                            <input class = 'btn btn-default' type='reset' name = 'btnClear' value = 'Clear Entries'>
                                        </div>
                                        
                                    </div><!--ROW-->
                                </div><!--panel body -->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->  
                    </div><!--row-->

                </form>
            </div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->     