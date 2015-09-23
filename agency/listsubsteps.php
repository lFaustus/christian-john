<?php require 'function.php'; $message="" ; $flag=0; $login=$_SESSION[ 'islogin']; if($login) { $id=$_SESSION[ 'id']; $info=agency($id); $sid=$_GET[ 'id']; $pid=$_GET[ 'pid']; $substep=listsubsteps($sid); if(isset($_POST[ 'add'])) { if(trim($_POST[ 'steps'])==false) { echo "<script type='text/javascript'>alert('Enter A Step');</script>"; } else { $_POST[ 'id']=$sid; addsubsteps($_POST); echo "<script type='text/javascript'>alert('Step Added Added');</script>"; header( "location:listsubsteps.php?id=$sid&pid=$pid"); exit(); } } } else { header( 'location:../intro.php'); exit; } ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - ENDINMIND</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="dist/css/material.css">
    <link rel="stylesheet" type="text/css" href="dist/css/material.min.css">

    <!-- MATERIAL CSS -->
    <!--   <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/> -->

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ADMIN CSS -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

</head>


<body>



    <div id="wrapper">
        <!-- TOP NAV BAR -->

        <?php include ( 'nav.php'); ?>

        <!-- //END OF TOP NAV BAR -->


        <!-- Sidebar inclusion -->
        <?php include ( 'sidebar-agency.php'); ?>


        <div style="margin-left:30px; margin-right:30px;">


            <div class="panel panel-info">
                <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
                    <h3 style="padding-top: 30px; " class="panel-title mdi-action-assignment mdi-4x"><h2> List of Substep</h2></h3>
                </div>
                <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

                    <button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#sub-steps"></button>





                    <?php if($substep){?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover ">
                            <table id="add" class="display">



                                <thead>
                                    <th>Actions</th>
                                    <th>Steps</th>
                                    <th>createdon</th>
                                </thead>

                                <?php foreach($substep as $s){?>
                                <tr>
                                    <td>

                                        <a class="mdi-content-create" href="updatesubstep.php?i=<?php echo $s['stepid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>"></a> &nbsp; &nbsp;
                                        <a class="mdi-action-delete" href="deletesubsteps.php?i=<?php echo $s['stepid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>"></a>



                                    </td>

                                    <td>
                                        <?php echo $s[ 'stepdesc'];?>
                                    </td>
                                    <td>
                                        <?php echo $s[ 'createon'];?>
                                    </td>

                                </tr>

                                <?php }?>
                            </table>

                            <?php } else { echo "<div>No Requirements</div>"; }?>

                            <a href="liststeps.php?id=<?php echo $pid;?>">Back</a>
                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->





    <!-- MODAL CREATE PROCESS -->


    <div id="sub-steps" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    <h4 class="modal-title">Add Substep</h4>
                </div>
                <div class="modal-body">

                    <form method="POST">


                        <label>Steps:</label>
                        <textarea class="form-control" name="steps" value="<?php if(isset($_POST['steps'])){ echo htmlentities($_POST['steps']);}?>" required></textarea>


                        <div style="margin-top: 20px;">
                            <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add" /> &nbsp; &nbsp;

                            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
                        </div>
                        </form>

                </div>



            


            </div>
            <div class="modal-footer">
            </div>
        </div>


        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- DataTables CSS -->

        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="css/jquery-1.10.2.min.js"></script>

        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="css/jquery.dataTables.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#add').DataTable();
            });
        </script>

</body>

</html>