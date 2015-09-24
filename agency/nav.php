<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a style = "color:#eee; font-size:28px; font-family:helvetica;" class="navbar-brand" href="agencypage.php">ENDINMIND</a>
            </div>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                </li>
                <li class="dropdown">
                   <a style="color:#eee; padding-top: 20px; padding-bottom:20px; " href="#" class="dropdown-toggle" data-toggle="dropdown"  class="badge"> <i class="fa fa-bell"> </i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <?php $expire =findsubs($id);?>
                        <li>
                            <a href="#">Account Will Expire On : <span class="label label-default"><?php echo $expire['enddate'];?></span></a>
                        </li>
                        <!-- <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li> -->
                        <li class="divider"></li>
<!--                         <li>
                            <a href="#">View All</a>
                        </li> -->
                    </ul>
                </li>



                <li class="dropdown">
                    <a style = "color:#eee;" href="#" class="dropdown-toggle" data-toggle="dropdown"> <img class="img-rounded" width="30" height="30" src="files/<?php echo $info['logo'];?>" />
                    
          <?php echo $info['agencyname']; ?> <b class="caret"></b></a>


             <!--    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img class="img-rounded" width="16" height="16" src="files/<?php echo $info['logo'];?>" />

					<?php echo $info['agencyname']; ?> <b class="caret"></b></a> -->
                    <ul class="dropdown-menu">
                        <li>
                            <a href="agencyprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="updateagencyprofile.php"><i class="mdi-action-settings"></i> Update Profile</a>
                        </li>
                        <li>
                            <a href="changepassagency.php"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logoutagency.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
			     
            <!-- /.navbar-collapse -->
        </nav>