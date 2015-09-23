<?php
require 'function.php';
$login=$_SESSION['islogin'];
if($login)
{
    $id=$_SESSION['id'];
    $info=admin($id);
    $plan=listplan();
if(isset($_POST['search']))
{
    $plan = searchplan($_POST);
}

}
if(isset($_POST['add']))
{
  $p=plan($info);
  if(trim($_POST['desc']) == false)
  {
    $message="Input Plan Description";
  }
  else if(trim($_POST['rate']) == false)
  {
    $message="Input Rate";
  }
  else if($p)
  {
    $message="Plan Description is already exist";
  }
  else
  {
  $message=addplan($_POST);
  header('location:listplan.php');
  }
}
    $noti = notify_adminToagency();
    $noti1 = notify_NYS();

?>





<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Profile</title>

    <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/admin.css" rel="stylesheet">


    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

</head>
<body>

    <div id="wrapper">
<!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('sidebar-admin.php'); ?>

 
 <div style="margin-left:30px; margin-right:30px;">

                <div  class="panel panel-info">
    <div style="padding-bottom: 80px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Plan List</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; " class="panel-body">


<button class="btn btn-info" data-toggle="modal" data-target="#complete-dialog"> Add Plan</button>
            <?php if($plan){?>
             <div class = "table-responsive">
                  <table class="table table-striped table-hover ">
                <table id="table_id" class="display">
       

     
            <thead>  
          <tr>  
    
            <th>Actions</th>  
            <th>Plan ID</th>  
            <th>Description</th>  
            <th>Rate</th>  
           <th>User Type</th>
           <th>Status</th>
          </tr>  
        </thead>  
        
        <tfoot>
             <tr>  
    
            <th>Actions</th>  
            <th>Plan ID</th>  
            <th>Description</th>  
            <th>Rate</th>  
           <th>User Type</th>
           <th>Status</th>
          </tr>  
        </tfoot>
        <tbody>  
            <?php foreach($plan as $a){?>
          <tr>  

            </td>  
            <td>
            <a href="updateplan.php?id=<?php echo $a['planid'];?>" style="color: green;" class="mdi-editor-mode-edit" ></a> &nbsp; &nbsp;
             <a onclick="return confirm('Delete?');" href="deleteplan.php?id=<?php echo $a['planid'];?>" style="color: tomato;"class="mdi-action-delete" ></a>

            </td>  
            <td><?php echo $a['planid'];?></td>  
            <td><?php echo $a['plandesc'];?></td>  
            <td><?php echo $a['rate'];?></td>
            <td><?php echo $a['usertype'];?></td>
            <td><?php echo $a['status'];?></td>
          </tr>  
          <?php }?>
            </tbody>  
      </table> 

<?php }
else {
$message = "No Unsubscribe Agencies";
}?>


<!--  <div style="background-color: #fff; border-bottom: 2px solid #eee; color:black; padding: 20px; text-align:center; font-size:200%; margin-top: 20px; color: #555;"><h3> 
<?php echo $message; ?></h3></div>   -->



        <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  






<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

  

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>



<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>






<div id="complete-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Plan</h4>
      </div>
      <div class="modal-body">
        

        <form method="POST">
        <div class="col-xs-13">
            <center>
           <!--  <div style="background-color: #fff; color:red; padding: 50px; text-align:center; font-size:100%;"> <?php echo $message; ?></div> -->
              <label for="desc"><h4> Plan Description <span>*</span></h4></label>
           
        <div class="sample">
            <select name="desc"class="form-control">
            <option value="Monthly ">Monthly</option>
            <option value="Yearly">Yearly</option>
              </select>
             
             <label for="rate"><h4>Rate <span>*</span></h4></label>
            <input class="form-control" type="number" name="rate" id="rate" value="<?php if(isset($_POST['rate'])){ echo htmlentities($_POST['rate']);}?>" required />
           
            <label for=""><h4>User Type <span>*</span></h4></label>
           
         

         <div class="sample">
  <select name="usertype"class="form-control">
    <option value="Agency">Agency</option>
    <option value="Enduser">End User</option>
  </select>



       
        <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;
  &nbsp;
  
            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
          </div>
        </center>
        
        </div>



</form>


      </div>
      <div class="modal-footer">
    
      </div>
    </div>
  </div>
</div>



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
