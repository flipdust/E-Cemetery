<?php
require ("../controller/connection.php");
require ("../controller/utilities-update.php");
require('../controller/createdata.php');

if (isset($_POST['btnUpload']))
{
    $tfID= $_POST['tfID'];
    $tfCompanyName= $_POST['tfCompanyName'];
    $tfCompanyAddress= $_POST['tfCompanyAddress'];
    $tfContactNo= $_POST['tfContactNo'];
    $tfEmailAdd= $_POST['tfEmailAdd'];
   
    $createDetails =  new createDetails();
    $createDetails->Create($tfID,$tfCompanyName,$tfCompanyAddress,$tfContactNo,$tfEmailAdd);
}//if

if (isset($_POST['btnSave']))
{
    $tfID= $_POST['tfID'];
    $tfColor= $_POST['tfColor'];

   
    $createColor =  new createColor();
    $createColor->Create($tfColor,$tfID);
}//if

if(isset($_POST['btn-upload']))
{       $tfID= $_POST['tfID'];
        $UploadedFileName=$_FILES['tfLogo']['name'];
        if($UploadedFileName!='')
        {   
                        $pic = $_FILES['tfLogo']['name'];
                        $pic_loc = $_FILES['tfLogo']['tmp_name'];
                        $folder = "../../pages/images/"; //This is the folder which you created just now
                        
                       if(move_uploaded_file($pic_loc,$folder.$pic))
                        {    
                            $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strLogo`= '$folder$pic' 
                                WHERE `intCompanyID`= ".$tfID." "; 
                            
                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                mysql_select_db(constant('mydb'));
                            
                            if(mysql_query($sql,$conn)){
                                 mysql_close($conn);
                                    }
                         }

    }
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

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!--<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- Ion.RangeSlider -->
    <link href="../../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="....//vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../../vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">


    <title>Company Settings</title>

    
     <script type="text/javascript" src="../../build/js/jquery-3.1.0.js"></script>
     <script type="text/javascript" src="../../build/js/jquery-1.9.1.min.js"></script>
     <script type="text/javascript" src="../../build/js/autoNumeric-min.js"></script>
     
    
    
    
</head>

<body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <?php require('../menu/utilities-sidemenu.php');
             require('../menu/topnav.php');  ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12">
                <div class="panel panel-success ">
                    <div class="panel-heading" style="text-align: center;" ><h1><b>Company Settings</b></h1></div>
                        <div class="panel-body">

                             <div class="col-md-3">

                                <div class="panel panel-success">
                                            <div class="panel-heading">
                                            <H2><b>Change Company Logo</b></H2>
                                            </div><!-- /.panel-heading -->
                                                  <!-- panel-body --> 
                                                <div class="panel-body">
                                                 <form action="company-settings.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" class="form-control" name="tfID" value="1" />
                                                    <input type="file" name= "tfLogo" style="align:center;" onchange="readURL(this);"/>
                                                    
                                                    <img id="output" src="../images/imgupload.png" alt="#" height="100" width="100" />

                                                    <script type="text/javascript">
                                                       function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function (e) {
                                                                    $('#output')
                                                                        .attr('src', e.target.result)
                                                                        .width(150)
                                                                        .height(200);
                                                                };

                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>

                                                    <br><button class="btn btn-primary" type="submit" name="btn-upload" align="center">Upload</button>
                                                    
                                                </form>
                                                        
                                            </div><!-- panel body -->
                                    </div><!--panel panel-success-->

                                    </div> <!--COL UPLOADER-->

                        <div class="col-md-6">

                               <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <H2><b>Change Company Details</b></H2>
                                                        </div><!-- /.panel-heading -->
                                         
                                                        <!-- panel-body --> 
                                                        <div class="panel-body">
                                                        <form role="form" action="company-settings.php" method="post">
                                                            <input type="hidden" class="form-control" name="tfID" value="1" />
                                                        <div class='form-group'>

                                                            <label class="col-md-4" style = " font-size: 16px;" align="right" style="margin-top:.30em">Name:</label>
                                                            <div class="col-md-8">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='tfCompanyName' id='companyName' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-4" style = " font-size: 16px;" align="right" style="margin-top:.30em">Address:</label>
                                                            <div class="col-md-8">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='tfCompanyAddress' id='companyAddress' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-4" style = " font-size: 16px;" align="right" style="margin-top:.30em">Contact No.:</label>
                                                            <div class="col-md-8">  
                                                                <div class='input-group'>
                                                                   <input type='text' class='form-control input-md' name='tfContactNo' id='contactNo' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="col-md-4" style = " font-size: 16px;" align="right" style="margin-top:.30em">Email Address:</label>
                                                            <div class="col-md-8">  
                                                                <div class='input-group'>
                                                                   <input type='email' class='form-control input-md' name='tfEmailAdd' id='emailAdd' />
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <br><button class="btn btn-primary" type="submit" name="btnUpload" align="center">Save</button>
                                                        </form>
                                                        </div><!-- panel body -->
                                                    </div><!--panel panel-success-->
                        </div> <!--DETAILS-->
                     <div class="col-md-3">

                                <div class="panel panel-success">
                                            <div class="panel-heading">
                                            <H2><b>Change Company Theme</b></H2>
                                            </div><!-- /.panel-heading -->
                                                  <!-- panel-body --> 
                                                <div class="panel-body">
                                                 <div class="form-group">
                                                 <form role="form" action="company-settings.php" method="post">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-size:16px;">Color:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">


                                                  <div class="form-group">
                                                   
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="hidden" class="form-control" name="tfID" value="1" />
                                                      <input type="text" id="colorpicker" class="demo1 form-control" name="tfColor"  placeholder="" ="#5367ce" />
                                                    </div>
                                                  </div>
                                                     
                                                    </div>
                                                     <br>
                                                    <button type="submit" class="btn btn-primary" name= "btnSave">Save</button>
                                                  </form>
                                                </div>
                                          
                                          
                                                       
                                            </div><!-- panel body -->
                                    </div><!--panel panel-success-->

                                    </div> <!--COL UPLOADER-->

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
    
    <!-- Bootstrap Colorpicker -->
    <script>
      $(document).ready(function() {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

        $('#colorpicker').colorpicker({
            format: 'hex',
            horizontal: true
        });

        $('#colorpicker1').colorpicker({
            format: 'hex',
            horizontal: true
        });

        $('.demo-auto').colorpicker();
      });
    </script>
    <!-- /Bootstrap Colorpicker -->

    <!-- jquery.inputmask -->
    <script>

        $(":input").inputmask();
      });
    </script>



</body>
</html>


