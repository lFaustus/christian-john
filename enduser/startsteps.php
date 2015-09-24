<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{

	header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$info=user($id);
$ptemplate = listprocesstemplate($id);
$page = $_GET['page'];
$pid = $_GET['pid'];
$sr = "";
$ss = "";
$ctr = 1;
?>

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
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- ADMIN CSS -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>


<body>


   
    <div id="wrapper">
<!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('menu.php'); ?>

 
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: ; text-align: center;" class="panel-heading">
  <h3 style="padding-top: px;"><h2>   <h2>Step Number: <?php echo $page; ?> </h2></h3>
    </div>
    <div style="padding:5px; padding-left: 60px; padding-right: 60px; padding-bottom: px;" class="panel-body">



<div style="text-align: center; ">

   <?php             

$status = 'Active'; 
$targetpage = "startsteps.php";
$limit = 1;
$db = database();
$sql = "SELECT COUNT(*) as num FROM steps WHERE processid = ? AND status = ?";
$st = $db->prepare($sql);
$st->execute(array($pid,$status));
$total_pages = $st->fetch();;
$total_pages = $total_pages['num'];

$stages = 3;

if($page){
$start = ($page - 1) * $limit;
}else{
$start = 0;
}

// Get page data
$sql1 = "SELECT * FROM steps WHERE processid = ? AND status = ? LIMIT $start, $limit";
$st=$db->prepare($sql1);
$st->execute(array($pid,$status));
$result = $st->fetchAll();
$db=null;
// Initial page num setup
if ($page == 0){$page = 1;}
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($total_pages/$limit);
$LastPagem1 = $lastpage - 1;

$paginate = '';
if($lastpage > 1)
{



$paginate .= "<div class='paginate'>";
// Previous
if ($page > 1){
$paginate.= "<a href='$targetpage?page=$prev&pid=$pid'> <<< previous</a>";
}else{
$paginate.= "<a href='startrequirements.php?pid=$pid' />previous</a>"; }

// Pages
if ($lastpage < 7 + ($stages * 2)) // Not enough pages to breaking it up
{
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page){
/*$paginate.= "<span class='current'>$counter</span>";*/
}else{
/*$paginate.= "<a href='$targetpage?page=$counter&pid=$pid'>$counter</a>";*/}
}
}
elseif($lastpage > 5 + ($stages * 2)) // Enough pages to hide a few?
{
// Beginning only hide later pages
if($page < 1 + ($stages * 2))
{
for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
{
if ($counter == $page){
/*$paginate.= "<span class='current'>$counter</span>";*/
}else{
/*$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";*/}
}
/*$paginate.= "...";
$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";*/
}
// Middle hide some front and some back
elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
{
/*$paginate.= "<a href='$targetpage?page=1'>1</a>";
$paginate.= "<a href='$targetpage?page=2'>2</a>";
$paginate.= "...";*/
for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
{
if ($counter == $page){
/*$paginate.= "<span class='current'>$counter</span>";*/
}else{
/*$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";*/}
}
/*$paginate.= "...";
$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";*/
}
// End only hide early pages
else
{
/*$paginate.= "<a href='$targetpage?page=1'>1</a>";
$paginate.= "<a href='$targetpage?page=2'>2</a>";
$paginate.= "...";*/
for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page){
/*$paginate.= "<span class='current'>$counter</span>";*/
}else{
/*$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";*/}
}
}
}

// Next
if ($page < $counter - 1){
$paginate.= "<a id= 'nxt' href='$targetpage?page=$next&pid=$pid'>&nbsp; next >>></a>";
}else{
		$paginate.= "<a id='nxt' href='landingpage.php?pid=$pid'> &nbsp;next</a>";
}

$paginate.= "</div>";

}?>



<?php if($result){?>
<?php foreach($result as $r)
{ ?>
<div>

<?php if($ptemplate){?>
  <?php foreach($ptemplate as $pt){
    $waiting =waitingproductivity($pt['aprocessid']);
    $done =doneproductivity($pt['aprocessid']);
    $undone = undoneproductivity($pt['aprocessid']);
    $total = productcount($pt['aprocessid']);
    $rtotal =productreqcount($pt['aprocessid']);
    $uncheck=productrequncheck($pt['aprocessid']);
    $check=productreqcheck($pt['aprocessid']);
    ?>

    <div style="background-color: #ff7; color: black; text-align: center;" class="alert alert-dismissable alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4> STATUS: </h4>
      <p>WAITING: <?php echo $waiting['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; DONE : <?php echo $done['ide'];?>/<?php echo $total['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; UNDONE : <?php echo $undone['ide'];?></p>
    </div>

  </div>
  <?php }?>
  <?php }?>


<!--   <a >ADD FILE</a> -->


<!-- <div class="alert alert-dismissable alert-warning">

</h2>
</div>
 -->

<h3><?php echo $r['stepdesc']; ?></h3>
<?php $sr = startsteprequire($r['stepid']);

$ss = startsubsteps($r['stepid']); ?>
<?php if($ss){?>
<h1>SUB STEPS</h1>
<?php foreach($ss as $sss){?>
<div>
<h3><?php echo $page?>.<?php echo $ctr?>
<?php echo htmlentities($sss['stepdesc']);$ctr++;?></h3>

</div>
<br/>
<?php }?>
<?php }?>

 <a href="ftagstep.php?page=<?php echo $page;?>&sid=<?php echo $r['stepid'];?>&pid=<?php echo $pid;?>" class="btn btn-default btn-raised">Attach File</a>
<div class="alert alert-dismissable alert-success">
   <?php if($sr){?>
<h1 style="color: #fff;"> STEP REQUIREMENTS</h1>
<ul>
<?php foreach($sr as $rrr){?>
<li><h3><?php echo htmlentities($rrr['reqname']);?></h3></li>
<?php }?>
</ul>
<br/>
<?php }?>
    


<?php }?>
<br />
<span id="stepid" style="display:none;"><?php echo $r['stepid']; ?> </span>
 <input class="status" type="radio" name="status" value="Waiting" <?php if($r['stepstatus'] == 'Waiting'){ echo 'checked';}?> />Waiting
 <input class="status" type="radio" name="status" value="Done" <?php if($r['stepstatus'] == 'Done'){ echo 'checked';}?>/>Done
</div>
<?php }else{ echo "NO STEPS!";}?>	

<div style="font-size:30px">
<?php 
// pagination
echo $paginate;

?>
</div>
<div class="mdi-navigation-arrow-back mdi-2x">
  &nbsp; &nbsp; &nbsp; &nbsp; 
  <div class="mdi-navigation-arrow-forward mdi-2x">
    </div>     
                <div>
                <div>   </div> 
            </div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="2.1.3/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script type="../js/jquery.dataTables.min.js"></script>
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
<script type="text/javascript">
   
  $(function() { 
    var linkurl = $('#nxt').attr('href');
	$('#nxt').attr('href','#');
	
		$('#nxt').click(function(e) {
			var status = $('[name=status]:checked').val(); 
	       
			if(status == undefined){
				alert('Choose status');
				e.preventDefault();	
			}else
			{
			var stepID = $('#stepid').text();
			stepID = parseInt(stepID);
 
			
			$.post('stepchange.php', {stat: status, stID:stepID}, function(data){
			
				var usernameCount = data;
				 
			    if(1 <= usernameCount){
					alert('You Need the previous steps to be Done!');
					e.preventDefault();
				} else {
						window.location.href = linkurl;
				}
				
			}, 'html');}
		});
  });
</script>
</body>

</html>
