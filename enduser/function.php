<?php
session_start();
function database()
{
	$dbinfo = 'mysql://host=localhost;dbname=endinmind';
	$dbuser = 'root';
	$dbpass = '';
	return new PDO($dbinfo,$dbuser,$dbpass);
}
/*function for EndUser*/
function iduser()
{
	
	$db=database();
	$sql="SELECT COUNT(*) AS ide FROM enduser";
	$st=$db->prepare($sql);
	$st->execute();
	$val=$st->fetchAll();
	$db=null;
	return $val;
}
function adduser($info)
{
	$firstname=trim($info['firstname']);
	$lastname=trim($info['lastname']);
	$miname=trim($info['miname']);
	$address=trim($info['address']);
	$contactno=trim($info['contactno']);
	$emailadd=trim($info['emailadd']);
	$user=trim($info['user']);
	$pass1=trim($info['pass1']);
	$bdate=trim($info['bdate']);
	$status="NPain";
	$image="avatar.png";
	$i=iduser();
	if($i)
	{
	foreach($i as $t)
	$id="E".$t['ide'];
	}
	$db	=	database();
	$sql = "INSERT INTO enduser(euid,firstname,lastname,mi,bdate,address,contactno,email,username,password,status,image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	$st	= $db->prepare($sql);
	$st->execute(array($id,$firstname,$lastname,$miname,$bdate,$address,$contactno,$emailadd,$user,$pass1,$status,$image));
	$db = null;
	
		
}
function finduser($info)
{
	$us=trim($info['user']);
	$db=database();
	$sql="SELECT username from enduser WHERE username = ?";
	$st= $db->prepare($sql);
	$st->execute(array($us));
	$v = $st->fetch();
	$db=null;
	return $v;
}
function loginuser($info)
{
		$user=trim($info['user']);
		$pass=trim($info['pass']);
		$db = database();
		$sql = "SELECT * FROM enduser WHERE username=? AND password=?";
		$st = $db->prepare($sql);
		$st->execute(array($user,$pass));
		$user = $st->fetch();
		$db = null;
		return $user;
}
function user($info)
{
	$db=database();
	$sql="SELECT * from enduser WHERE euid = ?";
	$st= $db->prepare($sql);
	$st->execute(array($info));
	$v = $st->fetch();
	$db=null;
	return $v;
}
function updateuser($info)
{
	$firstname=trim($info['firstname']);
	$lastname=trim($info['lastname']);
	$miname=trim($info['miname']);
	$address=trim($info['address']);
	$contactno=trim($info['contactno']);
	$emailadd=trim($info['emailadd']);
	$bdate=trim($info['bdate']);
	$img = trim($info['image']);
	$id=trim($info['id']);

	$db	=	database();
	$sql = "UPDATE enduser SET firstname=?, lastname=?, mi=?, bdate=?, address=?, contactno=?, email=?, image=? WHERE euid = ?";
	$st	= $db->prepare($sql);
	$st->execute(array($firstname,$lastname,$miname,$bdate,$address,$contactno,$emailadd,$img,$id));
	$db = null;	
}
function updateeustatus($id)
{
	$status = "Active";
	$db	=	database();
	$sql = "UPDATE enduser SET status = ? WHERE euid = ?";
	$st	= $db->prepare($sql);
	$st->execute(array($status,$id));
	$db = null;	
}
function deleteuser($id)
{
	$status = "Deactive";
	$db	=	database();
	$sql = "UPDATE enduser SET status = ? WHERE euid = ?";
	$st	= $db->prepare($sql);
	$st->execute(array($status,$id));
	$db = null;
}
function changepassuser($info)
{
	$pass1=trim($info['pass1']);
	$id=trim($info['id']);
	$db	=	database();
	$sql = "UPDATE enduser SET password = ? WHERE euid = ?";
	$st	= $db->prepare($sql);
	$st->execute(array($pass1,$id));
	$db = null;
}
function countprocess()
{	
	$db=database();
	$sql="SELECT COUNT(*) AS ide FROM enduserprocess";
	$st=$db->prepare($sql);
	$st->execute();
	$val=$st->fetchAll();
	$db=null;
	return $val;
}
function addprocess($info)
{
	$processname=trim($info['processname']);
	$scheduletype=' ';
	$recurrence=trim($info['recurrence']);
	$numrecurrence=trim($info['numrecurrence']);
	$agency=trim($info['agency']);

	$startdate='';
	$enddate='';
	$datefinished='';
	$euid=trim($info['id']);
	$datemodified = '';
	$status='Active';
	$i=countprocess();
	if($i)
	{
	foreach($i as $t)
	$id="EP".$t['ide'];
	}
	$db=database();
	$sql="INSERT INTO enduserprocess(euprocessid, processname, schedtype, startdate, enddate, datefinished, euid, recurrence, numrec, createdon, datemodified, agencycopiedfrom, status) VALUES (?,?,?,?,?,?,?,?,?,now(),?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($id,$processname,$scheduletype,$startdate,$enddate,$datefinished,$euid,$recurrence,$numrecurrence,$datemodified,$agency,$status));
	$db=null;
}
function listprocess($i)
{
	$id=$i;
	$status='Active';
	$db=database();
	$sql="SELECT * FROM enduserprocess WHERE euid = ? AND status = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id,$status));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function searchprocess($info)
{
	$val=trim($info['val']);
	$val="%$val%";
	$id=trim($info['id']);
	$status='Active';
	$db=database();
	$sql="SELECT * FROM enduserprocess WHERE processname LIKE ? AND euid = ? AND status = ?";
	$st=$db->prepare($sql);
	$st->execute(array($val,$id,$status));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function process($id)
{
	
	$db=database();
	$sql="SELECT * FROM enduserprocess WHERE euprocessid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$eu=$st->fetch();
	$db=null;
	return $eu;
}

function updateprocess($info)
{
	$processname=trim($info['processname']);
	$recurrence=trim($info['recurrence']);
	$numrecurrence=trim($info['numrecurrence']);
	$agency=trim($info['agency']);
	$scheduletype=' ';
	$status='Active';
	$id=trim($info['id']);
	$pid=trim($info['pid']);
	$db=database();
	$sql="UPDATE enduserprocess SET processname=?,schedtype=?,recurrence=?,numrec=?,datemodified=now(),agencycopiedfrom=? WHERE euprocessid=? and euid=? and status = ?";
	$st=$db->prepare($sql);
	$st->execute(array($processname,$scheduletype,$recurrence,$numrecurrence,$agency,$pid,$id,$status));
	$db=null;
}
function deleteprocess($id)
{	
	$status='Deactivated';
	$db=database();
	$sql="UPDATE enduserprocess SET status=? WHERE euprocessid=?";
	$st=$db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}
function addrequirements($info)
{
	$requirement = trim($info['requirement']);
	$copy = trim($info['copy']);
	$createdon=date('y-m-d');

	$notes='';
	$status='unchecked';
	$pid=trim($info['pid']);

	$db=database();
	$sql="INSERT INTO requirements(reqname, createdon, copyno, notes, reqstatus, processid) VALUES (?,?,?,?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($requirement,$createdon,$copy,$notes,$status,$pid));
	$db=null;
}
function listrequirement($p)
{
	
	$pid=$p;
	$db=database();
	$sql="SELECT * FROM requirements WHERE processid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($pid));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function searchrequirement($info)
{
	$val=trim($info['val']);
	$val="%$val%";
	$id=trim($info['pid']);

	$db=database();
	$sql="SELECT * FROM requirements WHERE reqname LIKE ? AND processid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($val,$id));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function reqname($p,$reqname)
{
	$pid=$p;
	$db=database();
	$sql="SELECT * FROM requirements WHERE reqname = ? AND processid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($reqname,$pid));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function requirement($id)
{
	$db=database();
	$sql="SELECT * FROM requirements WHERE reqid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$eu=$st->fetch();
	$db=null;
	return $eu;
}
function updaterequirement($info)
{
	$requirement=trim($info['requirement']);
	$copy=trim($info['copy']);
	$rid=trim($info['rid']);
	$db=database();
	$sql="UPDATE requirements SET reqname=?,copyno=? WHERE reqid=?";
	$st=$db->prepare($sql);
	$st->execute(array($requirement,$copy,$rid));
	$db=null;
}
function deleterequirement($id)
{
	
	$db=database();
	$sql="DELETE FROM requirements WHERE reqid=?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$db=null;
}
function addstep($info)
{
	$stepdesc=trim($info['steps']);
	$stepstatus='hold';
	$step='Active';
	$pid=trim($info['pid']);
	$id=$pid;
	$parentstepid='';
	$createdon=date('y-m-d');
	$seqid=countstep($pid);
	$sq=$seqid['ide'];
	$db=database();
	$sql="INSERT INTO steps(stepdesc,stepseqno,createon,stepstatus,parentstepid,processid,status) VALUES(?,?,?,?,?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($stepdesc,$sq,$createdon,$stepstatus,$parentstepid,$pid,$step));
	$db=null;
}
function liststep($pid)
{
	$status ='Active';
	$db=database();
	$sql="SELECT * FROM steps WHERE processid = ? AND status = ?";
	$st=$db->prepare($sql);
	$st->execute(array($pid,$status));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function step($id)
{
	$db=database();
	$sql="SELECT * FROM steps WHERE stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$eu=$st->fetch();
	$db=null;
	return $eu;
}
function countstep($id)
{
	
	$db=database();
	$sql="SELECT COUNT(*)+1 as ide FROM steps WHERE processid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$eu=$st->fetch();
	$db=null;
	return $eu;
}
function deletestep($id)
{

	$status ='Deactivated';
	$db=database();
	$sql="UPDATE steps SET status = ? WHERE stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}
function searchstep($info)
{
	$val=trim($info['val']);
	$val="%$val%";
	$id=trim($info['pid']);
	$status='Active';
	$db=database();
	$sql="SELECT * FROM steps WHERE stepdesc LIKE ? AND processid = ? AND status = ?";
	$st=$db->prepare($sql);
	$st->execute(array($val,$id,$status));
	$eu=$st->fetchAll();
	$db=null;
	return $eu;
}
function updatestep($info)
{
	$id=trim($info['sid']);
	$stepdesc=trim($info['steps']);
	$db=database();
	$sql="UPDATE steps SET stepdesc = ? WHERE stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($stepdesc,$id));
	$db=null;
}
function addsteprequirement($info)
{

	$stid=trim($info['sid']);
	foreach($info['requirement'] as $c){
		$db=database();
			$sql="INSERT INTO steprequired(stepid,reqid) VALUES(?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($stid,$c));
	$db=null;
	}
}
function reqcompare($rid,$sid)
{
	$db=database();
	$sql="SELECT * FROM steprequired WHERE stepid = ? AND reqid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($sid,$rid));
	$req = $st->fetchAll(); 
	$db=null;
	return $req;
}
function steprequirement($sid)
{
	$db=database();
	$sql="SELECT r.reqname,s.steprequiredid FROM steprequired s JOIN requirements r ON s.reqid = r.reqid WHERE s.stepid=?";
	$st=$db->prepare($sql);
	$st->execute(array($sid));
	$req = $st->fetchAll(); 
	$db=null;
	return $req;
}
function deletesteprequired($id)
{
	$db=database();
	$sql="DELETE FROM steprequired WHERE steprequiredid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$db=null;
}
function addsteprequisite($info)
{
	$requisite=trim($info['requisite']);
	$sid=trim($info['sid']);
	$step=trim($info['step']);
	$db = database();
	$sql="INSERT INTO stepscopre(stepid,type,coprestepid) VALUES(?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($sid,$requisite,$step));
	$db=null;
}
function trapreq($id)
{
	$db = database();
	$sql="SELECT * FROM stepscopre WHERE coprestepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$s=$st->fetchAll();
	$db=null;
	return $s;
}
function listrequisite($id)
{
	$status="Active";
	$db = database();
	$sql="SELECT s.stepdesc, c.type, c.copreid FROM stepscopre c JOIN steps s ON s.stepid = c.coprestepid WHERE s.status = ? AND c.stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($status,$id));
	$copre=$st->fetchAll();
	$db=null;
	return $copre;
	
}
function forrequisite($id)
{
	$db = database();
	$sql="SELECT * FROM stepscopre WHERE copreid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$re = $st->fetch();
	$db=null;
	return $re;	
}
function updaterequisite($info)
{
	$rcp=trim($info['requisite']);
	$s=trim($info['step']);
	$i=trim($info['i']);
	$db = database();
	$sql="UPDATE stepscopre SET type = ?, coprestepid = ? WHERE copreid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($rcp,$s,$i));
	$db=null;

}
function deleterequisite($id)
{
	$db = database();
	$sql="DELETE FROM stepscopre WHERE copreid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$db=null;

}
function addsubsteps($info)
{
	$stepdesc=trim($info['steps']);
	$stepstatus='hold';
	$step='Active';
	$pid=trim($info['pid']);
	$parentstepid=trim($info['id']);
	$createdon=date('y-m-d');
	$seqid=0;
	$db = database();
	$sql="INSERT INTO steps(stepdesc,stepseqno,createon,stepstatus,parentstepid,processid,status) VALUES(?,?,?,?,?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($stepdesc,$seqid,$createdon,$stepstatus,$parentstepid,$pid,$step));
	$db=null;
}
function listsubsteps($id)
{
	$status="Active";
	$db = database();
	$sql="SELECT * FROM steps WHERE parentstepid = ? AND status = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id,$status));
	$ss=$st->fetchAll();
	$db=null;
	return $ss;
}
function forsubsteps($id)
{
	$db = database();
	$sql="SELECT * FROM steps WHERE stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$ss =$st->fetch(); 
	$db=null;
	return $ss;
}
function updatesubsteps($info)
{
	$id=trim($info['sid']);
	$stepdesc=trim($info['steps']);
	$db=database();
	$sql="UPDATE steps SET stepdesc = ? WHERE stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($stepdesc,$id));
	$db=null;
}
function deletesubsteps($id)
{
	$status="Deactivated";
	$db = database();
	$sql="UPDATE steps SET status = ? WHERE stepid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}
function plan()
{
	$type='EndUser';
	$db = database();
	$sql="SELECT * FROM plan WHERE usertype = ?";
	$st=$db->prepare($sql);
	$st->execute(array($type));
	$p = $st->fetchAll();
	$db=null;
	return $p;
}
function subcription($info)
{
	$pid=trim($info['pl']);
	$ue = trim($info['id']);
	$p=findplan($pid);
	$d = date('y-m-d');
	$date=date_create("$d");
	$no=trim($info['no']);
	if($p['plandesc'] == "Monthly")
	{
	date_add($date,date_interval_create_from_date_string("$no month"));
	}
	else
	{
		date_add($date,date_interval_create_from_date_string("$no year"));
	}
	$end =date_format($date,"Y-m-d");
	$pay=trim($info['pay']);
	$total = $p['rate'] * $no; 
	$status = "Active";
	$db = database();
	$sql="INSERT INTO subscription(subscribedby,planid,numsubscription,totalamount,paypalactno,dateapplied,startdate,enddate,status) VALUES(?,?,?,?,?,?,?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($ue,$pid,$no,$total,$pay,$d,$d,$end,$status));
	$db=null;
}
function updatesubcription($info)
{
	$pid=trim($info['pl']);
	$ue = trim($info['id']);
	$p=findplan($pid);
	$d = date('y-m-d');
	$date=date_create("$d");
	$no=trim($info['no']);
	if($p['plandesc'] == "Monthly")
	{
	date_add($date,date_interval_create_from_date_string("$no month"));
	}
	else
	{
		date_add($date,date_interval_create_from_date_string("$no year"));
	}
	$end =date_format($date,"Y-m-d");
	$pay=trim($info['pay']);
	$total = $p['rate'] * $no;
	$sub=findsubs($ue);
	$ttotal = $sub['total'] + $total; 
	$status = "Active";
	$db = database();
	$sql="UPDATE subscription SET planid = ?, numsubscription = ? , totalamout = ?, paypalactno = ?, startdate = ?, enddate=? WHERE subscribedby = ?";
	$st=$db->prepare($sql);
	$st->execute(array($pid,$no,$ttotal,$pay,$d,$end,$ue));
	$db=null;
}
function findsubs($id)
{
	$db = database();
	$sql="SELECT * FROM subscription WHERE subscribedby = ?";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$sub = $st->fetch();
	$db=null;
	return $sub;
}
function findplan($id)
{
	$type='EndUser';
	$db = database();
	$sql="SELECT * FROM plan WHERE planid";
	$st=$db->prepare($sql);
	$st->execute(array($id));
	$p = $st->fetch();
	$db=null;
	return $p;
}
function approveeu($id)
{
	$status = "Active";
	$db = database();
	$sql="UPDATE enduser SET status = ? WHERE euid = ?";
	$st=$db->prepare($sql);
	$st->execute(array($status,$id));
	$db = null;
	
}
?>