<!-- top navigation -->
<div class="top_nav" >
<?php 
  
        $sql = "SELECT * FROM tblcompanysettings WHERE intCompanyID = '1'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_close($conn);
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result)){
            
            $tfID = $row['intCompanyID'];
            $tfCompanyName = $row['strCompanyName'];
            $tfCompanyAddress = $row['strAddress'];
            $tfContactNo = $row['strContactNo'];
            $tfEmailAdd = $row['strEmailAddress'];
            $file = $row['strLogo'];
            $tfColor = $row['strColor'];
            
        }
        
?>
    <div class="nav_menu" style="background-color:<?php echo $tfColor; ?>">
        <a class="navbar-brand" rel="home" href="#" >
            <img style="max-height:100px; max-width: 100px; margin-top: -16px; margin-left: -15px" src="<?php echo $file;?>">
            <div style="margin-left:100px;margin-top: -100px;">
            <h1><?php echo $tfCompanyName; ?></h1>
            <h3><?php echo $tfCompanyAddress; ?></h3>
            </div>
       </a>
            
        <nav>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="../images/user.png" alt="">Admin
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <!--   <li><a href="javascript:;"> Profile</a></li> -->
                     <!--    <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li> -->
                       <!--  <li><a href="javascript:;">Help</a></li> -->
                        <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                       <i class="fa fa-envelope-o"></i>
                       <span class="badge bg-white">1</span>
                    </a>
                    
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="../images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>Admin</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">Memorial Lot Management System with Collection Monitoring</span>
                            </a>
                        </li>
                  
                        <div class="text-center">
                            <a>
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                
                    </ul>
                </li> -->
            </ul>
        </nav>

    </div>
</div>
<!-- /top navigation -->