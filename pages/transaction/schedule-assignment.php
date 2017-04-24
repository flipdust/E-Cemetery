<?php

require ("../controller/connection.php");
// require('controller/viewdata.php');
// require('controller/createdata.php');
// require('controller/updatedata.php');
// require('controller/deactivate.php');
// require('controller/archivedata.php');
// require('controller/retrieve.php');
/*
if (isset($_POST['btnSubmit'])){

        $serviceName = $_POST['serviceName'];
        $tfDescription = $_POST['tfDescription'];
        $tfPercent = $_POST['tfPercent'];
        $tfStatus = $_POST['tfStatus'];
         
        $tfPercentValue = $tfPercent/100;
        
        $createDiscount =  new createDiscount();
        $createDiscount->Create($serviceName,$tfDescription,$tfPercentValue,$tfStatus);
}
      
if (isset($_POST['btnSave'])){

        $tfDiscountID = $_POST['tfDiscountID'];
        $tfDescription = $_POST['tfDescription'];
        $tfPercent = $_POST['tfPercent'];
        
        $tfPercentValue = $tfPercent/100;
        
        $updateDiscount =  new updateDiscount();
        $updateDiscount->update($tfDiscountID,$tfDescription,$tfPercentValue);
}
       
      
if (isset($_POST['btnDeactivate'])){

        $tfDiscountID = $_POST['tfDiscountID'];
        
        $deactivateDiscount =  new deactivateDiscount();
        $deactivateDiscount->deactivate($tfDiscountID);
}

if (isset($_POST['btnArchive'])){

        $tfDiscountID = $_POST['tfDiscountID'];
        
        $archiveDiscount =  new archiveDiscount();
        $archiveDiscount->archive($tfDiscountID);
}*/

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MLMS-Schedule Assignment</title>

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
        function validateServiceName(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 8 || charCode == 32 || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)){
                return true;
                }else{
                return false;
                }
            }
            
        function validateNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
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
                    require('../menu/transac-sidemenu.php');
                    require('../menu/topnav.php');  
                ?>
                 
            <!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <H1><b>SCHEDULE ASSIGNMENT</b></H2>
                            </div><!-- /.panel-heading -->
                     
                              <div class="panel-body">
                                <div class="col-md-8">
                                    <div class="panel panel-default ">
                                        <div class="panel-heading">
                                            <H2><b></b></H2>
                                        </div><!-- /.panel-heading -->
                         
                                        <!-- panel-body --> 
                                        <div class="panel-body">
                                           <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="collection-tab" role="tab" data-toggle="tab" aria-expanded="true">Scheduled Services</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="downpayment-tab" data-toggle="tab" aria-expanded="false">Unscheduled Services</a>
                        </li>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="scheduled-tab">
                          <div class="panel-body">          
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Daniella Soriano</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#viewScheduled'>
                                                            <i class='glyphicon glyphicon-eye-open'> VIEW</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                            </div><!--panel body -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="unscheduled-tab">
                          <div class="panel-body">          
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive1dp" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Daniella Soriano</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#viewUnscheduled'>
                                                            <i class='glyphicon glyphicon-eye-open'> VIEW</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                            </div><!--panel body -->
                        </div>
                        
                      </div>
                    </div><!--TAB-->

                    
                                        </div><!-- panel body -->
                                    </div><!--panel panel-success-->
                                </div><!--col-md-4 column-->

                                <div class="col-md-4">
                                   <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>UPCOMING SCHEDULE</b></H3>
                                        </div><!-- /.panel-heading -->
                         
                                        <!-- panel-body --> 
                                        <div class="panel-body">
                                           
                                        </div><!-- panel body -->
                                    </div><!--panel panel-success-->
                                    </div><!--col-md-8-->
                
                                </div><!--last panel body -->
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

 <!--VIEW SCHEDULED COLLECTION MODAL-->
                            <div class = 'modal fade' id = 'viewScheduled'>
                            <div class = 'modal-dialog' style = 'width: 70%;'>
                                <div class = 'modal-content' style = 'height: 320px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>SCHEDULED SERVICES: (Name of customer)</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive2col" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Service/s</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Deceased Name</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Schedule</th>
                                                                   <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>                                                                 
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Interment</td>
                                                          <td>Sino, Basila W.</td>
                                                          <td>Jan. 20, 2015 8:00am-10:00am</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-warning' data-toggle = 'modal' title='Edit' data-target = '#rescheduleModal'>
                                                            <i class='glyphicon glyphicon-calendar'> RESCHEDULE</i></button>
                                                            <button type = 'submit' class = 'btn btn-success'>
                                                            <i class='glyphicon glyphicon-ok'> FINISHED </i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                           
                                    </div><!-- content-->
                                </div>
                            </div>
                        </div>

     <!--RESCHEDULED MODAL-->
                            <div class = 'modal fade' id = 'rescheduleModal'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = 'height: 420px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             <div class="panel-body">
                                              <div class="col-md-6">
                                                   <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <H2><b>Original Schedule</b></H2>
                                                        </div><!-- /.panel-heading -->
                                         
                                                        <!-- panel-body --> 
                                                        <div class="panel-body">
                                                        <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">Date:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='origDate' id='origDate' disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">Start Time:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='origDate' id='origDate' disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">End Time:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='origDate' id='origDate' disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div><!-- panel body -->
                                                    </div><!--panel panel-success-->
                                            </div><!--col-md-8-->
                                            <div class="col-md-6">
                                                   <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <H2><b>New Schedule</b></H2>
                                                        </div><!-- /.panel-heading -->
                                         
                                                        <!-- panel-body --> 
                                                        <div class="panel-body">
                                                             
                                                             <div class='form-group'>
                                                                <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">Date:</label>
                                                                <div class="col-md-7">  
                                                                    <div class='input-group' >
                                                                       <input type='text' class='form-control' id="date" name='date' placeholder="mm/dd/yyyy" required />
                                                                    </div> 
                                                                    
                                                                </div>
                                                               
                                                            </div>

                                                            <div class='form-group'>
                                                                <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">Start Time:</label>
                                                                <div class="col-md-7">  
                                                                    <div class='input-group'>
                                                                       <input type='text' class='form-control' id='timestart' name='timestart' placeholder="hh:mm" required />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">End Time:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control' name='timeend' id='timeend' placeholder="hh:mm" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div><!-- panel body -->
                                                    </div><!--panel panel-success-->
                                            </div><!--col-md-8-->
                                        </div>


                                        </div><!-- content-->
                                    <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-12 col-md-8">
                                                        <button type = 'button' class="btn btn-success" data-toggle = 'modal' title='Edit' data-target = '#'>CONFIRM</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>

   

    <!--VIEW UNSCHEDULED MODAL-->
                            <div class = 'modal fade' id = 'viewUnscheduled'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = 'height: 320px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>SERVICE/S: (Name of customer)</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive2dp" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Service/s</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Deceased Name</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>                                                                 
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Inurnment</td>
                                                          <td>Boom,Panid D.</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#scheduleService'>
                                                            <i class='glyphicon glyphicon-folder-calendar'> SCHEDULE</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                           
                                    </div><!-- content-->
                                </div>
                            </div>
                        </div>

 <!--SCHEDULING MODAL-->
                            <div class = 'modal fade' id = 'scheduleService'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = 'height: 320px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <H3 class = 'modal-title'>ADD NEW SCHEDULE</H3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                              <div class="panel-body">
                                                             <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">Date:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group' >
                                                                   <input type='text' class='form-control' id="date1" name='date1' placeholder="mm/dd/yyyy" required />
                                                                </div> 
                                                                
                                                            </div>
                                                           
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">Start Time:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='timestart1' id='timestart1' placeholder="hh:mm"required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-5" style = " font-size: 16px;" align="right" style="margin-top:.30em">End Time:</label>
                                                            <div class="col-md-7">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='timeend1' id='timeend1' placeholder="hh:mm" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div><!-- panel body -->
                                           
                                                                                   
                                    </div><!-- content-->
                                    <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-8">
                                                        <button type = 'submit' class="btn btn-success" data-dismiss="modal">SUBMIT</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
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
    
     <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive1dp').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

 <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive2dp').DataTable({bFilter: false, bInfo: false});

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });


        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
     <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };


        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive3dp').DataTable({bFilter: false, bInfo: false, bPaginate: false});

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });


        TableManageButtons.init();
      });
    </script>
    <!--/Datatables-->

     <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };
>>>>>>> 59353cd8be986b7b573e13c2f642f3a02653be10

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive2col').DataTable({bFilter: false, bInfo: false});

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });


        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
     <!--/Datatables-->

     <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive3col').DataTable({bFilter: false, bInfo: false, bPaginate: false});

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });



        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
        
    <script>
    $(document).ready(function(){
            var date_input=$('input[name="date"]')
            var date_input1=$('input[name="date1"]')
            var start_resched=$('input[name="timestart"]')
            var end_resched=$('input[name="timeend"]')
            var start_new=$('input[name="timestart1"]')
            var end_new=$('input[name="timeend1"]')
            
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                startDate: "today",
                todayHighlight: true,
                autoclose: true,
            }).datepicker("setDate", new Date())

            date_input1.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                startDate: "today",
                todayHighlight: true,
                autoclose: true,
            }).datepicker("setDate", new Date())
             
          start_resched.timepicker({
                timeFormat: 'h:i a',
                interval: 30,
                
            })
             end_resched.timepicker({
                timeFormat: 'h:i a',
                interval: 60,
            })
             start_new.timepicker({
                timeFormat: 'h:i a',
                interval: 60,
            })
             end_new.timepicker({
                timeFormat: 'h:i a',
                minTime: '8',
            })
    })
    </script>
    
    
     </body>
</html>