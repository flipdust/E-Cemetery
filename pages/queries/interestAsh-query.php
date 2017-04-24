<?php

require('../controller/connection.php');
require('../controller/query-viewdata.php');
require('../controller/createdata.php');
require('../controller/updatedata.php');
require('../controller/deactivate.php');
require('../controller/archivedata.php');
require('../controller/retrieve.php');


if (isset($_POST['btnSubmit'])){

        $level = $_POST['level'];
		$tfNoOfYear = $_POST['tfNoOfYear'];
        $tfPercent = $_POST['tfPercent'];
        $tfStatus = $_POST['tfStatus'];
        $atNeed = isset($_POST['atNeed']) && $_POST['atNeed']  ? "1" : "0";
        
        $tfPercentValue = $tfPercent/100;
		        
        
		$createInterest =  new createInterestForLevel();
		$createInterest->Create($atNeed,$level,$tfNoOfYear,$tfPercentValue,$tfStatus);
}
		

	  
if (isset($_POST['btnSave'])){

		$tfInterestID = $_POST['tfInterestID'];
        $level = $_POST['level'];
		$tfNoOfYear = $_POST['tfNoOfYear'];
        $tfPercent = $_POST['tfPercent'];
        
		$tfPercentValue = $tfPercent/100;
		
        $updateInterest =  new updateInterestForLevel();
		$updateInterest->update($tfInterestID,$level,$tfNoOfYear,$tfPercentValue);
}
      
if (isset($_POST['btnDeactivate'])) {

		$tfInterestID = $_POST['tfInterestID'];
		
		$deactivateLevelInterest =  new deactivateLevelInterest();
		$deactivateLevelInterest->deactivate($tfInterestID);
}

if (isset($_POST['btnArchive'])){

        $tfInterestID = $_POST['tfInterestID'];
        
        $archiveLevelInterest =  new archiveLevelInterest();
        $archiveLevelInterest->archive($tfInterestID);
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

    <title>MLMS-Level-Interest-Query</title>

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
        
    </script>
</head>

<body class="nav-sm">
    <div class="container body">
        <div class="main_container">
             <?php require("sidemenu-query.php");
                  require("topnav-query.php");  ?>
                  
            <!-- page content -->
            <div class="right_col" role="main">
        		 <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H1><b>INTEREST RATE</b></H1>
                            </div><!-- panel-heading -->
                     
                            <div class="panel-body">
                                
                            <div class="col-md-12">
                                 <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="form-vertical" role="form" action = "interestAsh-query.php" method= "post">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name = "filter">
                                                                    <option value=""> --Choose Interest Status--</option>
                                                                    <option value="0">Pre-need</option>
                                                                    <option value="1">At-need</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name = "filter1">
                                                                    <option value=""> --Choose Level (Block)--</option>
                                                                    <?php
                                                                        $view = new interestForLevel();
                                                                        $view->selectLevel();
                                                                    ?>                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
                                                                <button type="submit" class="btn btn-default pull-left" name= "btnBack">Back</button>
                                                            </div>
                                                        </div><!-- FORM GROUP -->
                                                    
                                                    </div><!-- ROW -->
                                                </form>
                     	                  </div><!-- /.panel-heading -->
                                           
                                    <div class="panel-body">       
                                        <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                        <tr>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">Level</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">No. of Year</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">At Need</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">Percent</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            
                                                              if (isset($_POST['btnGo'])){
                                                                  
                                                                  $filter = $_POST['filter'];
                                                                  $filter1 = $_POST['filter1'];
                                                            echo"$filter,$filter1";
                                                                  
                                                                  $sql = "SELECT iL.intInterestID, iL.intYear, iL.dblPercent, iL.intStatus, iL.intAtNeed, l.strLevelName, a.strAshName FROM tblinterestforlevel iL
                                                                    INNER JOIN tbllevelash l ON iL.intLevelAshID = l.intLevelAshID 
                                                                    INNER JOIN tblashcrypt a ON l.intAshID = a.intAshID WHERE iL.intStatus='0' AND l.intLevelAshID = '".$filter1."' AND iL.intAtNeed = '".$filter."' ORDER BY l.strLevelName ASC";
                                                            
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            
                                                            while($row = mysql_fetch_array($result))
                                                            { 
                                                                $intInterestID =$row['intInterestID'];
                                                                $strLevelName =$row['strLevelName'];
                                                                $strAshName =$row['strAshName'];
                                                                $intYear     =$row['intYear'];
                                                                $dblPercent =$row['dblPercent'];
                                                                $intStatus=$row['intStatus'];
                                                                $intAtNeed=$row['intAtNeed'];
                                                                
                                                                if($intAtNeed==1){
                                                                $tfAtNeed ="Yes";
                                                                }else{
                                                                    $tfAtNeed="No";
                                                                }
                                                                
                                                                $dblPercentValue = $dblPercent*100;
                                                                
                                                            echo "<tr>
                                                                    <td style ='font-size:18px;'>$strLevelName ($strAshName)</td>
                                                                    <td style = 'text-align: right; font-size:18px;'>$intYear</td>
                                                                    <td style = 'font-size:18px;'>$tfAtNeed</td>
                                                                    <td style = 'text-align: right; font-size:18px;'>$dblPercentValue %</td>
                                                                </tr>";
                                                                    
                                                                }//while($row = mysql_fetch_array($result))
                                                                mysql_close($conn);
                                                                  
                                                              }
                                                              else if(isset($_POST['btnBack'])){
                                                                    $view = new interestForLevel();
                                                                    $view->viewInterest();
                                                              }
                                                              else{
                                                                    $view1 = new interestForLevel();
                                                                    $view1->viewInterest();
                                                              }
                                                              
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
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
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
          ajax: "js/datatables/json/scroller-demo.json",
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

  </body>
</html>