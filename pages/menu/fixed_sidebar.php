<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border:0;">
              <a href="fixed_sidebar.html" class="site_title"><i class="fa fa-home"></i><span>  MLMS</span></a>
            </div>


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cog"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-briefcase"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list"></i> Queries <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-wrench"></i> Utilities <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" >
          <div class="nav_menu" style="background-color:#ABEBC6;">

            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-white">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Admin</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Memorial Lot Management System with Collection Monitoring
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
              <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-success ">
                     <div class="panel-heading">
                        
                         <H2>SECTION</H2>
                     </div><!-- /.panel-heading -->
                     
                      <div class="panel-body">

                        <div class="col-md-4 column">
                         <div class="panel panel-success ">
                            <div class="panel-heading">
                        
                                <H2><b>Create New</b></H2>
                              </div><!-- /.panel-heading -->
                     
                              <div class="panel-body">
                                   <form class="form-horizontal"   role="form" action = "section.php" method= "POST">
                                      
                       <div class="form-group" >
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                </div>
                           </div>
                                          
               <div class="form-group">
                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em">Section Name:</label>
                 <div class="col-md-7">
                   <input type="text" class="form-control input-md" name= "tfSectionName" onkeypress='return validateSectionName(event)' required>
                 </div>
                    </div>
                          
               <div class="form-group" >
                                <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em">No. of Block:</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control input-md" min="1" name="tfNoOfBlock" onkeypress='return validateNumber(event)' required/>
                                </div>
                           </div>
                            
                                          
                     <div class="form-group modal-footer"> 
                                <h4 class="col-md-5" style = "color: red;" align="right" style="margin-top:.30em">REQUIRED ALL FIELDS</h4>
                                <div class="col-sm-7">
                  <button type="submit" class="btn btn-success" name= "btnSubmit">Add</button>
                  <input class = "btn btn-default"  type="reset" name = "btnClear" value = "Clear Entries">
                 </div>
               </div>
                              
          </form><!--Form-->

                              </div>

                          </div>

                 </div>

                

                               <div class="table-responsive col-md-8 col-lg-8 col-xs-8">
                                     <table class="table table-bordered table-hover" id="datatables-section">
                                    <thead>
                                            <tr>
                                                <th class="success" style = "text-align:center; font-size: 20px;">Name</th>
                                                <th class="success" style = "text-align:center; font-size: 20px;">No. of Block</th>
                                                <th class="success" style = "text-align:center; font-size: 20px;">Action</th>
                                            </tr>
                                    </thead>                  
                                    
                                    <tbody>
                                            <?php
                                                $view = new section();
                                                $view->viewSection();
                                            ?>
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                       
                         
                   </div><!-- /.Main panel-body -->
             </div>


        </div><!-- /.col-md-12 -->
   </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            MLMS-Design 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

      <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>