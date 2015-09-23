<?php
	include_once('userfunction.php');
	$role = $_GET['role'];
	
	
	
	if($role == 'agencylist'){
		  $list = agency();
			if($list){
				foreach($list as $rows)
				{
	  				$d = date('Y-m-d');
	  				$sss = findsubs($rows['agencyid']);
	  				if(strtotime($d) >= strtotime($sss['enddate'])){}
	  				else
	  				{
					
					echo "<div id = 'divList' onclick = " . '"' . "getProcess('" .$rows['agencyid'] ."')" .'"'.">";	
				    echo "<b id = 'boldName'>" . $rows['agencyname'] . "</b></div><hr/>";
	  				}
				}
				
			
			}
			else{
					echo "<div id = 'divListEmpty'>";	
					echo "<b id = 'boldName'>" . "No Entry of Process Yet!!!</b></div>";
			    }
	    							
	}
	else if($role == 'processlist'){
		$agencyid = $_GET['agencyid'];
		$process = agencyListProcess($agencyid);
			if($process){
				foreach($process as $p){
					$val = checksubs($p['aprocessid'],$id);
					if($val){}
					else{
					echo "<div id = 'divList' onclick = " . '"' . "alert('" .$p['aprocessid'] ."')" .'"'.">";	
				    echo "<b id = 'boldName'>" . $p['processname'] . "</b></div><hr/>";
					}
				}
			}
		    else{
			 
			}
		 echo "<button type='submit'  onclick = " . '"' . "agencyList('" . $p['aprocessid'] ."')" .'"' . "class='"."form_submit radius4 green green_borderbottom'" .">" . "<b style = 'weight:bold;font-size:20px,text-shadow:2px 1px 3px 2px'>BACK</b>" . "</button>";
			
			
		

		
	
			
	
	    
	}

?>