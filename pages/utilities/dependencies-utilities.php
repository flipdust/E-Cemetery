<?php
require ("../controller/connection.php");
require('../controller/alert.php');

require ("../controller/utilities-update.php");


if (isset($_POST['btnSave'])){


        for($id=1;$id<=10;$id++) {
		$deciBusinessDependencyValue = $_POST[$id];
		
		
        
        $deciBusinessDependencyValue = str_replace(",","",$deciBusinessDependencyValue);
		
       
		$updateDependencies =  new updateDependencies();
		$updateDependencies->update($deciBusinessDependencyValue, $id);
        
        }
        //echo "<script>alert('Succesfully updated!')</script>";
        $alertDepend = new alerts();
        $alertDepend -> alertUpdate();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Business Dependency- Utilities</title>

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
     
     <script>
         $( document ).ready(function() {
            $('#downpayment').autoNumeric('init');  
            $('#reservation').autoNumeric('init');  
            $('#discount').autoNumeric('init');  
            $('#refund').autoNumeric('init');  
            $('#penalty').autoNumeric('init');  
            $('#charge').autoNumeric('init');  
            $('#gracePeriod').autoNumeric('init');  
            $('#reservationNoDown').autoNumeric('init');  
            $('#reservationNotFull').autoNumeric('init');  
            $('#overdue').autoNumeric('init');  
        });
     </script>
    

</head>

<body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <?php 
             require('../menu/utilities-sidemenu.php');
             require('../menu/topnav.php');
        ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12">
                <div class="panel panel-success ">
                    <div class="panel-heading" style="text-align: center;" ><h1><b>Business Dependencies</b></h1></div>
                        <div class="panel-body">

                             <div class="col-md-12">
                                <div class="panel panel-success ">
                                    <div class="panel-body">
                                        
                                        <form class="form-vertical" role="form" action = "dependencies-utilities.php" method= "post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Downpayment:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">
                                                        
                                                            <?php
                                                                $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='1'";
                                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result = mysql_query($sql,$conn);
                                                                $row = mysql_fetch_array($result);
                                                                $downpayment = $row['deciBusinessDependencyValue'];
                                                             
                                                            ?>		

                                                          <input type='text' id="downpayment" class='form-control input-md' name=<?php echo"1";?> value="<?php echo"$downpayment";?>"  required>
                                                          <span class = "input-group-addon">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Reservation Fee:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">
                                                            <span class = "input-group-addon">₱</span>

                                                            <?php
                                                                $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='2'";
                                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result = mysql_query($sql,$conn);
                                                                $row = mysql_fetch_array($result);
                                                                $reservationFee = $row['deciBusinessDependencyValue'];
                                                                
                                                            ?>
                                                        
                                                            <input type="text" id="reservation" class="form-control input-md"  name= "<?php echo"2";?>" value="<?php echo"$reservationFee";?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4" align="right" style="margin-top:.30em">Discounted Price for SpotCash:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">

                                                            <?php
                                                                $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='3'";
                                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result = mysql_query($sql,$conn);
                                                                $row = mysql_fetch_array($result);
                                                                $discountSpotcash = $row['deciBusinessDependencyValue'];
                                                            
                                                            ?>
                                                  
                                                            <input type="text" id="discount" class="form-control input-md" name=<?php echo"3";?> value="<?php echo"$discountSpotcash";?>"  required>
                                                            <span class = "input-group-addon">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Refund for cancelation of Reservation:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">

                                                            <?php
                                                                $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='4'";
                                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result = mysql_query($sql,$conn);
                                                                $row = mysql_fetch_array($result);
                                                                $refund = $row['deciBusinessDependencyValue'];
                                                            
                                                            ?>
                                                            <input type="text" id="refund" class="form-control input-md" name=<?php echo"4";?> value="<?php echo"$refund";?>" required>
                                                            <span class = "input-group-addon">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                                
                                             <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Penalty:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">

                                                            <?php
                                                                $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='5'";
                                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result = mysql_query($sql,$conn);
                                                                $row = mysql_fetch_array($result);
                                                                $penalty = $row['deciBusinessDependencyValue'];
                                                            
                                                            ?>
                                                            <input type="text" id="penalty" class="form-control input-md"  name=<?php echo"5";?> value="<?php echo"$penalty";?>" required>
                                                            <span class = "input-group-addon">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Charge for Transfering ownership:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">
                                                            <span class = "input-group-addon">₱</span>

                                                            <?php
                                                                $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='6'";
                                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result = mysql_query($sql,$conn);
                                                                $row = mysql_fetch_array($result);
                                                                $charge = $row['deciBusinessDependencyValue'];
                                                            
                                                            ?>
                                                            <input type="text" id="charge" class="form-control input-md"  name=<?php echo"6";?> value="<?php echo"$charge";?>"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Grace Period days:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">

                                                         <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='7'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $gracePeriod = $row['deciBusinessDependencyValue'];

                                                         
                                                            $fResult = round($gracePeriod,0); // double(123)

                                                            
                                                        

                                                        ?>
                                                        <input type="text" id="gracePeriod" class="form-control input-md" name=<?php echo"7";?> value="<?php echo"$fResult";?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='8'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $reservationNoDown = $row['deciBusinessDependencyValue'];
                                                            $qResult = round ($reservationNoDown, 0);
                                                        
                                                        ?>
                                                        <input type="hidden" id="reservationNoDown" class="form-control input-md" name=<?php echo"8";?> value="<?php echo"$qResult";?>"  required>
                                                        

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='9'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $reservationNotFull = $row['deciBusinessDependencyValue'];
                                                            $bem = floatval($reservationNotFull);
                                                            $wResult = ltrim($bem,'0');

                                                        
                                                        ?>
                                                        <input type="hidden" id="reservationNotFull" class="form-control input-md" name=<?php echo"9";?>  value="<?php echo $wResult;?>"  required>
                                                        
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Overdue months for penalty:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='10'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $overdue = $row['deciBusinessDependencyValue'];
                                                            
/*
                                                            $number = 549.00;
                                                            echo round($number, 2);*/
                                                        
                                                        ?>
                                                        <input type="text" id="overdue" class="form-control input-md" name=<?php echo"10";?> value="<?php echo round($overdue,2);?>"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <!-- <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Transfer Charge:</label>
                                                    <div class="col-md-2">
                                                        <div class="input-group">

                                                        <?php
                                                           /* $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='11'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $transferCharge = $row['deciBusinessDependencyValue'];
                                                            
/*
                                                            $number = 549.00;
                                                            echo round($number, 2);*/
                                                        
                                                        ?>
                                                        <input type="number" id="overdue" class="form-control input-md" name=<?php ;?> value="<?php ($transferCharge);?>"  required>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div><!--ROW-->
                                            
                                            
                                            <div class="row">

                                                <h4 class="col-md-10" style = "color: red;" style="margin-top:.70em">ALL FIELDS ARE REQUIRED</h4>
                                                <div class="form-group"> 
                                                    <button type="submit" class="btn btn-success col-md-1" style="margin-top:.70em" name= "btnSave">Save</button>

                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!--panel body -->
                </div><!--panel panel-success-->
            </div><!--col-md-12-->
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
   

		 <!-- jQuery -->
    <!--<script src="../vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../js/moment/moment.min.js"></script>
    <script src="../js/datepicker/daterangepicker.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>



</body>
</html>

