<div class='modal fade' id='<?php echo"viewCollectionLot$intAvailUnitId";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style = 'width:80%; height: 90%;'>
        <div class='modal-content'>
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3>COLLECTION: <b><?php echo $strLastName,", $strFirstName $strMiddleName"; ?></b></h3></center>
            </div>
            <?php error_reporting(0);?>
            <div class='modal-body'>
                <form class='form-horizontal' role='form' action='payment.php' method='POST'>
                    <div class='container-fluid'>
                        <div class='col-xs-6'>
                            <div class='panel panel-default'>
                                <div class='panel-body'>
                                    
                                    <input type='hidden'  name='tfAvailUnitId' value='<?php echo"$intAvailUnitId";?>'  readonly>
                                    
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Lot Name:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfLotName' value='<?php echo"$strLotName";?>'  readonly>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Mode of Payment:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfModeOfPayment' value='<?php echo"$strModeOfPayment";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Remaining Balance:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfBalance' value='<?php  echo"".number_format($deciBalance,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Years to pay:</label>
                                        <div class='col-md-5'>
                                            <input type='number' class='form-control input-md' name='tfNoOfYear' value='<?php echo"$intNoOfYear";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        if($strModeOfPayment=='Reserve'){ ?> 
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Interest Rate:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                               <input type='text' class='form-control input-md' name='tfInterestRate' value='<?php  echo"$deciRegularInterest";?>' readonly/>
                                               <span class = 'input-group-addon'>%</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                        <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Interest Rate:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                               <input type='text' class='form-control input-md' name='tfInterestRate' value='<?php  echo"$deciAtNeedInterest";?>' readonly/>
                                               <span class = 'input-group-addon'>%</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <?php }//else ?>
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Monthly Amortization:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <?php
                                                    if($strModeOfPayment == 'Reserve') {
                                                        $interest = $deciRegularInterest/100;
                                                    
                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                    	
                                                    }else{
                                                        $interest = $deciAtNeedInterest/100;
                                                    
                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                    	
                                                    }//else
                                                     
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfamortization' value='<?php  echo"".number_format($amortization,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class='col-xs-6'>
                            <div class='panel panel-default'>
                                <div class='panel-body'>
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <?php 
                                                $sqlCollection="SELECT * FROM tblcollectionlot where intAvaiUnitId='$intAvailUnitId'";
                                                $resultCollection=mysql_query($sqlCollection);
                                                $num=mysql_num_rows($resultCollection);
                                                if($num>0){
                                                    $rowCollection=mysql_fetch_array($resultCollection);
                                                    $dateDate = $rowCollection['dateDate'];
                                                }else{

                                                    $sqlDate="SELECT * FROM tbldownpaymentlot where intAvaiUnitId='$intAvailUnitId'";
                                                    $resultDate=mysql_query($sqlDate);
                                                    $rowDate=mysql_fetch_array($resultDate);
                                                    $dateDate = $rowDate['dateDate'];
                                                }
                                                
                                                $date = date('Y-m-d', strtotime($dateDate. " + 1 months"));
                                            ?>
                                            <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                        </div>
                                    </div>
                                    
                                     <?php 
                                                $sqlCollection="SELECT * FROM tblcollectionlot where intAvaiUnitId='$intAvailUnitId'";
                                                $resultCollection=mysql_query($sqlCollection);
                                                $num=mysql_num_rows($resultCollection);
                                                if($num>0){
                                                    $rowCollection=mysql_fetch_array($resultCollection);
                                                    $dateDate = $rowCollection['dateDate'];
                                                }else{

                                                    $sqlDate="SELECT * FROM tbldownpaymentlot where intAvaiUnitId='$intAvailUnitId'";
                                                    $resultDate=mysql_query($sqlDate);
                                                    $rowDate=mysql_fetch_array($resultDate);
                                                    $dateDate = $rowDate['dateDate'];
                                                }
                                                $currentDate=date('Y-m-d');

                                                //compute balance
                                                $ts1 = strtotime($dateDate);
                                                $ts2 = strtotime($currentDate);

                                                $year1 = date('Y', $ts1);
                                                $year2 = date('Y', $ts2);

                                                $month1 = date('m', $ts1);
                                                $month2 = date('m', $ts2);
                                                $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

                                                if($diff>=2){
                                                    ?>
                                     <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Penalty: </label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <?php 
                                                 if($strModeOfPayment == 'Reserve') {
                                                        $interest = $deciRegularInterest/100;
                                                    
                                                    }else{
                                                        $interest = $deciAtNeedInterest/100;
                                                        
                                                    }//else

                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                  
                                                    $sqlPenalty = "SELECT * FROM tblbusinessdependency where intBusinessDependencyId='5'";
                                                    $resultPenalty = mysql_query($sqlPenalty);
                                                    $rowPenalty = mysql_fetch_array($resultPenalty);
                                                    $penalty = $rowPenalty['deciBusinessDependencyValue'];
                                                    $penalty = $penalty / 100;

                                                    $computedPenalty = ($amortization*$penalty)*$diff;   
                                                    $totalAmount = $computedPenalty+$amortization;
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' value='<?php  echo"".number_format($computedPenalty,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Total Amount To Be Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' id="monthly<?php echo $intAvailUnitId ?>" name="tfAmountPaid"  value="<?php echo number_format($totalAmount,2); ?>" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                                    <?php
                                                }else{

                                                    if($strModeOfPayment == 'Reserve') {
                                                        $interest = $deciRegularInterest/100;
                                                    
                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                        
                                                    }else{
                                                        $interest = $deciAtNeedInterest/100;
                                                    
                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                        
                                                    }//else
                                                     
                                                    ?>

                                                <div class='form-group'>
                                                    <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Total Amount To Be Paid:</label>
                                                    <div class='col-md-5'>
                                                        <div class=' input-group'>
                                                            <span class = 'input-group-addon'>₱</span>
                                                            <input type='text' class='form-control input-md tfAmountPaid' id="monthly<?php echo $intAvailUnitId ?>" name="tfAmountPaid" value="<?php echo number_format($amortization,2); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <?php
                                                }
                                            ?>

                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' id="amount<?php echo $intAvailUnitId; ?>" onkeyup="showChange2('<?php echo $intAvailUnitId; ?>')" name='' required/>
                                            </div>
                                        </div>
                                    </div>

                                     <div class='form-group' id="change<?php echo $intAvailUnitId;?>" style="display:none">
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Change:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' id="changeValue<?php echo $intAvailUnitId; ?>" name='' readonly/>
                                            </div>
                                        </div>
                                      </div>
                                      <script>
                                            function showChange2(num){
                                                var amountPaid = $('#amount'+num).val();
                                                amountPaid = parseFloat(amountPaid.replace(/,/g, ''));

                                                var balance = $('#monthly'+num).val();
                                                balance = parseFloat(balance.replace(/,/g, ''));


                                                if(amountPaid > balance){
                                                    document.getElementById('change'+num).style.display='block';
                                                    var change = parseFloat(amountPaid-balance);
                                                    change = Math.round(change * 100) / 100;
                                                    $('#changeValue'+num).val(change);

                                                    $('#btnCollectLot'+num).prop('disabled',false);
                                                }else if(amountPaid < balance || amountPaid <= 0){
                                                    $('#btnCollectLot'+num).prop('disabled',true);
                                                }else{
                                                    document.getElementById('change'+num).style.display='none';
                                                    $('#changeValue'+num).val(0);
                                                    $('#btnCollectLot'+num).prop('disabled',false);
                                                }   

                                            }
                                      </script>
                                    
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                            
                            <div class='form-group'>
                                <div class="col-md-offset-8 col-md-8"> 
                                    <button type='submit' class='btn btn-success' name= 'btnCollectLot' id="btnCollectLot<?php echo $intAvailUnitId ?>" disabled>Collect</button>
                                    <!--<button type='submit' class='btn btn-success' name= 'btnCollectLot' >Collect</button>-->
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
            

<div class='modal fade' id='<?php echo"viewCollectionHistoryLot$intAvailUnitId";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style="width:40%; height: 90%; overflow:auto;">
        <div class='modal-content' align="center">
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3>HISTORY: <b><?php echo $strLastName,", $strFirstName $strMiddleName"; ?></b></h3></center>
            </div>

            <div class='modal-body'>
                            <div class="container-fluid" >
                                <div class="col-xs-6">
                                    <div class='form-group'>
                                     <label class='control-label col-xs-12'>DATE PAID</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class='form-group'>
                                     <label class='control-label col-xs-12'>AMOUNT PAID</label>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                
                                $result2 =mysql_query("SELECT * FROM tblcollectionlot where intAvailUnitId='$intAvailUnitId'");
                                $num2= mysql_num_rows($result2);
                                if($num2>0){
                                    while($row2=mysql_fetch_array($result2)){
                                        $date=$row2['dateDate'];
                                        $deciAmountPaid=$row2['deciAmountPaid'];
                                        ?>
                                        <div class="container-fluid">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center" value="<?php echo $date ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center" value="<?php echo $deciAmountPaid ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <div class="container-fluid">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" value="NO PAYMENT HISTORY" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }


                            ?>
            </div><!--modal-body-->

          <div class='modal-footer'>
               <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
          </div>
        </div><!--modal-content-->
    </div><!--modal-dialog-->
</div><!--modal-fade--> 
            