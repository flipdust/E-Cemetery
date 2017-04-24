<!--MANAGE UNIT-->  
<div class = 'modal fade' id = '<?php echo"unitmanagementLot$intLotID";?>'>
    <div class = 'modal-dialog' style = 'width:90%; height: 80%; '>
        <div class = 'modal-content'>

            <!--header-->
            <div class = 'modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3>LOT UNIT: <b><?php echo"$strSectionName-$strBlockName-$strLotName"; ?></b></h3></center>
            </div>

            <!--body (form)-->
            <div class = 'modal-body'>

                <div class='row'>
                    <div class=  'col-md-12'>
                        <div class='panel panel-default'>

                            <div class='panel-body'>
                                <form class='form-horizontal' role='form' action = 'unitmanagement-transaction.php' method= 'post'>
                                    <?php 
                                        $sql = "SELECT c.intCustomerId, c.strFirstName, c.strMiddleName, c.strLastName, a.dateAvailUnit, a.strModeOfPayment, a.deciAmountPaid FROM tblcustomer c
                                                INNER JOIN tblavailunit a ON a.intCustomerId = c.intCustomerId
                                                INNER JOIN tbllot l ON a.intLotID = l.intLotID WHERE a.intLotID = '$intLotID'";

                                        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                        mysql_select_db(constant('mydb'));
                                        $result = mysql_query($sql,$conn);
                                        


                                        while($row = mysql_fetch_array($result)){ 
                                            
                                        $strFirstName =$row['strFirstName'];
                                        $strMiddleName =$row['strMiddleName'];
                                        $strLastName =$row['strLastName'];
                                                    
                                        }//while($row = mysql_fetch_array($result))
                                        mysql_close($conn);         
        
                                    ?>             
                                    <legend><h3>Owner Name:<?php echo"$strLastName, $strFirstName $strMiddleName"; ?></h3></legend>
</form>

                                    <div class='' role='tabpanel' data-example-id='togglable-tabs'>
                                        <ul id='myTab' class='nav nav-tabs bar_tabs' role='tablist'>
                                            <li role='presentation' class='active'>
                                                <a href='#ListDead' id='addDead-tab' role='tab' data-toggle='tab' aria-expanded='true'>LIST OF DECEASED</a>
                                            </li>
                                            <li role='presentation' class=''>
                                                <a href='#addDead' id='addDead-tab' role='tab' data-toggle='tab' aria-expanded='false'>ADD DECEASED</a>
                                            </li>
                                            <li role='presentation' class=''>
                                                <a href='#transferDead' role='tab' id=transferDead-tab' data-toggle='tab' aria-expanded='false'>TRANSFER DECEASED</a>
                                            </li>
                                            <li role='presentation' class=''>
                                                <a href='#transferOwn' role='tab' id='transferOwn-tab2' data-toggle='tab' aria-expanded='false'>TRANFER OWNERSHIP</a>
                                            </li>
                                        </ul>
                                        
                                        <!--LIST OF DECEASED-->
                                        <div id='myTabContent' class='tab-content'>
                                            <div role='tabpanel' class='tab-pane fade active in' id='ListDead' aria-labelledby='home-tab'>

                                                <table id='datatable-deaceased' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
                                                    <thead>
                                                        <tr>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Deceased Name</th>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Birthdate</th>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Date Died</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>Boom Panis</td>
                                                            <td>03/2/1932</td>
                                                            <td>03/2/2016</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!--tab-panel-->
                                            
                                            <!--ADD DECEASED-->
                                            <div role='tabpanel' class='tab-pane fade' id='addDead' aria-labelledby='home-tab'>
                                                <div class='row'>
                                                    <form class='form-vertical' role='form' action='unitmanagement-transaction.php' method='POST'>
                                                        <div class='col-md-6'>
                                                            <div class='panel panel-default'>
                                                                <div class='panel-heading'>
                                                                    <h2><strong>DECEASED DETAILS</strong></h2>
                                                                </div>

                                                                <div class='panel-body'>
                                                                    <div class='row'>
                                                                        <div class='col-md-6'>
                                                                            Relationship to Owner
                                                                            <input type='text' class='form-control input-md' name= 'tfRelationOwner' required>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class='row'>
                                                                        <div class='col-md-4' style='margin-top:.30em'>
                                                                            First Name:
                                                                            <input type='text' class='form-control input-md' name= 'tfFirstName' placeholder='First Name' required>
                                                                        </div>

                                                                        <div class='col-md-4' style='margin-top:.30em'>
                                                                            Middle Name:
                                                                            <input type='text' class='form-control input-md' name= 'tfMiddleName' placeholder='Middle Name' >
                                                                        </div>

                                                                        <div class='col-md-4' style='margin-top:.30em'>
                                                                            Last Name:
                                                                            <input type='text' class='form-control input-md' name= 'tfLastName' placeholder='Last Name' required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class='row'>
                                                                        <div class='col-md-4' style='margin-top: 30px;'>
                                                                            Gender:
                                                                            <input type='radio'  align='right' class='flat form-control input-md' name='iCheck'> M
                                                                            <input type='radio' align='right' class='flat form-control input-md' name='iCheck'>F
                                                                        </div>

                                                                        <div class='col-md-4' style='margin-top:.30em'>
                                                                            Date of Birth:
                                                                            <input type='date' class='form-control input-md' name= 'tfDate' >
                                                                        </div>

                                                                        <div class='col-md-4' style='margin-top:.30em'>
                                                                            Date Died:
                                                                            <input type='date' class='form-control input-md' name= 'tfDate' >
                                                                        </div>

                                                                    </div>
                                                                        
                                                                </div><!--panel-body-->
                                                            </div><!--panel panel-default-->
                                                        </div><!--col-md-6-->
                                                        
                                                        <div class='col-md-6'>
                                                            <div class='panel-body'>
                                                                <div class='form-group'>
                                                                    <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Total Amount to Pay:</label>
                                                                    <div class='col-md-5'>
                                                                        <div class=' input-group'>
                                                                            <span class = 'input-group-addon'>₱</span>
                                                                            <input type='text' class='form-control input-md' align='left' name= 'tfSellingPrice' id='tfPriceCreate' onkeypress='return validateNumber(event)' readonly/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class='form-group'>
                                                                    <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Amount Paid:</label>
                                                                    <div class='col-md-5'>
                                                                        <div class=' input-group'>
                                                                            <span class = 'input-group-addon'>₱</span>
                                                                            <input type='text' class='form-control input-md' align='left' name= 'tfSellingPrice' id='tfPriceCreate' onkeypress='return validateNumber(event)' required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class='form-group'>
                                                                    <div class='col-md-9 col-sm-9 col-xs-12 col-md-offset-3'>
                                                                        <button type='close' class='btn btn-primary'>Cancel</button>
                                                                        <button type='submit' class='btn btn-success'>Submit</button>
                                                                    </div>
                                                                </div>      


                                                            </div><!--panel-body-->
                                                        </div><!--col-md-6-->
                                                        
                                                        
                                                    </form>
                                                </div><!--row-->
                                                        
                                        </div><!--end tab 2-->

                                        <!--TRANSFER DECEASED-->
                                        <div role='tabpanel' class='tab-pane fade' id='transferDead' aria-labelledby='profile-tab'>

                                            <div class='form-group'>
                                                <label class='col-md-2' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Filter by:</label>

                                                <div class='col-md-3'>
                                                    <select class='form-control' name = 'filter1'>
                                                        <option value='' selected disabled> --Choose Block (Section)--</option>

                                                    </select>
                                                </div>

                                                <div class='col-md-3'>
                                                    <select class='form-control' name = 'filter2'>
                                                        <option value='' selected disabled> --Choose Lot Status--</option>
                                                        <option value='0'> Available</option>
                                                        <option value='1'> Reserve</option>
                                                        <option value='2'> Owned</option>
                                                        <option value='3'> At-Need</option>

                                                    </select>
                                                </div>

                                                <div class='col-md-4'>
                                                    <button type='submit' class='btn btn-success pull-left' name= 'btnGo'>Go</button>
                                                    <button type='submit' class='btn btn-default pull-left' name= 'btnBack'>ALL</button>

                                                </div>
                                            </div><!-- FORM GROUP -->

                                            <div class='table-responsive col-md-12 col-lg-12 col-xs-12'>
                                                <table id='datatable-transfer' class='table table-striped table-bordered '>
                                                    <thead>
                                                        <tr>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Lot Name</th>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Block</th>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Lot Type</th>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Section Name</th>
                                                            <th class = 'success' style = 'text-align: center; font-size: 18px;'>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>A0002</td>
                                                            <td>B</td>
                                                            <td>Lawn</td>
                                                            <td>West</td>
                                                            <td><button data-toggle ='modal' data-target='#TranDeadModal'>TRANSFER</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                        </div><!--end tab 3-->
                                        
                                        <!--TRANSFER OWNERSHIP-->
                                        <div role='tabpanel' class='tab-pane fade' id='transferOwn' aria-labelledby='profile-tab'>
                                            <div class=col-md-12>
                                                <button type='button' data-target='#modalCust' data-toggle='modal' class='btn btn-success pull-left' name= 'btnAdd'>New Customer</button>

                                                <select class='form-control' name = 'selectCustomer' required>
                                                    <option value=''selected disabled> --Choose Customer--</option>
                                                    <?php
                                                    $sql1 =  ' select * from dbholygarden.tblcustomer ORDER BY strLastName ASC';
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

                                            <div class='panel-body'>
                                                <form class='form-vertical' role='form' action='' method='POST'>

                                                    <div class='form-group'>
                                                        <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Total Amount to Pay:</label>
                                                        <div class='col-md-5'>
                                                            <div class=' input-group'>
                                                                <span class = 'input-group-addon'>₱</span>
                                                                <input type='text' class='form-control input-md' align='left' name= 'tfSellingPrice' id='tfPriceCreate' onkeypress='return validateNumber(event)' readonly/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class='form-group'>
                                                        <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Amount Paid:</label>
                                                        <div class='col-md-5'>
                                                            <div class=' input-group'>
                                                                <span class = 'input-group-addon'>₱</span>
                                                                <input type='text' class='form-control input-md' align='left' name= 'tfSellingPrice' id='tfPriceCreate' onkeypress='return validateNumber(event)' required/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class='form-group'>
                                                        <div class='col-md-9 col-sm-9 col-xs-12 col-md-offset-3'>
                                                            <button type='close' class='btn btn-primary'>Cancel</button>
                                                            <button type='submit' class='btn btn-success'>Submit</button>
                                                        </div>
                                                    </div>

                                            </form>
                                        </div>
                                    </div>

                                </div><!--end tab 4-->
                            </div> <!--/tab content-->
                        </div>
                    </div><!--PANEL BODY-->
                </div>
            </div><!--/modal-body -->
        </div><!--/modal-content -->
    </div>
</div>
</div><!--/modal-dialog -->
</div><!--/modal -->


<div class = 'modal fade' id = 'TranDeadModal'>
    <div class = 'modal-dialog' style = 'width:60%; height: 60%; '>
        <div class = 'modal-content'>

        <!--header-->
        <div class = 'modal-header' style='background:#b3ffb3;'>
            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
            <center><h3 class = 'modal-title'>List Of Deceased</h3></center>
        </div>

        <!--body (form)-->
        <div class = 'modal-body'>

            <table id='datatable-checkbox' class='table table-striped table-bordered bulk_action'>
                <thead>
                    <tr>
                        <th class = 'success' style = 'text-align: center; font-size: 18px;'>Deceased Name</th>
                        <th class = 'success' style = 'text-align: center; font-size: 18px;'>Birthdate</th>
                        <th class = 'success' style = 'text-align: center; font-size: 18px;'>Date Died</th>
                        <th class = 'success' style = 'text-align: center; font-size: 18px;'>Action</th>

                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>Boom Panis</td>
                        <td>03/12/1952</td>
                        <td>09/28/2016</td>
                        <td><button data-toggle='modal' data-target='#transferCharge' >Transfer</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>



<div class = 'modal fade' id = 'transferCharge'>
    <div class = 'modal-dialog' style = 'width:50%; height: 50%; '>
        <div class = 'modal-content'>

            <!--header-->
            <div class = 'modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3 class = 'modal-title'>Payment</h3></center>
            </div>

            <!--body (form)-->
            <div class = 'modal-body'>

                <div class='form-group'>
                    <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Total Amount to Pay:</label>
                    <div class='col-md-5'>
                        <div class=' input-group'>
                            <span class = 'input-group-addon'>₱</span>
                            <input type='text' class='form-control input-md' align='left' name= 'tfSellingPrice' id='tfPriceCreate' onkeypress='return validateNumber(event)' readonly/>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='col-md-7' style = 'font-size: 18px;'  style='margin-top:.30em'>Amount Paid:</label>
                    <div class='col-md-5'>
                        <div class=' input-group'>
                            <span class = 'input-group-addon'>₱</span>
                            <input type='text' class='form-control input-md' align='left' name= 'tfSellingPrice' id='tfPriceCreate' onkeypress='return validateNumber(event)' required/>
                        </div>
                    </div>
                </div>

                <div class='modal-footer'>
                    <div class='pull-right'>
                        <button type='close' class='btn btn-primary'>Cancel</button>
                        <button type='submit' class='btn btn-success' data>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
