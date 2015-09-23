<?php
	session_start();
		
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
		require_once('userfunction.php');
		$user = finduser2($username,$password);
		if($user)
		{
			//put some data to session so that
			//we can check that user has login already
			$status = $user['status'];
			$s = findsubs($user['euid']);
			if($status == 'Npaid'){
			 
				echo 'You Need to Subscribed using our Website!';
				
			}
			else if($status == 'Active'){ 
				$date = date('Y-m-d');
				if(strtotime($s['enddate']) <= strtotime($date))
				{
					echo "You need to renew your Account!";
				}
				else{
					$_SESSION['userid'] = $user['euid'];
					$_SESSION['userLogin'] = true;
					echo 'ok';
				}
			}
		}	
		else{
			echo 'Invalid Username and Password!';
			}
	
		
	
	
	
	
	
	
	
		
?>