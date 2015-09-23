<?php
session_start();
function database()
{
	$dbinfo = 'mysql://host=localhost;dbname=endinmind';
	$dbuser = 'root';
	$dbpass = '';
	return new PDO($dbinfo,$dbuser,$dbpass);
}
function findadmin($info)
{
	$us=trim($info['username']);
	$db=database();
	$sql="SELECT username FROM admin WHERE username = ?";
	$st= $db->prepare($sql);
	$st->execute(array($us));
	$v = $st->fetch();	
	$db=null;
	return $v;
}
function addadmin($info)
{
	$name=trim($info['name']);
	$username=trim($info['username']);
	$password=trim($info['password']);
	$image="avatar.png";
	$status="Active";
	$db=database();
	$sql="INSERT INTO admin(name,username,password,image,status) VALUES(?,?,?,?,?)";
	$st=$db->prepare($sql);
	$st->execute(array($name,$username,$password,$image,$status));
	$db=null;
}
function loginadmin($info)
{
	$user=trim($info['username']);
	$pass=trim($info['password']);
	$db=database();
	$sql="SELECT * FROM admin WHERE username = ? AND password = ?";
	$st=$db->prepare($sql);
	$st->execute(array($user,$pass));
	$user= $st->fetch();
	$db=null;
	return $user;
	
}
function admin($info)
{
	$db=database();
	$sql="SELECT * FROM admin WHERE id = ?";
	$st= $db->prepare($sql);
	$st->execute(array($info));
	$v = $st->fetch();
	$db=null;
	return $v;
}
function updateadmin($info)
{
	$image=trim($info['image']);
	$id=trim($info['id']);
	$name=trim($info['name']);
	$db=database();
	$sql="UPDATE admin SET name = ?, image = ? WHERE id = ?";
	$st= $db->prepare($sql);
	$st->execute(array($name,$image,$id));
	$db=null;
}
function changepassadmin($info)
{
	$pass1=trim($info['pass1']);
	$id=trim($info['id']);
	$db	=	database();
	$sql = "UPDATE admin SET password = ? WHERE id = ?";
	$st	= $db->prepare($sql);
	$st->execute(array($pass1,$id));
	$db = null;
}
/*Open for function for plan*/
function addplan($info)
{
	$desc = trim($info['desc']);
	$rate = trim($info['rate']);
	$usertype = trim($info['usertype']);
	$status = "Active";
	$db = database();
	$sql = "INSERT INTO plan(plandesc,rate,usertype,status) VALUES(?,?,?,?)";
	$st = $db->prepare($sql);
	$st->execute(array($desc, $rate, $usertype, $status));
	$db = null;
	return "Success";
}

//// plan reports

function planreports($info)
{
	$db=database();
	$sql="SELECT * FROM subscription WHERE id = ?";
	$st= $db->prepare($sql);
	$st->execute(array($info));
	$v = $st->fetch();
	$db=null;
	return $v;
}





function listplan()
{
	$db = database();
	$sql = "SELECT * FROM plan";
	$st = $db->prepare($sql);
	$st->execute();
	$plan= $st->fetchAll();
	$db = null;
	return $plan;
}

function deleteplan($id)
{
		$db = database();
	$sql = "DELETE FROM plan WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($id));
	$db = null;
	
}
function selectplan($id)
{
	$db = database();
	$sql = "SELECT * FROM plan WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($id));
	$plan= $st->fetch();
	$db = null;
	return $plan;
}
function updateplan($info)
{
	$desc = trim($info['desc']);
	$rate = trim($info['rate']);
	$usertype = trim($info['usertype']);
	$id = trim($info['idno']);
	$db = database();
	$sql = "UPDATE plan SET plandesc=?, rate=?, usertype=?  WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($desc, $rate, $usertype,$id));
	$db = null;
	
}
function searchplan($info)
{
	$value=trim($info['value']);
	$value="%$value%";
		$db = database();
	$sql = "SELECT * FROM plan WHERE plandesc LIKE ? OR usertype LIKE ? OR status LIKE ?";
	$st = $db->prepare($sql);
	$st->execute(array($value,$value,$value));
	$plan= $st->fetchAll();
	$db = null;
	return $plan;
}

function plan($info)
{
	$val=trim($info['desc']);
	$db = database();
	$sql = "SELECT * FROM plan WHERE plandesc = ?";
	$st = $db->prepare($sql);
	$st->execute(array($val));
	$plan= $st->fetch();
	$db = null;
	return $plan;
}
/*End function for plan*/
/* function for agency */

function pendingagency()
{
	$status='Pending';
	$db = database();
	$sql = "SELECT * FROM agency WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}
function updateagency($id)
{
	$status="NPaid";
	$db=database();
	$sql="UPDATE agency SET status =? WHERE agencyid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}

////// notification sa agency kung mo register //////

function notify_adminToagency(){
	$db = database();
	$status = "pending";
	// $npaid  = 'NPaid';

	$sql = $db->prepare('select count(agencyid) as agency_pending from agency where status="pending"');
	$sql->execute();
	return $sql->fetchAll();
	$db = null;
}
////// end /////////



//notif sa not yet registered nga agencies ngadto sa admin/////
function notify_NYS(){
	$db = database();
	$status = "NPaid";

	$sql = $db->prepare('select  agencyname,status from agency where status="pending"');
	$sql->execute();
	return $sql->fetchAll();
	$db = null;
}
////end////

function activeagency()
{
	$status='Active';
	$db = database();
	$sql = "SELECT * FROM agency WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}
function deactiveagency($id)
{
	$status="Deactivate";
	$db=database();
	$sql="UPDATE agency SET status =? WHERE agencyid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}
function deactivatedagencies()
{
	$status='Deactivate';
	$db = database();
	$sql = "SELECT * FROM agency WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}
function activategencies($id)
{
		$status="Active";
	$db=database();
	$sql="UPDATE agency SET status =? WHERE agencyid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}
function npaidagencies()
{
	$status='NPaid';
	$db = database();
	$sql = "SELECT * FROM agency WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}
function npaiduser()
{
	$status='NPaid';
	$db = database();
	$sql = "SELECT * FROM enduser WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}

function activeuserlist()
{

	$db = database();
	$sql = "SELECT * FROM enduser";
	$st = $db->prepare($sql);
	$st->execute();
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}


function activeuser()
{
	$status='Active';
	$db = database();
	$sql = "SELECT * FROM enduser WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}

function deactivatedeu($id)
{
	$status="Deactive";
	$db=database();
	$sql="UPDATE enduser SET status =? WHERE euid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}

function deactivateduser()
{
	$status='Deactive';
	$db = database();
	$sql = "SELECT * FROM enduser WHERE status = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}
function activateeu($id)
{
	$status="Active";
	$db=database();
	$sql="UPDATE enduser SET status =? WHERE euid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($status,$id));
	$db=null;
}
/* End function for agency*/

//plan reports
function plnreports($info, $user)
{

	$db=database();
	$sql="SELECT count(planid) as num_subscribers, usertype from plan where plandesc = ? and usertype = ? ";
	$st= $db->prepare($sql);
	$st->execute(array($info, $user));
	$v = $st->fetchAll();
	$db=null;
	return $v;
}



function allAgencies()
{
	
	$db = database();
	$sql = "SELECT * FROM agency";
	$st = $db->prepare($sql);
	$st->execute();
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}



// plan reports classified by monthly and yearly 
function plnAG($planid) //mmonthly and yearly agency
{
	
	$db = database();
	$sql = "SELECT a. *, b. * FROM agency a inner join  subscription b ON a.agencyid = b.subscribedby inner join plan c on b.planid = c.planid where c.planid=?";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;


}






function plnEU($planid) //monthly and yearly end user
{
	
	$db = database();
	$sql = "SELECT a. *, b. * FROM enduser a inner join  subscription b ON a.euid = b.subscribedby inner join plan c on b.planid = c.planid where c.planid=?";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;


}



function reportsmonthlyAG()
{
	$planid='1';
	$db = database();
	$sql = "SELECT * FROM subscription WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}



function reportsyearlyAG()
{

	$planid='2';
	$db = database();
	$sql = "SELECT * FROM subscription WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}


function reportsmonthlyEU()
{
	$planid='3';
	$db = database();
	$sql = "SELECT * FROM subscription WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}

function reportsyearlyEU()
{

	$planid='4';
	$db = database();
	$sql = "SELECT * FROM subscription WHERE planid = ?";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;
}




// end of plan reports

function plansinventory()
{

	$db = database();
	$sql = "SELECT * FROM subscription where totalamount =";
	$st = $db->prepare($sql);
	$st->execute(array($planid));
	$ag= $st->fetchAll();
	$db = null;
	return $ag;

}

?>