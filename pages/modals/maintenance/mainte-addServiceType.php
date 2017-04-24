<?php

if (isset($_POST['btnCreate'])){

    $tfServiceTypeName = $_POST['tfServiceTypeName'];
    $tfServiceTypeDesc = $_POST['tfServiceTypeDesc'];
   
    $createServiceType =  new createServiceType();
    $createServiceType->Create($tfServiceTypeName,$tfServiceTypeDesc);
}//if

?>

<div class = "modal fade" id = "addServiceType">
    <div class = "modal-dialog" style = "width: 40%;">
        <div class = "modal-content">
            
            <!--header-->
            <div class = "modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><H3><b>Add Service Type</b></H3></center>
            </div>
            
            <!--body (form)-->
            <div class = "modal-body">
                <form class="form-horizontal" role="form" action = "service.php" method= "POST">						  
                    
                    
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-4" align="right" style = "font-size: 18px; margin-top:.30em;">Name:</label>
                            <div class="col-md-7">
                                <input type="text "class="form-control input-md" name= "tfServiceTypeName"  onkeypress="return validateServiceName(event)" required/>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div class="row">
                        <div class="form-group">
                            <label class="col-md-4" align="right" style = "font-size: 18px; margin-top:.30em;">Description:</label>
                            <div class="col-md-7">
                                <input type="text "class="form-control input-md" name= "tfServiceTypeDesc"  onkeypress="return validateServiceName(event)" />
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="form-group modal-footer"> 
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success" name= "btnCreate">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div><!--modal-body-->
        </div><!--modal-content-->
    </div><!--modal-dialog-->
</div><!--modal-fade-->
