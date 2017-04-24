
<div class="modal fade" id="transferOwnershipAsh<?php echo $intAvailUnitAshId ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
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
                                <input type="hidden" class="form-control input-md" name= "tfAvailUnitAshId" value="<?php echo $intAvailUnitAshId ?>" required>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            First Name:
                                            <input onkeyup="checkFormA(<?php echo $intAvailUnitAshId ?>)" id="fn2A<?php echo $intAvailUnitAshId ?>" type="text" class="form-control input-md" name= "tfFirstName"  required>
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            Middle Name:
                                            <input type="text" class="form-control input-md" name= "tfMiddleName"  >
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Last Name:
                                            <input onkeyup="checkFormA(<?php echo $intAvailUnitAshId ?>)" id="ln2A<?php echo $intAvailUnitAshId ?>" type="text" class="form-control input-md" name= "tfLastName" required>
                                        </div>
                                    </div>
                                </div><!--ROW-->
                    
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Address:
                                            <input onkeyup="checkFormA(<?php echo $intAvailUnitAshId ?>)" id="address2A<?php echo $intAvailUnitAshId ?>" type="text" class="form-control input-md" name= "tfAddress"  required>
                                        </div>

                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Contact No:
                                            <input type="text" class="form-control"  onkeyup="checkFormA(<?php echo $intAvailUnitAshId ?>)" id="contact2A<?php echo $intAvailUnitAshId ?>" name= "tfContactNo"  required>
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Date of Birth:
                                            <input onkeyup="checkFormA(<?php echo $intAvailUnitAshId ?>)" id="birthA<?php echo $intAvailUnitAshId ?>" type="date" class="form-control input-md" name= "tfDate"  required>
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
                                                <input type='text' class='form-control input-md tfAmountPaid' name='tfTotalAmount' id="amountTobePaidA<?php echo $intAvailUnitAshId ?>" value="<?php echo $deciBusinessDependencyValue ?>" readonly/>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6" style="margin-top: 30px;">
                                            <span style="color:red;">*</span>
                                            Amount Paid:
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' onkeyup="checkFormA(<?php echo $intAvailUnitAshId ?>)" id="price22A<?php echo $intAvailUnitAshId ?>" name='tfAmountPaid' required/>
                                            </div>
                                        </div>
                                    
                                        
                                            <div class="col-md-6" id="changeDiv2A<?php echo $intAvailUnitAshId ?>" style="display:none">
                                                <span style="color:red;">*</span>
                                                Change:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input type='text' id="change22A<?php echo $intAvailUnitAshId ?>" class='form-control input-md tfAmountPaid' name='' readonly/>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div><!--ROW-->
                                
                                    <script>
                                        
                                    function checkFormA(num){
                                        var fn=$('#fn2A'+num).val();
                                        var ln=$('#ln2A'+num).val();
                                        var birth=$('#birth2A'+num).val();
                                        var address=$('#address2A'+num).val();
                                        var contact=$('#contact2A'+num).val();
                                        var amountTo=$('#amountTobePaidA'+num).val();
                                        var amount=$('#price22A'+num).val();
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
                                         
                                            $('#submit2A'+num).prop('disabled',true);
                                         
                                        }else{

                                            if(amountTo < amount ){
                                                document.getElementById('changeDiv2A'+num).style.display='block';
                                                var change = parseFloat(amount-amountTo);
                                                $('#change22A'+num).val(change);
                                            }else{
                                                document.getElementById('changeDiv2A'+num).style.display='none';
                                            }
                                            $('#submit2A'+num).prop('disabled',false);
                                        }
                                    }    
                                    </script>
                                <div class="modal-footer">
                                     
                            
                                    <button type="submit" class="btn btn-success" id="submit2A<?php echo $intAvailUnitAshId ?>" disabled name= "btnSubmitCustomerAsh">Submit</button>
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
