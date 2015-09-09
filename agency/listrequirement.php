<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=agency($id);
$pid=$_GET['id'];
$requirement=listrequirement($pid);
if(isset($_POST['search']))
{	
	if(trim($_POST['val']) == false)
	{
		$message="Enter a Value For Search";
	}
	else
	{

		$_POST['pid']=$pid;
		$requirement=searchrequirement($_POST);
	}
}

}
else
{
	header('location:../intro.php');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Data Tables -->
	<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
	<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div id="wrapper">

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
                <b style = "color:#eb477d;font-size:26px" class="navbar-brand" href="index.html">ENDINMIND</b>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
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
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
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
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-rounded" width="16" height="16" src="files/<?php echo $info['logo'];?>" />

					<?php echo $info['agencyname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="adminprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="changepasseu.php"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logoutuser.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class = "active">
                        <a style = "color:#1ebb90" href="javascript:;" data-toggle="collapse" data-target="#demo"><i class = "fa fa-fw fa-tasks"></i> My Process <i style = "font-size:12px" class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a title = "Personal Process" style = "color:#1ebb90" href="pending.html"><i class = "fa fa-fw fa-user"></i> Personal</a>
                            </li>
                            <li>
                                <a title = "Agency Process"style = "color:#1ebb90" href="charts.html"><i class = "fa fa-fw fa-building"></i> Agency</a>
                            </li>
							
                        </ul>
                    </li>
					<li>
                        <a style = "color:#1ebb90" href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-file"></i> Document</a>
                    </li>
                    <li>
                        <a title = "Subscription" style = "color:#1ebb90" href="#"><i class="fa fa-fw fa-rss"></i> Subscription</a>
                    </li>
					<li>
                       <div style = "margin-left:20px;height:1px;width:180px;background:#1ebb90"></div>
                    </li>
					
                    <li>
                       <button class = "btn btn-success" style = "margin-left:20px; margin-top:25px"><b>Create Process</b> </button>
                    </li>
					

					<li>
                       <div style = "margin-left:20px;margin-top:25px;height:1px;width:180px;background:#1ebb90"></div>
                    </li>
					
                    <li>
						 <p style = "color:#fff;margin-left:20px;margin-top:20px" href="#">Recently Updated Process</p>
					</li>
					<li>
						 <a style = "color:#1ebb90;word-break:break-all;" href="#" ><i class="fa fa-fw fa-square"></i> SSS Educational Loan</a>
					 </li>
					 <li>
						 <a title = "Subscription" style = "color:#1ebb90;word-break:break-all" href="#"><i class="fa fa-fw fa-square"></i> PAG-IBIG Housing Loan</a>
					 </li>
			    </ul>
				
				
			</div>
			     
            <!-- /.navbar-collapse -->
        </nav>
		   

        <div id="page-wrapper">

            <div class="container-fluid">
             <!-- Page Heading -->
      <br/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class = "well">
							<h1 style = "color:#eb477d;text-shadow: 3px 1px 2px #999">
								List Of Requirements
								<!-- <small>Statistics Overview</small> -->
							</h1>
                        </div>
                    </div>
                </div>
                <!-- /.row -->



<br/>
<!-------->
<div class = "row">
  <div class = "col-lg-12">
  

 
<a href="addrequirement.php?pid=<?php echo $pid?>">ADD</a>


  <form method="POST">
  <table>
  <tr>
  <td><label for="val">Search:</label></td>
  <td><input type="text" name="val" id="val" value="<?php if(isset($_POST['val'])){ echo htmlentities($_POST['val']);}?>" required/></td>
  </tr>	
  <tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="search" value="Search"></td>
  </tr>
    </table>
  </form>

<?php if($requirement){?>
<table border=1>
<thead>
<th>&nbsp;</th>
<th>Requirement Name</th>
<th>Copy No.</th>
<th>Created On</th>
</thead>
<?php foreach($requirement as $r){?>
<tr>
<td>
<a href="updaterequirement.php?id=<?php echo $r['reqid']; ?>&pid=<?php echo $pid; ?>">UPDATE</a>
<a href="deleterequirement.php?id=<?php echo $r['reqid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Are You Sure!')">DELETE</a>
</td>
<td><?php echo htmlentities($r['reqname']);?></td>
<td><?php echo htmlentities($r['copyno']);?></td>
<td><?php echo htmlentities($r['createdon']);?></td>
</tr>
<?php }?>
</table>
<?php }
else {
$message="No Process";
}?>
<a href="rspage.php?id=<?php echo $pid;?>">Back</a>
<div> <?php echo $message;?> </div>
  </div>
</div>
</div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
<script src="../js/jquery.min.js"></script> 
<script>
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

</body>

</html>