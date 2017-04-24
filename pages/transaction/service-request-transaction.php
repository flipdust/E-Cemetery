<?php

require('../controller/connection.php');
//require('../modals/BillOutFormSevice.php');
require('../controller/viewdata.php');
require('../controller/alert.php');

if(isset($_POST['btnSubmit'])){

    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
    mysql_select_db(constant('mydb'));
                    
    $unit   =   $_POST['unit'];
    
        
        $sqlUpdate="select * from tblservice where strServiceStatus='added'";
        $resultUpdate=mysql_query($sqlUpdate,$conn);
        $ctrLang=0;
        
        while($rowUpdate=mysql_fetch_array($resultUpdate)){
    foreach($unit as $each){
        $ctrLang++;
        $date       =   $_POST['date'];
        $amount     =   $_POST['amount'];
        $customer   =   $_POST['customer'];
        
        $sqlSelect      =   "SELECT * FROM tblservicerequested";
        $resultSelect   =   mysql_query($sqlSelect,$conn);
        $numSelect      =   mysql_num_rows($resultSelect);
        
        $idctr  =   1; 
        
        if($numSelect > 0){
            
            while ($rowSelect = mysql_fetch_array($resultSelect)){
                
                $idctr  =   $rowSelect['intServiceRequested'];
                $idctr++;
            }//while

        }else{
            $idctr=1;
        }//else
            
            $intServiceID   =   $rowUpdate['intServiceID'];
            $date           =   date('Y-m-d');
            
            $sqlInsert  = "INSERT INTO tblservicerequested(intServiceRequested,dateRequested,deciAmountPaid,intCustomerId,intUnitId,intServiceId) 
                                VALUES ('$idctr','$date','$amount','$customer','$each','$intServiceID')";
            $resultInsert = mysql_query($sqlInsert,$conn);
            $sqlUpdateService = "UPDATE tblservice SET strServiceStatus=null where strServiceStatus='added'";
            $resultUpdateService = mysql_query($sqlUpdateService,$conn);
            /*$alert = new alerts();
            $alert -> alertSold();*/
            ?>
                    <script type="text/javascript">

                            swal({ 
                              title: "Success",
                               text: "Record has been saved!",
                                type: "success"
                              },
                              function(){
                                  window.open('../modals/transaction/serviceReq-pdf.php?ctrLang=<?php echo $ctrLang?>&&intServiceRequested=<?php echo $idctr;?>');
                                  window.location.href='service-request-transaction.php';

                              
                            
                            });
                                            
                    </script>
                <?php

    }//foreach                   
    
        }//while     
 
}//if isset
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MLMS-Services Request</title>

<!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
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
   <!--  <script>
      $(document).ready(function(){
        $('#datatable-cust').DataTable();
        $('#datatable-service').DataTable();
      });
    </script>
    <!-- /Datatables -->

	
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
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H3><b>SERVICE PURCHASE</b></H3>
                            </div><!-- /.panel-heading -->
                                    
                            <div class="panel-body">
                                 <div class="col-md-6">
                                    <div class="panel panel-default">
                                          <div class="panel-heading">
                                             <div class='btn-toolbar pull-right'>
                                                <!-- <div class='btn-group'>
                                                  <button type='button' class='btn btn-success' data-toggle='modal' data-target='#modalBillService'>CHECKOUT</button>
                                                </div> -->
                                              </div>
                                              <h3><b>Services Available<b></h3>
                                        </div><!-- /.panel-heading -->

                                           
                                        <div class="panel-body">            
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                             <table id="datatable-available" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Name</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Price</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Action</th>
                                                            </tr>
                                                    </thead>                  
                                                    
                                                    <tbody>
                                                     <?php
                                                                    $view = new service();
                                                                    $view->viewServiceRequest();
                                                            ?>
                                                    </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                                      
                                        </div><!-- panel body -->
                                    </div><!--panel body -->
                                </div><!--panel panel-success-->


                                <div class="col-md-6">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Services Requested</b></H3>
                                        </div><!-- /.panel-heading -->
                                    
                            <div class="panel-body">

                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                             <table id="datatable-requested" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Name</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Price</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Action</th>
                                                            </tr>
                                                    </thead>                  
                                                    
                                                    <tbody>
                                                    <?php
                                                            $view = new service();
                                                            $view -> viewServiceRequested();
                                                    ?>
                                                    </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                          
<?php 
 $sqlDisplay = mysql_query("select * from tblservice s inner join tblservicetype t on t.intServiceTypeId = s.intServiceTypeId where strServiceStatus='added' and strServiceTypeName='Service Request'",$conn);
 $numD= mysql_num_rows($sqlDisplay);
 if($numD>0){
?>
  <button type="submit" data-toggle="modal" data-target="#modalRequested" style= "margin-top: 20px" class="btn md btn-success pull-right" name= "btnBillOut">
<span class='glyphicon glyphicon-list-alt'></span>  BillOut</button>

<?php
 }

?>            

                                        

                                        </div><!-- panel body -->
                                     
                                        </div><!--panel panel-success-->
                                    </div><!--col-md-4 column-->
                            </div><!--panel body -->

                        </div>
                    </div><!--panel panel-success-->
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!-- /page content -->

      
<!-- SERVICES MODAL-->
<div class = "modal fade" id="modalRequested" >
    <div class = "modal-dialog" style = "width: 70%;">
        <div class = "modal-content" >
            <!--header-->
            <div class = "modal-header" style='background:#b3ffb3;'>
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3>BILL OUT</h3></center>
            </div>
            
            <!--body (form)-->
            <div class='modal-body'>
                <form class='form-horizontal' role='form' action="service-request-transaction.php" method='POST'>
                    
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class ='panel panel-default'>
                                <div class='panel-body'>
                                    
                             <div class='row'>
                    
                                    <div class='form-group'>
                                        <label class="control-label" style="font-size:20px;">Select Customer</label>
                                        <div class="col-xs-12" align="center">
                                        <select class='form-control' id="custId" name = 'customer' onchange="changeUnit()" required>
                                            <option value=''selected disabled> -Choose Customer-</option>
                                            <?php
                                                $sql1 =  " select * from tblavailunit a inner join tblcustomer c on a.intCustomerId=c.intCustomerId WHERE (a.strModeOfPayment = 'Spotcash') OR (a.strModeOfPayment = 'At-Need' AND a.intStatus = 0 AND (a.boolForfeitedNotice != 1 OR a.boolForfeitedNotice IS NULL) AND a.boolDownpaymentStatus = '1') ORDER BY c.strLastName ASC";                    
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
                                    </div>
                                        
                                    </div>
                                    <script type="text/javascript">
                                        function changeUnit(){
                                            
                                                var total=$('#totalAmountStatic').val();
                                                $('#totalAmount').val(total);
                                                var id =$('#custId').val();
                                                $.ajax({
                                                    url:'changeCustomer.php',
                                                    dataType:'JSON',
                                                    data:{
                                                        'id':id
                                                    },
                                                    success:function(data){
                                                        $('#unit2').html(data);
                                                    }

                                                });

                                        }
                                        function changeTotal(){
                                                    
                                            var total=$('#totalAmountStatic').val();
                                            var unitQuantity=$("#unit2 :selected").length;
                                            if(unitQuantity<=0){
                                                $('#totalAmount').val(total);
                                            }else{
                                                var newTotal=parseFloat(total*unitQuantity);
                                                $('#totalAmount').val(newTotal);
                                            }
                                            
                                            
                                            
                                            
                                        }
                                    </script>
                                     <div class="form-group">
                                        <label class="control-label" style="font-size:20px;">Select Units</label>
                                        <div class="col-xs-12" align="center">
                                          <select class="select2_multiple" name="unit[]" onchange="changeTotal()" id="unit2" multiple="multiple" required>
                                          </select>
                                        </div>
                                      </div>
                                
                            </div><!--row-->
                                    
    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a units",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          placeholder: "Select Unit",
          allowClear: true,
          width:'100%'
        });
      });
    </script>
    <!-- /Select2 -->
                                </div><!--panel-body-->
                            </div><!--panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class='col-md-6'>
                           
                    
                            <div class ='panel panel-default'>
                                <div class='panel-body'>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <?php $date = date('Y-m-d');?>
                                            <input type='date' class='form-control input-md' name='date' value='<?php echo "$date"; ?>' readonly>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Total Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <?php
                                                $sql="SELECT SUM(dblServicePrice) as 'total' FROM tblservice where strServiceStatus='added'";
                                                $result= mysql_query($sql,$conn);
                                                $row=mysql_fetch_array($result);
                                                $amount=$row['total'];
                                                ?>
                                                <input type='hidden' id="totalAmountStatic" class='form-control input-md tfAmountPaid' value='<?php echo $amount ?>' name='amount' readonly="" />
                                                <input type='text' id="totalAmount" class='form-control input-md tfAmountPaid' value='<?php echo $amount ?>' name='' readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' name='amount' required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div><!--panel-body-->
                            </div><!--panel-default-->
                        </div><!--col-md-6-->
                        
                    </div><!--row-->
                        
            </div><!--modal-body-->
                    <div class='modal-footer'> 
                        <button type='submit' class='btn btn-success' name= 'btnSubmit'>Submit</button>
                        <input class = 'btn btn-default' type='reset' name = 'btnClear' value = 'Clear Entries'>
                    </div>
                </form>
                        
        </div><!-- modal content-->
    </div><!-- moda dialog-->
</div><!-- modal fade-->



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
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
 
    <!-- Datatables -->
    <script>
      $(document).ready(function(){
        $('#datatable-available').DataTable();
        $('#datatable-requested').DataTable();
      });
    </script>
    <!-- /Datatables -->


    
  </body>
</html>