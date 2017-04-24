<?php

require('../controller/connection.php');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SERVICE PURCHASE - REPORTS</title>
    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">


    <!-- Select2 -->
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
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
        $('#datatable-lot').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                text: 'PRINT',
                title: 'MEMORIAL LOT MANAGEMENT SYSTEM',
                message: 'LOT-UNIT SERVICE PURCHASE REPORT',
                footer: true,
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="../../pages/images/logo.png" style="postion:absolute; top:0;" />'
                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }]
        });
      });
    </script>
    <!-- Datatables -->
    <script>
      
      $(document).ready(function(){
        $('#datatable-ash').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                text: 'PRINT',
                title: 'MEMORIAL LOT MANAGEMENT SYSTEM',
                message: 'ASHCRYPT-UNIT SERVICE PURCHASE REPORT',
                footer: true,
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="../../pages/images/logo.png" style="postion:absolute; top:0;" />'
                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }]
        });
      });
    </script>
</head>

<body class="nav-sm">
    <div class="container body">
        <div class="main_container">
            <div class="main_container">
           <?php 
                    require('../menu/reports-sidemenu.php');
                    require('../menu/topnav.php');  
                ?>
                      
           
            
            <!-- page content -->
            <div class="right_col" role="main">
    
                <div class="col-md-12">
                    <div class="panel panel-success ">
                        <div class="panel-body">
                                        <!-- LOT -->
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <div class="panel panel-success ">
                                                    <div class="panel-heading">
                                                        <H1><b>LOT-UNIT SERVICE PURCHASE REPORT</b></H1>
                                                    </div><!-- /.panel-heading -->
                                                            
                                                    <div class="panel-body">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <form class="form-vertical" role="form" action = "service-request-report.php" method= "post">
																		<div class="row">
																			<div class="form-group">
																				<label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>
																				
																				<div class="col-md-3">
                                                                                    <label class="col-md-1" style = " font-size: 16px;" align="left" style="margin-top:.30em">FROM:</label>
                                                                                    <input type='date' class='form-control input-md' name="tfDateFromLot" required>
                                                                                </div>
																				
																				<div class="col-md-3">
                                                                                    <label class="col-md-1" style = " font-size: 16px;" align="left" style="margin-top:.30em">TO:</label>
                                                                                    <input type='date' class='form-control input-md' name="tfDateToLot" required>
                                                                                </div>
																				
																				<div class="col-md-4">
																					<button type="submit" class="btn btn-success pull-left" name= "btnGoLot">Go</button>
                                                                    </form>
                                                                    <form class="form-vertical" role="form" action = "service-request-report.php" method= "post">
                                                                                    <button type="submit" class="btn btn-default pull-left" name= "btnBackLot">ALL</button>
                                                                    </form>
																					
																				</div>
																			</div><!-- FORM GROUP -->
																		
																		</div><!-- ROW -->
																	
                                                                </div><!-- /.panel-heading -->
                                                                
                                                                <div class="panel-body"> 
                                                                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                                        <table id="datatable-lot" class="table table-striped table-bordered ">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Date</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Customer Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Lot-Unit</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Service Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Total Amount</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                            <?php
                                                                                if(isset($_POST['btnGoLot'])){
                                                                                    $tfDateFromLot = $_POST['tfDateFromLot'];
                                                                                    $tfDateToLot = $_POST['tfDateToLot'];
                                                                                    
                                                                                    $sql = "SELECT sr.dateRequested, sr.deciAmountPaid, c.strFirstName, c.strMiddleName, c.strLastName, s.strServiceName, l.strLotName, b.strBlockName, se.strSectionName
                                                                                            FROM tblservicerequested sr 
                                                                                            INNER JOIN tblcustomer c ON c.intCustomerId = sr.intCustomerId
                                                                                            INNER JOIN tblservice s ON s.intServiceID = sr.intServiceId
                                                                                            INNER JOIN tbllot l ON l.intLotID = sr.intUnitId
                                                                                            INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                                                                                            INNER JOIN tblsection se ON se.intSectionID = b.intSectionID WHERE sr.dateRequested BETWEEN '".$tfDateFromLot."' AND '".$tfDateToLot."'  ORDER BY sr.dateRequested ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $dateRequested              = $row['dateRequested'];
                                                                                        $strServiceName             = $row['strServiceName'];
                                                                                        $deciAmountPaid             = $row['deciAmountPaid'];
                                                                                        
                                                                                        $strFirstName               = $row['strFirstName'];
                                                                                        $strMiddleName              = $row['strMiddleName'];
                                                                                        $strLastName                = $row['strLastName'];
                                                                                        
                                                                                        $strLotName                 = $row['strLotName'];
                                                                                        $strBlockName               = $row['strBlockName'];
                                                                                        $strSectionName             = $row['strSectionName'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateRequested</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px;'>$strLotName || $strBlockName || $strSectionName</td>
                                                                                                <td style ='font-size:18px;'>$strServiceName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                }else if(isset($_POST['btnBackLot'])){
                                                                                    
                                                                                    $sql = "SELECT sr.dateRequested, sr.deciAmountPaid, c.strFirstName, c.strMiddleName, c.strLastName, s.strServiceName, l.strLotName, b.strBlockName, se.strSectionName
                                                                                            FROM tblservicerequested sr 
                                                                                            INNER JOIN tblcustomer c ON c.intCustomerId = sr.intCustomerId
                                                                                            INNER JOIN tblservice s ON s.intServiceID = sr.intServiceId
                                                                                            INNER JOIN tbllot l ON l.intLotID = sr.intUnitId
                                                                                            INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                                                                                            INNER JOIN tblsection se ON se.intSectionID = b.intSectionID ORDER BY sr.dateRequested ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $dateRequested              = $row['dateRequested'];
                                                                                        $strServiceName             = $row['strServiceName'];
                                                                                        $deciAmountPaid             = $row['deciAmountPaid'];
                                                                                        
                                                                                        $strFirstName               = $row['strFirstName'];
                                                                                        $strMiddleName              = $row['strMiddleName'];
                                                                                        $strLastName                = $row['strLastName'];
                                                                                        
                                                                                        $strLotName                 = $row['strLotName'];
                                                                                        $strBlockName               = $row['strBlockName'];
                                                                                        $strSectionName             = $row['strSectionName'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateRequested</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px;'>$strLotName || $strBlockName || $strSectionName</td>
                                                                                                <td style ='font-size:18px;'>$strServiceName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                }else{
                                                                                    
																					 $sql = "SELECT sr.dateRequested, sr.deciAmountPaid, c.strFirstName, c.strMiddleName, c.strLastName, s.strServiceName, l.strLotName, b.strBlockName, se.strSectionName
                                                                                            FROM tblservicerequested sr 
                                                                                            INNER JOIN tblcustomer c ON c.intCustomerId = sr.intCustomerId
                                                                                            INNER JOIN tblservice s ON s.intServiceID = sr.intServiceId
                                                                                            INNER JOIN tbllot l ON l.intLotID = sr.intUnitId
                                                                                            INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                                                                                            INNER JOIN tblsection se ON se.intSectionID = b.intSectionID ORDER BY sr.dateRequested ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $dateRequested              = $row['dateRequested'];
                                                                                        $deciAmountPaid             = $row['deciAmountPaid'];
                                                                                        $strServiceName             = $row['strServiceName'];
                                                                                        
                                                                                        $strFirstName               = $row['strFirstName'];
                                                                                        $strMiddleName              = $row['strMiddleName'];
                                                                                        $strLastName                = $row['strLastName'];
                                                                                        
                                                                                        $strLotName                 = $row['strLotName'];
                                                                                        $strBlockName               = $row['strBlockName'];
                                                                                        $strSectionName             = $row['strSectionName'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateRequested</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px;'>$strLotName || $strBlockName || $strSectionName</td>
                                                                                                <td style ='font-size:18px;'>$strServiceName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn);
                                                                                }//elseif
                                                                            ?>                                                                           
                                                                            </tbody>
                                                                            <tfoot>
                                                                            <?php
                                                                                if(isset($_POST['btnGoLot'])){
                                                                                    $tfDateFromLot = $_POST['tfDateFromLot'];
                                                                                    $tfDateToLot = $_POST['tfDateToLot'];
                                                                                    
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblservicerequested WHERE dateRequested >= '".$tfDateFromLot."' AND  dateRequested <= '".$tfDateToLot."'  ";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        
                                                                                       
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn);
                                                                                    
                                                                                    if(!empty($deciAmountPaid)){
                                                                                         echo '<tr>
                                                                                                <td></td>
                                                                                                <td></td><td></td><td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;">Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                
                                                                                            </tr>';
                                                                                    }//if 
                                                                                    
                                                                                }else if(isset($_POST['btnBackLot'])){
                                                                                    
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblservicerequested ";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        
                                                                                       
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                     if(!empty($deciAmountPaid)){
                                                                                         echo '<tr>
                                                                                                <td></td>
                                                                                                <td></td><td></td><td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;" >Total Php '.number_format($deciAmountPaid,2).' </td>
                                                                                                
                                                                                            </tr>';
                                                                                    }//if 
                                                                                    
                                                                                }else{
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblservicerequested ";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        
                                                                                       
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                     if(!empty($deciAmountPaid)){
                                                                                        
                                                                                        echo '<tr>
                                                                                                <td></td>
                                                                                                <td></td><td></td><td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;" >Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                
                                                                                            </tr>';
                                                                                       
                                                                                    }//if 
                                                                                }//else
                                                                            ?>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div><!-- /.table-responsive -->
                                                                </div><!--panel body -->
                                                            </div><!--panel panel-success-->
                                                        </div><!--col-md-8-->   
                                            
                                                    </div><!--panel body -->
                                                </div><!--panel panel-success-->
                                            </div><!--col-md-12-->
                                        </div><!--row-->

									
						</div><!--panel-body-->
					</div><!--panel-success-->
				</div><!--col-md-12-->
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
	<!-- iCheck -->
	<script src="../../vendors/iCheck/icheck.min.js"></script>

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
   
</body>
</html>