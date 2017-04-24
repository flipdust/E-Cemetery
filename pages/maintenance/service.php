<?php

require ("../controller/connection.php");
require('../controller/viewdata.php');
require('../controller/createdata.php');
require('../controller/updatedata.php');
require('../controller/deactivate.php');
require('../controller/archivedata.php');
require('../controller/retrieve.php');   



if (isset($_POST['btnSubmit'])){

    $tfServiceName = $_POST['tfServiceName'];
    $serviceType = $_POST['serviceType'];
    $tfServicePrice= $_POST['tfServicePrice'];
    $tfStatus=$_POST['tfStatus'];
    $checkRequirement=$_POST['checkRequirement'];
    
    $tfServicePriceFinal = preg_replace('/,/', '', $tfServicePrice);
    
    if($tfServicePriceFinal > 0 ){
        $createService =  new createService();
        $createService->Create($tfServiceName,$serviceType,$tfServicePriceFinal,$tfStatus,$checkRequirement);
    }else{
        echo "<script>alert('Invalid Input!')</script>";

    }//else

}//if
    
if (isset($_POST['btnSave'])){

    $tfServiceID = $_POST['tfServiceID'];
    $tfServiceName = $_POST['tfServiceName'];
    $serviceType = $_POST['serviceType'];
    $tfServicePrice = $_POST['tfServicePrice'];
    
    $tfServicePriceFinal = preg_replace('/,/', '', $tfServicePrice);
    
    $updateservice =  new updateService();
    $updateservice->update($tfServiceID,$serviceType,$tfServiceName,$tfServicePriceFinal);
}//if

if (isset($_POST['btnDeactivate'])){

    $tfServiceID = $_POST['tfServiceID'];
    
    $deactivateService =  new deactivateService();
    $deactivateService->deactivate($tfServiceID);
}//if

if (isset($_POST['btnArchive'])){

	$tfServiceID = $_POST['tfServiceID'];
	
	$archiveService =  new archiveService();
	$archiveService->archive($tfServiceID);
}//if

session_start();

if(isset($_SESSION['use'])){

    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Service Maintenance</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
	<script type="text/javascript" src="../../build/js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../../build/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../build/js/autoNumeric-min.js"></script>
	
	<!-- Datatables -->
	<script>
      $(document).ready(function(){
        $('#datatable-service').DataTable();
      });
    </script>
    <!-- /Datatables -->
	
	<script>
       $( document ).ready(function() {
			$('#tfServiceCreate').autoNumeric('init');
			$('.tfServiceUpdate').autoNumeric('init');
			
	   });
     
    </script>
	
	
    <script>
		function validateServiceName(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode == 8 || charCode == 32 || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)){
			return true;
			}else{
			return false;
			}
		}
        
    </script>
</head>

<body class="nav-sm"> 
    <div class="container body">
        <div class="main_container">
            <?php 
                require('../menu/maintenance-sidemenu.php');
                require('../menu/topnav.php');
                
			?>
            
			<!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H1><b>SERVICE</b></H2>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Create New</b></H3>
                                        </div><!-- /.panel-heading -->
                                    
                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" action = "service.php" method= "post">		
                                                <div class="form-group" >
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                                    </div>
                                                </div>
                                
                                                <div class="form-group">
                                                    <label class="col-md-5" style = "font-size: 18px;" align="right" style="margin-top:.30em">Service:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control input-md" name= "tfServiceName" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-5" style = "font-size: 18px;" align="right" style="margin-top:.30em">Service Type:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control input-md" name = "serviceType" required>
                                                            <option value="">Choose Service Type</option>
                                                                <?php
                                                                    $view = new service();
                                                                    $view->selectServiceType();
                                                                ?>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-7 pull-right">
                                                         <button type="button" class="btn btn-success" data-toggle = "modal" data-target="#addServiceType" title="Add Service Type">Add Service Type</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-5" style = "font-size: 18px;" align="right" style="margin-top:.30em">Requirement:</label>
                                                    <div class="col-md-7">
                                                        <div class="button-group">
                                                            <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown">
                                                                 Choose Requirement &nbsp<span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <?php
                                                                    $view = new service();
                                                                    $view->selectRequirement();
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
												<div class="form-group">
                                                    <label class="col-md-5" style = "font-size: 18px;" align="right" style="margin-top:.30em">Price:</label>
                                                    <div class="col-md-7"> 
                                                        <div class=" input-group">
                                                            <span class = "input-group-addon">Php</span>
                                                            <input type="text" class="form-control input-md" name= "tfServicePrice" id="tfServiceCreate" required/>
                                                        </div>
                                                    </div>
                                                </div>
                            					
                                                <h6 class="col-md-12" style = "color: red;" align="left" style="margin-top:.30em">ALL FIELDS ARE REQUIRED </h6>
												<div class="form-group modal-footer"> 
													<div class="col-md-12 col-md-offset-3">
														<button type="submit" class="btn btn-success col-md-4" name= "btnSubmit">Create</button>
														<input class = "btn btn-default col-md-5" type="reset" name = "btnClear" value = "Clear Entries">
													</div>
												</div>
                                                
											</form><!--Form-->
										</div><!-- panel body -->
									</div><!--panel panel-success-->
								</div><!--col-md-4 column-->

								<div class="col-md-8">
									<div class="panel panel-default">
											<div class="panel-heading">
												<form class="form-vertical" role="form" action = "service.php" method= "post">
												   <div class="form-group col-md-offset-4">
														<label class="col-md-4" style = "font-size: 18px;" align="right">Filter by:</label>
														<div class="col-md-5">
															<select class="form-control input-md" name = "filter" required>
																<option value="" selected disabled>--Choose your filter--</option>
                                                                <option value="0">Active</option>
																<option value="1">Inactive</option>
															</select>
														</div>
                                                        <button type="submit" class="btn btn-success col-md-2" name= "btnGo">Go</button>
													</div>
												
												</form>
											  </div><!-- /.panel-heading -->
											   
										<div class="panel-body">
											<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
												<table id="datatable-service" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
													<thead>
														<tr>
															
															<th class = "success" style = "text-align: center; font-size: 20px;">Service</th>
															<th class = "success" style = "text-align: center; font-size: 20px;">Service Type</th>
															<th class = "success" style = "text-align: center; font-size: 20px;">Price</th>
															<th class = "success" style = "text-align: center; font-size: 20px;">Requirement</th>
															<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
												
														</tr>
													</thead>
													
													<tbody>
														<?php
														
															if (isset($_POST['btnGo'])){
																$filter = $_POST['filter'];
													
																if($filter == 1){
																	$viewDeactivate = new deactivatedService();
																	$viewDeactivate->viewDeactivatedService();
																
																}else if($filter == 0){
																	$view = new service();
																	$view->viewService();
																}//else-if
															
															}else{
																$view1 = new service();
																$view1->viewService();
															}//else
														
														  
														?>
														
													</tbody>
												</table>
											</div><!-- /.table-responsive -->
										</div><!--panel body -->
									</div><!--panel panel-success-->
								</div><!--col-md-8-->   
                    
							</div><!--panel body -->
						</div><!--panel panel-success-->
					</div><!--col-md-12-->
				</div><!--row-->
			</div><!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					MLMS-Design 
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
        
		</div><!-- main_container -->
    </div><!-- container body -->

    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>
     <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
    
    <?php    
        require("../modals/maintenance/mainte-addServiceType.php");
    ?>
</body>
</html>

<?php
    }else{
?>
    <div align="center" style="margin-top: 15em">
        <p>You need to Login first before you proceed</p>
        <a href="../login.php">Go to Login Form</a>
    </div>
<?php
    }
?>
