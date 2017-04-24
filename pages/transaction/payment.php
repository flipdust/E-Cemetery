
<?php
require ("../controller/connection.php");
require('../controller/trans-viewdata.php');
require('../controller/createdata.php');
require('../controller/updatedata.php');
require('../controller/deactivate.php');
require('../controller/archivedata.php');
require('../controller/retrieve.php');


if (isset($_POST['btnCollectDownpaymentLot'])){

    $tfAvailUnitId = $_POST['tfAvailUnitId'];
    $tfDate = $_POST['tfDate'];
    $tfAmountPaid = $_POST['tfAmountPaid'];
    $tfDownpayment = $_POST['tfDownpayment'];
    
    $dateCreated = date("Y-m-d", strtotime($tfDate));
    $tfDownpaymentFinal = preg_replace('/,/', '', $tfDownpayment);
    $tfAmountFinal = preg_replace('/,/', '', $tfAmountPaid);
    
    $change = $tfAmountFinal - $tfDownpaymentFinal;
                      
    if($tfAmountFinal >= $tfDownpaymentFinal){
    
        $createPayment =  new createPaymentLot();
        $createPayment->createDownpaymentLot($tfAvailUnitId,$dateCreated,$tfAmountFinal);
        
    }else{
        //echo "<script>alert('Insufficient Amount Paid!')</script>";
        $alertChange = new alerts();
        $alertChange -> alertChange();        
    }//else
}//if

if (isset($_POST['btnCollectDownpaymentAsh'])){

    $tfAvailUnitAshId = $_POST['tfAvailUnitAshId'];
    $tfDate = $_POST['tfDate'];
    $tfAmountPaid = $_POST['tfAmountPaid'];
    $tfDownpayment = $_POST['tfDownpayment'];
    
    $dateCreated = date("Y-m-d", strtotime($tfDate));
    $tfDownpaymentFinal = preg_replace('/,/', '', $tfDownpayment);
    $tfAmountFinal = preg_replace('/,/', '', $tfAmountPaid);
    
    $change = $tfAmountFinal - $tfDownpaymentFinal;
                      
    if($tfAmountFinal >= $tfDownpaymentFinal){
    
        $createPayment =  new createPaymentAsh();
        $createPayment->createDownpaymentAsh($tfAvailUnitAshId,$dateCreated,$tfAmountFinal);
        
    }else{
        //echo "<script>alert('Insufficient Amount Paid!')</script>";
        $alertChange = new alerts();
        $alertChange -> alertChange();        
    }//else
}//if


if (isset($_POST['btnCollectLot'])){

    $tfAvailUnitId = $_POST['tfAvailUnitId'];
    $tfDate = $_POST['tfDate'];
    $tfAmountPaid = $_POST['tfAmountPaid'];
    $tfBalance = $_POST['tfBalance'];
    $tfamortization = $_POST['tfamortization'];
    
    $dateCreated = date("Y-m-d", strtotime($tfDate));
    $tfBalanceFinal = preg_replace('/,/', '', $tfBalance);
    $tfAmountFinal = preg_replace('/,/', '', $tfAmountPaid);
    $tfamortizationFinal = preg_replace('/,/', '', $tfamortization);
    
    $updatedBalance = $tfBalanceFinal - $tfamortizationFinal;
    $change = $tfAmountFinal - $tfamortizationFinal;
    if($tfAmountFinal >= $tfamortizationFinal){
    
        $createPayment =  new createPaymentLot();
        $createPayment->createCollectionLot($tfAvailUnitId,$dateCreated,$tfAmountFinal,$updatedBalance);
        
    }else{
        //echo "<script>alert('Insufficient Amount Paid!')</script>";
        $alertChange = new alerts();
        $alertChange -> alertChange();        
    }//else
}//if

if (isset($_POST['btnCollectAsh'])){

    $tfAvailUnitAshId = $_POST['tfAvailUnitAshId'];
    $tfDate = $_POST['tfDate'];
    $tfAmountPaid = $_POST['tfAmountPaid'];
    $tfBalance = $_POST['tfBalance'];
    $tfamortization = $_POST['tfamortization'];
    
    $dateCreated = date("Y-m-d", strtotime($tfDate));
    $tfBalanceFinal = preg_replace('/,/', '', $tfBalance);
    $tfAmountFinal = preg_replace('/,/', '', $tfAmountPaid);
    $tfamortizationFinal = preg_replace('/,/', '', $tfamortization);
    
    $updatedBalance = $tfBalanceFinal - $tfamortizationFinal;
    $change = $tfAmountFinal - $tfamortizationFinal;
                      
    if($tfAmountFinal >= $tfamortizationFinal){
    
        $createPayment =  new createPaymentAsh();
        $createPayment->createCollectionAsh($tfAvailUnitAshId,$dateCreated,$tfAmountFinal,$updatedBalance);
        
    }else{
        //echo "<script>alert('Insufficient Amount Paid!')</script>";
        $alertChange = new alerts();
        $alertChange -> alertChange();        
    }//else
}//if
$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
//select grace
$sqlSelectGrace=mysql_query("SELECT * from tblbusinessdependency where intBusinessDependencyId='7'",$conn);
$rowSelectGrace=mysql_fetch_array($sqlSelectGrace);
$grace=$rowSelectGrace['deciBusinessDependencyValue'];

$now=date('Y-m-d');
// undo lot
$sqlUndo=mysql_query("SELECT * FROM tblavailunit WHERE datDueDate>='$now' AND intStatus=0 AND boolDownpaymentStatus=0 AND strModeOfPayment!='Spotcash' AND boolForfeitedNotice=1;",$conn);
$numUndo=mysql_num_rows($sqlUndo);
if($numUndo>0){
    while($rowUndo=mysql_fetch_array($sqlUndo)){
        $id=$rowUndo['intAvailUnitId'];
        mysql_query("UPDATE tblavailunit SET boolForfeitedNotice =NULL WHERE intAvailUnitId='$id'",$conn);
    }//while   
}//if
// undo ash
$sqlUndoAsh=mysql_query("SELECT * FROM tblavailunitash WHERE datDueDate>='$now' AND intStatus=0 AND boolDownpaymentStatus=0 AND strModeOfPayment!='Spotcash' AND boolForfeitedNotice=1;",$conn);
$numUndoAsh=mysql_num_rows($sqlUndoAsh);
if($numUndoAsh>0){
    while($rowUndoAsh=mysql_fetch_array($sqlUndoAsh)){
        $id=$rowUndoAsh['intAvailUnitAshId'];
        mysql_query("UPDATE tblavailunitash SET boolForfeitedNotice =NULL WHERE intAvailUnitAshId='$id'",$conn);
    }//while   
}//if

//change status LOT
$sql=mysql_query("SELECT * FROM tblavailunit WHERE DATEDIFF('$now',dateAvailUnit)>=5 AND intStatus=0 AND boolDownpaymentStatus=0 AND strModeOfPayment!='Spotcash';",$conn);
$num=mysql_num_rows($sql);
if($num>0){
    while($row=mysql_fetch_array($sql)){
        $id=$row['intAvailUnitId'];
        mysql_query("UPDATE tblavailunit SET boolForfeitedNotice=1 WHERE intAvailUnitId='$id'",$conn);
    }//while   
}//if


//change status ASH
$sqlAsh=mysql_query("SELECT * FROM tblavailunitash WHERE DATEDIFF('$now',dateAvailUnit)>=5 AND intStatus=0 AND boolDownpaymentStatus=0 AND strModeOfPayment!='Spotcash';",$conn);
$numAsh=mysql_num_rows($sqlAsh);
if($numAsh>0){
    while($rowASh=mysql_fetch_array($sqlAsh)){
        $id=$rowASh['intAvailUnitAshId'];
        mysql_query("UPDATE tblavailunitash SET boolForfeitedNotice=1 WHERE intAvailUnitAshId='$id'",$conn);
    }//while   
}//if

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MLMS-Payment</title>

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
    <script src="../../dist/sweetalert.min.js"></script> 
    <script src="../../dist/sweetalert.js"></script> 
    <script src="../../dev/sweetalert.es6.js"></script> 
    <link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#datatable-downpayment-lot').DataTable();
			$('#datatable-collection-lot').DataTable();
			
			$('#datatable-downpayment-ash').DataTable();
			$('#datatable-collection-ash').DataTable();

			$('#datatable-history-lot').DataTable();
			
		});
	</script>
    
    <script>
       $( document ).ready(function() {
			$('.tfAmountPaid').autoNumeric('init');
			
	   });
     
    </script>
	
</head>

<body class="nav-sm">
    <div class="container body">
        <div class="main_container">
            
			<?php 
				require('../menu/transac-sidemenu.php');
				require('../menu/topnav.php');  
            ?>
           
			
            <!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <H1><b>PAYMENT</b></H1>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                    
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#downpayment" role="tab" id="downpayment-tab" data-toggle="tab" aria-expanded="true">LOT-UNIT</a>
										</li>
                        
										<li role="presentation" class="">
											<a href="#collection" id="collection-tab" role="tab" data-toggle="tab" aria-expanded="false">ASHCRYPT-UNIT</a>
										</li>
									</ul>
									
									
									<div id="myTabContent" class="tab-content">
									
										<!--TAB FOR LOT-UNIT-->
										<div role="tabpanel" class="tab-pane fade active in" id="downpayment" aria-labelledby="downpayment-tab">
											<div class="panel-body">
                                                <div class="row">
                                                  
													<!-- DOWNPAYMENT-LOT -->
                                                    <div class="col-md-6">
                                                        <div class="panel panel-success">
                                                            <div class="panel-heading">
																<H3><b>DOWNPAYMENT</b></H3>
                                                            </div><!--panel-heading-->
															
                                                            <div class="panel-body">
                                                                <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
																	<table id="datatable-downpayment-lot" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
																		<thead>
																			<tr>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
																			</tr>
																		</thead>
																
																		<tbody>
                                                                            <?php
                                                                                $view = new downpayment();
																				$view->viewDownpaymentLot();
                                                                            ?>
																			
																		</tbody>
																	</table>
																</div><!-- /.table-responsive -->
                                                            </div><!--panel-body-->
                                                        </div><!--panel panel-succeess-->
													</div><!--col-md-6-->
													
													<!-- COLLECTION-LOT -->
													<div class="col-md-6">
														<div class="panel panel-success">
														
                                                            <div class="panel-heading">
                                                                 <H3><b>COLLECTION</b></H3>
                                                            </div><!--panel-heading-->
															
                                                            <div class="panel-body">
                                                                <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
																	<table id="datatable-collection-lot" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
																		<thead>
																			<tr>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
																			</tr>
																		</thead>
																
																		<tbody>
                                                                            <?php
                                                                                $view = new collection();
																				$view->viewCollectionLot();
                                                                            ?>
																		</tbody>
																	</table>
																</div><!-- /.table-responsive -->
															</div><!--panel-body-->
                                                        </div><!--panel panel-succeess-->
                                                    </div><!--col-md-6-->
													
                                                    
                                                </div><!--row-->
                                            </div><!--panel body -->
										</div><!--tabpanel--->
										
										<!-- TAB FOR ASHCRYPT-->
										<div role="tabpanel" class="tab-pane fade " id="collection" aria-labelledby="collection-tab">
											<div class="panel-body">
                                                <div class="row">
												
													<!-- DOWNPAYMENT-ASHCRYPT -->
                                                    <div class="col-md-6">
                                                        <div class="panel panel-success">
														
                                                            <div class="panel-heading">
																<H3><b>DOWNPAYMENT</b></H3>
                                                            </div><!--panel-heading-->
															
                                                            <div class="panel-body">
                                                                <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
																	<table id="datatable-downpayment-ash" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
																		<thead>
																			<tr>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
																			</tr>
																		</thead>
																
																		<tbody>
                                                                            <?php
                                                                                $view = new downpayment();
																				$view->viewDownpaymentAsh();
                                                                            ?>
																		</tbody>
																	</table>
																</div><!-- /.table-responsive -->
                                                            </div><!--panel-body-->
                                                        </div><!--panel panel-succeess-->
													</div><!--col-md-6-->
														
                                                        
													<!-- COLLECTION-ASHCRYPT-->
                                                    <div class="col-md-6">
														<div class="panel panel-success">
														
                                                            <div class="panel-heading">
																<H3><b>COLLECTION</b></H3>
                                                            </div><!--panel-heading-->
                                                            
															<div class="panel-body">
                                                                <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
																	<table id="datatable-collection-ash" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
																		<thead>
																			<tr>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
																				<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
																			</tr>
																		</thead>
																
																		<tbody>
																			<?php
                                                                                $view = new collection();
																				$view->viewCollectionAsh();
                                                                            ?>
																		</tbody>
																	</table>
																</div><!-- /.table-responsive -->
                                                            </div><!--panel-body-->
                                                        </div><!--panel panel-succeess--sive -->
                                                    </div><!--col-md-6-->
													
                                                    
                                                </div><!--row-->
                                            </div><!--panel body -->
										</div><!--tabpanel-collection-->
                        
									</div><!--tab-content -->
								</div><!--TAB-->
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
			</footer><!-- /footer content -->
		
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
    
	
 

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <?php


// require("../modals/viewDownpaymentModal.php");
// require("../modals/viewCollectionModal.php");


?>


 </body>
</html>