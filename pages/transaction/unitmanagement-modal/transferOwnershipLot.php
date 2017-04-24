
<div class="modal fade" id="transferOwnershipLot<?php echo $intAvailUnitId ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
    <div class="modal-dialog" role="document" style = "width:80%; height: 90%;">
        <div class="modal-content">
            <div class="modal-header" style='background:#b3ffb3;'>
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3><b>TRANSFER OWNERSHIP</b></h3></center>
            </div>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                
                         <div class="panel-body">
                            <form class="form-vertical" role="form" action="unitmanagement-transaction.php" method="POST">
                                
                                <div class="row">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control input-md" name= "tfAvailUnitId" value="<?php echo $intAvailUnitId ?>" required>

                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            First Name:
                                            <input onkeyup="checkFormT(<?php echo $intAvailUnitId ?>)" id="fn<?php echo $intAvailUnitId ?>" type="text" class="form-control input-md" name= "tfFirstName"   required>
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            Middle Name:
                                            <input type="text" class="form-control input-md" name= "tfMiddleName"  >
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Last Name:
                                            <input onkeyup="checkFormT(<?php echo $intAvailUnitId ?>)" id="ln<?php echo $intAvailUnitId ?>"  type="text" class="form-control input-md" name= "tfLastName"  required>
                                        </div>
                                    </div>
                                </div><!--ROW-->
                    
                                    <script>
                                        
                                    function checkFormT(num){
                                        var fn=$('#fnT'+num).val();
                                        var ln=$('#lnT'+num).val();
                                        var birth=$('#birthT'+num).val();
                                        var address=$('#addressT'+num).val();
                                        var contact=$('#contactT'+num).val();
                                        var amountTo=$('#amountTobePaidT'+num).val();
                                        var amount=$('#priceT'+num).val();
                                        if(amountTo==''){
                                        amountTo=0;    
                                        }else{
                                        amountTo=parseFloat(amountTo.replace(/,/g,''));
                                        }
                                        if(amount==''){
                                        }else{
                                        amount=parseFloat(amount.replace(/,/g,''));
                                        }
                                        
                                        if((amountTo>amount&&amount!='')||amount==''||address==''||contact==''||birth==''||fn==''||ln==''){
                                            $('#submitT'+num).prop('disabled',true);
                                        }else{
                                            if(amountTo < amount ){
                                                document.getElementById('changeDivT'+num).style.display='block';
                                                var change = parseFloat(amount-amountTo);
                                                $('#change2T'+num).val(change);
                                            }else{
                                                document.getElementById('changeDivT'+num).style.display='none';
                                            }
                                            $('#submitT'+num).prop('disabled',false);
                                        }
                                    }    
                                    </script>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Address:
                                            <input onkeyup="checkFormT(<?php echo $intAvailUnitId ?>)" id="addressT<?php echo $intAvailUnitId ?>"  type="text" class="form-control input-md" name= "tfAddress"  required>
                                        </div>

                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Contact No:
                                            <input type="text" onkeyup="checkFormT(<?php echo $intAvailUnitId ?>)" id="contactT<?php echo $intAvailUnitId ?>"  class="form-control"  name= "tfContactNo"  required>
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Date of Birth:
                                            <input  onchange="checkFormT(<?php echo $intAvailUnitId ?>)" id="birthT<?php echo $intAvailUnitId ?>"  type="date" class="form-control input-md" name= "tfDate"  required>
                                        </div>
                                    </div>
                                </div><!--ROW-->
                    
                                <div class="row">
                                    <div class="form-group">
                                    
                                        <div class="col-md-4" style="margin-top: 30px;">
                                            <span style="color:red;">*</span>
                                            Gender:
                                            <input type="radio" checked align="right" class="input-md" name="gender" value="0" > MALE
                                            <input type="radio" align="right" class=" input-md" name="gender"  value="1">FEMALE
                                        </div>
                                    
                                        <div class="col-md-4" style="margin-top:30px;">
                                            <span style="color:red;">*</span>
                                            Civil Status:
                                            <input type="radio" checked align="right" class="  input-md" for="single"  name="civilStatus" value="0"> SINGLE
                                            <input type="radio" align="right" class="  input-md" for="married"  name="civilStatus" value="1"> MARRIED
                                            <input type="radio" align="right" class="  input-md" for="widow"   name="civilStatus" value="2"> WIDOW
                                        </div>
                                        
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            Total Amount to Pay:
                                            <div class=' input-group'>
                                                <?php
                                                    $sql2 =  " select * from dbholygarden.tblbusinessdependency WHERE intBusinessDependencyId = 6";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result2 = mysql_query($sql2,$conn);
                                                    
                                                    while($row2 = mysql_fetch_array($result2)){
                                                        
                                                        $intBusinessDependencyId =$row2['intBusinessDependencyId'];
                                                        $deciBusinessDependencyValue =$row2['deciBusinessDependencyValue'];
                                                        
                                                        
                                                    }//while
                                                
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' name='tfTotalAmount' id="amountTobePaidT<?php echo $intAvailUnitId ?>" value="<?php echo $deciBusinessDependencyValue ?>" readonly/>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <span style="color:red;">*</span>
                                            Amount Paid:
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' onkeyup="checkFormT(<?php echo $intAvailUnitId ?>)" id="priceT<?php echo $intAvailUnitId ?>"  class='form-control input-md tfAmountPaid' name='tfAmountPaid' required/>
                                            </div>
                                        </div>
                                    
                                        
                                            <div class="col-md-6" id="changeDivT<?php echo $intAvailUnitId ?>" style="display:none">
                                                <span style="color:red;">*</span>
                                                Change:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input type='text' id="change2T<?php echo $intAvailUnitId ?>" class='form-control input-md tfAmountPaid' name='' readonly/>
                                                </div>
                                            </div>
                                    </div>
                                </div><!--ROW-->
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" disabled id="submitT<?php echo $intAvailUnitId ?>" name= "btnSubmitCustomerLot">Submit</button>
                                    <input class = "btn btn-default" type="reset" name = "btnClear" value = "Clear Entries">
                                </div>
                            </form>
                        </div><!--PANEL BODY-->
                    </div>
                </div>
            </div><!--ROW-->
        
        </div><!--/modal-content-->  
    </div><!--/modal body-->
</div><!--/modal-fade-->
