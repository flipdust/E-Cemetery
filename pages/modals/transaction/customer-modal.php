<!----------------------------------------------Customer FORM---------------------------------->
<div class="modal fade" id="modalCust" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
    <div class="modal-dialog" role="document" style = "width:80%; height: 90%;">
        <div class="modal-content">
            <div class="modal-header" style='background:#b3ffb3;'>
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3><b>CUSTOMER FORM</b></h3></center>
            </div>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                
                         <div class="panel-body">
                            <form class="form-vertical" role="form" action="availUnit.php" method="POST">
                    
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            First Name:
                                            <input type="text" class="form-control input-md" name= "tfFirstName" placeholder="First Name" required>
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            Middle Name:
                                            <input type="text" class="form-control input-md" name= "tfMiddleName" placeholder="Middle Name" >
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Last Name:
                                            <input type="text" class="form-control input-md" name= "tfLastName" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div><!--ROW-->
                    
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Address:
                                            <input type="text" class="form-control input-md" name= "tfAddress" placeholder="Address" required>
                                        </div>

                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Contact No:
                                            <input type="text" class="form-control" required name= "tfContactNo" data-inputmask="'mask' : '(9999) 999-9999'">
                                        </div>
                        
                                        <div class="col-md-4" style="margin-top:.30em">
                                            <span style="color:red;">*</span>
                                            Date of Birth:
                                            <input type="date" class="form-control input-md" name= "tfDate" >
                                        </div>
                                    </div>
                                </div><!--ROW-->
                    
                                <div class="row">
                                    <div class="form-group">
                                    
                                        <div class="col-md-4" style="margin-top: 30px;">
                                            <span style="color:red;">*</span>
                                            Gender:
                                            <input type="radio"  align="right" class="flat form-control input-md" name="gender" value="0"> MALE
                                            <input type="radio" align="right" class="flat form-control input-md" name="gender"  value="1">FEMALE
                                        </div>
                                    
                                        <div class="col-md-4" style="margin-top:30px;">
                                            <span style="color:red;">*</span>
                                            Civil Status:
                                            <input type="radio"  align="right" class="flat form-control input-md" for="single"  name="civilStatus" value="0"> SINGLE
                                            <input type="radio" align="right" class="flat form-control input-md" for="married"  name="civilStatus" value="1"> MARRIED
                                            <input type="radio" align="right" class="flat form-control input-md" for="widow"   name="civilStatus" value="2"> WIDOW
                                        </div>
                                    </div>
                                </div><!--ROW-->
                                
                                <div class="modal-footer"> 
                            
                                    <button type="submit" class="btn btn-success" name= "btnSubmitCustomer">Submit</button>
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
