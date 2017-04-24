<div class='modal fade' id='<?php echo"viewDownpaymentLot$intAvailUnitAshId";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style = 'width:80%; height: 90%;'>
        <div class='modal-content'>
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3>DOWNPAYMENT: <b><?php echo $strLastName,", $strFirstName $strMiddleName"; ?></b></h3></center>
            </div>

            <div class='modal-body'>
                <form class='form-horizontal' role='form' action='payment.php' method='POST'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class='panel panel-default'>
                                <div class='panel-body'>
                                    
                                    <input type='hidden'  name='tfAvailUnitAshId' value='<?php echo"$intAvailUnitAshId";?>'  readonly>
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Due Date:</label>
                                        <div class='col-md-5'>
                                            <input type='date' class='form-control input-md' name='tfDueDate' value='<?php echo "$datDueDate"; ?>' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Unit Name:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfUnitName' value='<?php echo $strUnitName;?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Mode of Payment:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfModeOfPayment' value='<?php echo"$strModeOfPayment";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Downpayment:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' id="monthlyi<?php echo $intAvailUnitAshId ?>" name='tfDownpayment' value='<?php  echo"".number_format($deciDownpayment,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class='col-md-6'>
                            <div class='panel panel-default'>
                                <div class='panel-body'>
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <?php $date = date('Y-m-d');?>
                                            <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' id="amounti<?php echo $intAvailUnitAshId; ?>" onkeyup="showChange('<?php echo $intAvailUnitAshId; ?>')" name='tfAmountPaid' required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group' id="changei<?php echo $intAvailUnitAshId;?>" style="display:none">
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Change:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' id="changeValuei<?php echo $intAvailUnitAshId; ?>" name='tfChange' readonly/>
                                            </div>
                                        </div>
                                      </div>


                                      <script>
                                            function showChange(num){
                                                var amountPaid = $('#amounti'+num).val();
                                                amountPaid = parseFloat(amountPaid.replace(/,/g, ''));

                                                var balance = $('#monthlyi'+num).val();
                                                balance = parseFloat(balance.replace(/,/g, ''));

                                                if(amountPaid>balance){
                                                    document.getElementById('changei'+num).style.display='block';
                                                    var change = parseFloat(amountPaid-balance);
                                                    change = Math.round(change * 100) / 100;
                                                    $('#changeValuei'+num).val(change);

                                                }else{
                                                    document.getElementById('changei'+num).style.display='none';
                                                    $('#changeValuei'+num).val(0);
                                                }   

                                            }
                                      </script>
                                    
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                            
                            <div class='form-group'>
                                        <div class="col-md-offset-8 col-md-8"> 
                                            <button type='submit' class='btn btn-success' name= 'btnCollectDownpaymentAsh'">Collect</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        </div>
                                    </div>
                        </div><!--col-md-6-->
                    </div><!--row-->
                </form>
            </div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade--> 
            