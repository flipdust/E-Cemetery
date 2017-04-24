<?php

require('../controller/connection.php');
require('../controller/query-viewdata.php');
require('../controller/createdata.php');
require('../controller/updatedata.php');
require('../controller/deactivate.php');
require('../controller/archivedata.php');
require('../controller/retrieve.php');



if (isset($_POST['btnSubmit'])) {

        $tfacName = $_POST['tfacName'];
		$tfNoOfLevel = $_POST['tfNoOfLevel'];
        $tfStatus = $_POST['tfStatus'];
		
		
		$createAC =  new createAC();
		$createAC->Create($tfacName,$tfNoOfLevel,$tfStatus);
}
	  
if (isset($_POST['btnSave'])){

		$tfAshID = $_POST['tfAshID'];
		$tfAshName = $_POST['tfAshName'];
		$tfNoOfLevel = $_POST['tfNoOfLevel'];
		
		
		$updateAC =  new updateAC();
		$updateAC->update($tfAshID,$tfAshName,$tfNoOfLevel);
}

      
if (isset($_POST['btnDeactivate'])){

		$tfAshID = $_POST['tfAshID'];
		
		
		$deactivateAC =  new deactivateAC();
		$deactivateAC->deactivate($tfAshID);
}

if (isset($_POST['btnArchive'])){

        $tfAshID = $_POST['tfAshID'];
        
        $archiveAC =  new archiveAC();
        $archiveAC->archive($tfAshID);
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

    <title>MLMS-Cancelled Reservation</title>

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



    <script>
        function validateNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
                return true;
                }else{
                return false;
                }
            }
            
            function validateSectionName(evt) {
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
            <div class="main_container">
               <?php 
                    require('../menu/reports-sidemenu.php');
                    require('../menu/topnav.php');  
                ?>
                  
            <!-- page content -->
            <div class="right_col" role="main">
        	   <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H1><b>CANCELLED RESERVATION</b></H1>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                              
                             <label class="col-md-1" style = " font-size: 16px;" align="left" style="margin-top:.30em">FROM:</label>
                                  <div class="col-md-2" >  
                                    <div class='input-group' >
                                    <input type='text' class='form-control' id="date" name='from' placeholder="mm/dd/yyyy"/>
                                    </div> 
                                  </div>

                                  <label class="col-md-1" style = " font-size: 16px;" align="left" style="margin-top:.30em">TO:</label>
                                  <div class="col-md-2" >  
                                    <div class='input-group' >
                                    <input type='text' class='form-control' id="date" name='to' placeholder="mm/dd/yyyy"/>
                                    </div> 
                                  </div>

                                   <label class="col-md-2" style = " font-size: 16px;" align="left" style="margin-top:.30em">FILTER BY:</label>
                                  <div class="col-md-2">
                                            <select class="form-control" name = "filter">
                                                            <option value=""> </option>
                                                            <option value="1">Daily</option>
                                                            <option value="2">Weekly</option>                              
                                                            <option value="3">Monthly</option>
                                                            <option value="4">Quarterly</option>
                                                            <option value="5">Yearly</option>
                                            </select>
                                  </div>

                                   <button type = 'button' class = 'btn btn-primary' onClick="window.open('../report-pdf/cancelled-reservation-report-daily.php')"><i class='glyphicon glyphicon-print'> PRINT</i></button>
    
                                  
                                  <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                             <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class = "success" style = "text-align: center; font-size: 14px;">Reservation Date</th>
                                                            <th class = "success" style = "text-align: center; font-size: 14px;">Date of Cancellation</th>
                                                           <th class = "success" style = "text-align: center; font-size: 14px;">Customer Name</th> <th class = "success" style = "text-align: center; font-size: 14px;">Unit Type</th>
                                                           <th class = "success" style = "text-align: center; font-size: 14px;">Reservation Fee</th>  <th class = "success" style = "text-align: center; font-size: 14px;">Total Amount Paid</th>
                                                                                                                    
                                                    </thead>
                                                    
                                                    <tbody>
                                                      
                                                    </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                        
                    
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

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
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

     <script src="../../build/js/custom.min.js"></script>

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
    <script src="../build/js/custom.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
     <script>
    $(document).ready(function(){
            var date_input=$('input[name="from"]')
            var date_input1=$('input[name="to"]')
            
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })

            date_input1.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
             
          
    })
    </script>
  </body>
</html>