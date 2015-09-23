<?php

$stat = "DONE";
$stat1 = "Active";
  $status = $_POST['stat'];
  $sID =  $_POST['stID'];
  $db= new PDO('mysql://host=localhost;dbname=endinmind','root','');
  $sql1 = "SELECT s.stepstatus FROM steps s JOIN stepscopre scp ON s.stepid = scp.coprestepid WHERE scp.stepid = ? AND s.stepstatus != ? AND s.status = ?";
  $st = $db->prepare($sql1);
  $st->execute(array($sID,$stat,$stat1));
  $spc = $st ->fetchAll();
  $db = null;
  
  if($spc)
  {
	  $countspc = count($spc);
	  echo $countspc;
  }
  else
  {
	   $db= new PDO('mysql://host=localhost;dbname=endinmind','root','');
  $sql="UPDATE steps SET stepstatus = ? WHERE stepid = ?";
  $st = $db->prepare($sql);
  $st->execute(array($status,$sID));
  $db = null; 
  }

  /* we are just checking the username */
/*$checkUser = "SELECT `username` ";
$checkUser .= "FROM `database`.`table` ";
$checkUser .= "WHERE `username` = '".$_POST['new_user']."' ";
if(!($check = mysql_query($checkUser, $dbc))){
    echo mysql_errno();
    exit();
}
$userCount = mysql_num_rows($check);
echo $userCount;*/
?>