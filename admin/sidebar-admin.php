
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="dist/css/material.css">
    <link rel="stylesheet" type="text/css" href="dist/css/material.min.css">

    <!-- MATERIAL CSS -->
  <!--   <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/> -->

    <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- ADMIN CSS -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Data Tables -->
 <!--    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
 -->
</head>




 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li style="margin-top:15px;" class = "">
                    <!--      <button class = "btn btn-success" style = "margin-left:40px; margin-top:10px; margin-bottom:10px"><b>Create Process</b> </button>
                          <div style = "margin-left:20px;height:1px;width:180px;background:#3F51B5"></div> -->
                        <a style = "color:#fff; font-size: 15px;" href="javascript:;" data-toggle="collapse" data-target="#demo"><i style="color:#eee;" class = "glyphicon glyphicon-user"></i> Agencies <i style = "font-size:12px" class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul id="demo" class="collapse">

                            <li>
                                <a title = "Personal Process" style = "color:#eee" href="pendingagency.php"><i class = "glyphicon glyphicon-question-sign"></i> Pending</a>
                            </li>
                            <li>
                                <a title = "Agency Process"style = "color:#eee" href="deactivatedagencies.php"><i class = "glyphicon glyphicon-remove-sign"></i> Deactivated</a>
                            </li>
                            <li>
                                <a title = "Agency Process"style = "color:#eee" href="npagencies.php"><i class = "glyphicon glyphicon-minus-sign"></i> Not Yet Subscribed</a>
                            </li>
							<li>
                                <a title = "Agency Process"style = "color:#eee" href="activeagency.php"><i class = "glyphicon glyphicon-ok-sign"></i> Active</a>
                            </li>
                        </ul>
                    </li>

                          <li>
                       <div style = "margin-left:20px;height:1px;width:180px;background:skyblue"></div>
                    </li>
                     <li class = "">
                        <a style = "color:#fff; font-size: 15px;" href="javascript:;" data-toggle="collapse" data-target="#demo1"><i style="color:#eee;" class = "glyphicon glyphicon-user"></i> Applicants <i style = "font-size:12px" class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a title = "Personal Process" style = "color:#eee" href="euactive.php"><i class = "glyphicon glyphicon-ok-sign"></i> Active</a>
                            </li>
                            <li>
                                <a title = "Agency Process"style = "color:#eee" href="deactivatedenduser.php"><i class = "glyphicon glyphicon-remove-sign"></i> Deactivated</a>
                            </li>
                             <li>
                                <a title = "Agency Process"style = "color:#eee" href="endusernys.php"><i class = "glyphicon glyphicon-minus-sign"></i> Not Yet Subscribed</a>
                            </li>

                        </ul>
                    </li>

                          <li>
                       <div style = "margin-left:20px;height:1px;width:180px;background:skyblue"></div>
                    </li>
			
                <li class = "">
                        <a style = "color:#fff; font-size: 15px;" href="javascript:;" data-toggle="collapse" data-target="#demo2"><i style="color:#eee;" class = "glyphicon glyphicon-usd"></i> Plans and Subscription <i style = "font-size:12px" class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a title = "Personal Process" style = "color:#eee" href="listplan.php"><i class = "mdi-action-view-list"></i> Plan List</a>
                            </li>
                            <li>
                                <a title = "Agency Process"style = "color:#eee" href="planreports.php"><i class = "mdi-action-receipt"></i> Reports</a>
                            </li>
                            
                              
                        </ul>
                    </li>
                    


					<li>
                       <div style = "margin-left:20px;height:1px;width:180px;background: skyblue"></div>
                    </li>

    

          <li class = "">
             <a style = "color:#fff; font-size: 15px;" href="javascript:;" data-toggle="collapse" data-target="#admintools"><i class = "glyphicon glyphicon-wrench"></i> Admin Tools <i style = "font-size:12px" class="glyphicon glyphicon-chevron-down"></i></a>
             <ul id="admintools" class="collapse">
                 <li>
                     <a title = "Personal Process" style = "color:#eee" href="addadmin.php"><i class = "fa fa-fw fa-user"></i>Add User Admin</a>
                 </li>

                 <li>
                     <a title = "Personal Process" style = "color:#eee" href="reports.php"><i class = "fa fa-fw fa-user"></i>Reports</a>
                 </li>
                 <li>
                                <a title = "Agency Process"style = "color:#eee" href="TREU.php"><i class = "fa fa-fw fa-building"></i> Total Registered End Users</a>
                            </li>
             </ul>
         </li>


            <li>
                       <div style = "margin-left:20px;height:1px;width:180px;background:skyblue"></div>
                    </li>

                        <li>
                            <a style="margin-left: 3px;" class="btn btn-danger mdi-action-exit-to-app mdi-1x" href="logoutadmin.php" ></a>
                        </li>
                     <li>
                   <!--   <a title = "Personal Process" style = "color:#eee ; font-size: 15px;" ><i ></i>&nbsp;   LOGOUT</a> -->
                 </li>

			    </ul>





