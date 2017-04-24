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

    <title>Collection-Reports</title>
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
                message: 'LOT-UNIT PURCHASE REPORT',
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
                message: 'ASHCRYPT-UNIT PURCHASE REPORT',
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
                            
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs left" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">LOT-UNIT</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">ASHCRYPT-UNIT</a>
                                    </li>  
                                </ul>
                
								<div id="myTabContent2" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

                                        <!-- LOT -->
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <div class="panel panel-success ">
                                                    <div class="panel-heading">
                                                        <H1><b>LOT-UNIT COLLECTION REPORT</b></H1>
                                                    </div><!-- /.panel-heading -->
                                                            
                                                    <div class="panel-body">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <form class="form-vertical" role="form" action = "installment-report.php" method= "post">
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
                                                                    <form class="form-vertical" role="form" action = "unit-purchase-report.php" method= "post">
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
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Amount Paid</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Remaining Balance</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                            <?php
                                                                                if(isset($_POST['btnGoLot'])){
                                                                                    $tfDateFromLot = $_POST['tfDateFromLot'];
                                                                                    $tfDateToLot = $_POST['tfDateToLot'];
                                                                                    
                                                                                    $sql = "SELECT c.intCollectionLotId, c.dateDate, c.deciAmountPaid, c.deciBalance, b.strFirstName, b.strLastName, b.strMiddleName FROM tblcollectionlot c
                                                                                                INNER JOIN tblavailunit a ON a.intAvailUnitId = c.intAvailUnitId
                                                                                                INNER JOIN tblcustomer b ON b.intCustomerId = a.intCustomerId WHERE c.dateDate BETWEEN '".$tfDateFromLot."' AND '".$tfDateToLot."' AND  a.intStatus='0' ORDER BY c.dateDate ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $intCollectionLotId =$row['intCollectionLotId'];
                                                                                        $dateDate =$row['dateDate'];
                                                                                        $strLastName =$row['strLastName'];
                                                                                        $strFirstName=$row['strFirstName'];
                                                                                        $strMiddleName=$row['strMiddleName'];
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        $deciBalance =$row['deciBalance'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateDate</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciBalance,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                }else if(isset($_POST['btnBackLot'])){
                                                                                    
                                                                                    $sql = "SELECT c.intCollectionLotId, c.dateDate, c.deciAmountPaid, c.deciBalance, b.strFirstName, b.strLastName, b.strMiddleName FROM tblcollectionlot c
                                                                                                INNER JOIN tblavailunit a ON a.intAvailUnitId = c.intAvailUnitId
                                                                                                INNER JOIN tblcustomer b ON b.intCustomerId = a.intCustomerId WHERE a.intStatus='0' ORDER BY c.dateDate ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $intCollectionLotId =$row['intCollectionLotId'];
                                                                                        $dateDate =$row['dateDate'];
                                                                                        $strLastName =$row['strLastName'];
                                                                                        $strFirstName=$row['strFirstName'];
                                                                                        $strMiddleName=$row['strMiddleName'];
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        $deciBalance =$row['deciBalance'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateDate</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciBalance,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                }else{
                                                                                    
																					 $sql = "SELECT c.intCollectionLotId, c.dateDate, c.deciAmountPaid, c.deciBalance, b.strFirstName, b.strLastName, b.strMiddleName FROM tblcollectionlot c
                                                                                                INNER JOIN tblavailunit a ON a.intAvailUnitId = c.intAvailUnitId
                                                                                                INNER JOIN tblcustomer b ON b.intCustomerId = a.intCustomerId WHERE a.intStatus='0' ORDER BY c.dateDate ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $intCollectionLotId =$row['intCollectionLotId'];
                                                                                        $dateDate =$row['dateDate'];
                                                                                        $strLastName =$row['strLastName'];
                                                                                        $strFirstName=$row['strFirstName'];
                                                                                        $strMiddleName=$row['strMiddleName'];
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        $deciBalance =$row['deciBalance'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateDate</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciBalance,2)."</td>
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
                                                                                    
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblcollectionlot WHERE dateDate >= '".$tfDateFromLot."' AND  dateDate <= '".$tfDateToLot."'  ";
                                                                                   
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
                                                                                                <td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;">Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                <td></td>
                                                                                            </tr>';
                                                                                    }//if 
                                                                                    
                                                                                }else if(isset($_POST['btnBackLot'])){
                                                                                    
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblcollectionlot ";
                                                                                   
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
                                                                                                <td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;" >Total Php '.number_format($deciAmountPaid,2).' </td>
                                                                                                <td></td>
                                                                                            </tr>';
                                                                                    }//if 
                                                                                    
                                                                                }else{
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblcollectionlot ";
                                                                                   
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
                                                                                                <td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;" >Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                <td></td>
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

									</div><!--tab-panel-->
					  
									<div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                                        
                                        <!-- ASH - CRYPT -->
										<div class = "row">
                                            <div class="col-md-12">
                                                <div class="panel panel-success ">
                                                    <div class="panel-heading">
                                                       <H1><b>ASHCRYPT-UNIT COLLECTION REPORT</b></H1>
                                                    </div><!-- /.panel-heading -->
                                                            
                                                    <div class="panel-body">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <form class="form-vertical" role="form" action = "unit-purchase-report.php" method= "post">
																		<div class="row">
																			<div class="form-group">
																				<label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>
																				
																				<div class="col-md-3">
                                                                                    <label class="col-md-1" style = " font-size: 16px;" align="left" style="margin-top:.30em">FROM:</label>
                                                                                    <input type='date' class='form-control input-md' name="tfDateFromAsh" required>
                                                                                </div>
																				
																				<div class="col-md-3">
                                                                                    <label class="col-md-1" style = " font-size: 16px;" align="left" style="margin-top:.30em">TO:</label>
                                                                                    <input type='date' class='form-control input-md' name="tfDateToAsh" required>
                                                                                </div>
																				
																				<div class="col-md-4">
																					<button type="submit" class="btn btn-success pull-left" name= "btnGoAsh">Go</button>
                                                                    </form>
                                                                    <form class="form-vertical" role="form" action = "unit-purchase-report.php" method= "post">
                                                                                    <button type="submit" class="btn btn-default pull-left" name= "btnBackAsh">ALL</button>
                                                                    </form>
																					
																				</div>
																			</div><!-- FORM GROUP -->
																		
																		</div><!-- ROW -->
																	
                                                                </div><!-- /.panel-heading -->
                                                                
                                                                <div class="panel-body"> 
                                                                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                                        <table id="datatable-ash" class="table table-striped table-bordered ">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Date</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Customer Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Amount Paid</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Remaining Balance</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                            <?php
                                                                                if(isset($_POST['btnGoLot'])){
                                                                                    $tfDateFromAsh = $_POST['tfDateFromAsh'];
                                                                                    $tfDateToLotAsh = $_POST['tfDateToLotAsh'];
                                                                                    
                                                                                    $sql = "SELECT c.intCollectionAshId, c.dateDate, c.deciAmountPaid, c.deciBalance, b.strFirstName, b.strLastName, b.strMiddleName FROM tblcollectionash c
                                                                                                INNER JOIN tblavailunitash a ON a.intAvailUnitAshId = c.intAvailUnitAshId
                                                                                                INNER JOIN tblcustomer b ON b.intCustomerId = a.intCustomerId WHERE c.dateDate BETWEEN '".$tfDateFromAsh."' AND '".$tfDateToLotAsh."' AND  a.intStatus='0' ORDER BY c.dateDate ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $intCollectionAshId =$row['intCollectionAshId'];
                                                                                        $dateDate =$row['dateDate'];
                                                                                        $strLastName =$row['strLastName'];
                                                                                        $strFirstName=$row['strFirstName'];
                                                                                        $strMiddleName=$row['strMiddleName'];
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        $deciBalance =$row['deciBalance'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateDate</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciBalance,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                }else if(isset($_POST['btnBackLot'])){
                                                                                    
                                                                                    $sql = "SELECT c.intCollectionAshId, c.dateDate, c.deciAmountPaid, c.deciBalance, b.strFirstName, b.strLastName, b.strMiddleName FROM tblcollectionash c
                                                                                                INNER JOIN tblavailunitash a ON a.intAvailUnitAshId = c.intAvailUnitAshId
                                                                                                INNER JOIN tblcustomer b ON b.intCustomerId = a.intCustomerId WHERE a.intStatus='0' ORDER BY c.dateDate ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $intCollectionAshId =$row['intCollectionAshId'];
                                                                                        $dateDate =$row['dateDate'];
                                                                                        $strLastName =$row['strLastName'];
                                                                                        $strFirstName=$row['strFirstName'];
                                                                                        $strMiddleName=$row['strMiddleName'];
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        $deciBalance =$row['deciBalance'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateDate</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciBalance,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn); 
                                                                                    
                                                                                }else{
                                                                                    
																					 $sql = "SELECT c.intCollectionAshId, c.dateDate, c.deciAmountPaid, c.deciBalance, b.strFirstName, b.strLastName, b.strMiddleName FROM tblcollectionash c
                                                                                                INNER JOIN tblavailunitash a ON a.intAvailUnitAshId = c.intAvailUnitAshId
                                                                                                INNER JOIN tblcustomer b ON b.intCustomerId = a.intCustomerId WHERE a.intStatus='0' ORDER BY c.dateDate ASC";
                                                                                   
                                                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn);

                                                                                    while($row = mysql_fetch_array($result)){ 
                                                                                        
                                                                                        $intCollectionAshId =$row['intCollectionAshId'];
                                                                                        $dateDate =$row['dateDate'];
                                                                                        $strLastName =$row['strLastName'];
                                                                                        $strFirstName=$row['strFirstName'];
                                                                                        $strMiddleName=$row['strMiddleName'];
                                                                                        $deciAmountPaid =$row['deciAmountPaid'];
                                                                                        $deciBalance =$row['deciBalance'];
                                                                                        
                                                                                        echo 
                                                                                            "<tr>
                                                                                                <td style ='font-size:18px;'>$dateDate</td>
                                                                                                <td style ='font-size:18px;'>$strLastName, $strFirstName $strMiddleName</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciAmountPaid,2)."</td>
                                                                                                <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciBalance,2)."</td>
																							</tr>";			
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    mysql_close($conn);
                                                                                }//elseif
                                                                            ?>                                
                                                                            
                                                                            </tbody>
                                                                            
                                                                            <tfoot>
                                                                            <?php
                                                                                if(isset($_POST['btnGoAsh'])){
                                                                                    $tfDateFromAsh = $_POST['tfDateFromAsh'];
                                                                                    $tfDateToAsh = $_POST['tfDateToAsh'];
                                                                                    
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblcollectionash WHERE dateDate >= '".$tfDateFromAsh."' AND  dateDate <= '".$tfDateToAsh."'  ";
                                                                                   
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
                                                                                                <td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;" >Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                <td></td>
                                                                                            </tr>';
                                                                                    }//if 
                                                                                    
                                                                                }else if(isset($_POST['btnBackLot'])){
                                                                                    
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblcollectionash ";
                                                                                   
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
                                                                                                <td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;">Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                <td></td>
                                                                                            </tr>';
                                                                                    }//if 
                                                                                    
                                                                                }else{
                                                                                    $sql = "SELECT SUM(deciAmountPaid) as deciAmountPaid FROM tblcollectionash ";
                                                                                   
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
                                                                                                <td></td>
                                                                                                <td class = "success" style = "text-align: center; font-size: 18px;" >Total Php '.number_format($deciAmountPaid,2).'</td>
                                                                                                <td></td>
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
										
									</div><!--/tabpanel-->
								</div><!--myTabContent2-->
							</div><!--tabpanel-->
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