
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a style = "color:#fff; font-size:28px; font-family:helvetica;" class="navbar-brand" href="landing.php">ENDINMIND</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                   <!--  <a style="color:#eee; padding-top: 20px; padding-bottom:20px; " href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li> -->

       
   <!-- NOTIFICATIONS -->

                <li class="dropdown">
                    <a style="color:#eee; padding-top: 20px; padding-bottom:20px; " href="#" class="dropdown-toggle" data-toggle="dropdown"  class="badge"> <i class="fa fa-bell"> <?php echo $noti[0]['agency_pending'];?></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <?php foreach($noti1 as $notif){?>
                            <li>
                                <a href="npagencies.php"><span class="label label-danger"><?php if($notif['status'] == 'NPaid'){ echo "UNSUBSCRIBED"; }else{ echo "PENDING"; }?></span> &nbsp; <?php echo $notif['agencyname'];?> </a>
                            </li>
                    

                        <?php }?>

                    </ul>
                </li>



                <li class="dropdown">
                    <a style = "color:#eee;" href="#" class="dropdown-toggle" data-toggle="dropdown"> <img class="img-rounded" width="30" height="30" src="files/<?php echo $info['image'];?>" />
                    
          <?php echo $info['name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="adminprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li>
                            <a href="changepassadmin.php"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                    
                        <li>
                            <a href="logoutadmin.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          
            
    
            <!-- /.navbar-collapse -->
        </nav>