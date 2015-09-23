<?php
	if(!empty($_POST)){ // checks if there are data posted..

		$sandbox = true;

		ini_set('log_errors', true);
		ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');

		include 'ipnlistener.php'; //the class the handles paypal IPN

		$listener = new IpnListener();
		$listener->use_sandbox = $sandbox;

		try{
		    $listener->requirePostMethod();
		    $verified = $listener->processIpn($post);
		}catch(Exception $e){
		    error_log($e->getMessage());
		    return $e->getMessage();
		}

		//check if data posted is validated by paypal or not
		if($verified){
			extract($post);

		    $errmsg = '';
		    $username = $custom; //see! we can track it! lol
		    
		    //you can go here to see the list of paypal variables
		    // ---> https://developer.paypal.com/docs/classic/ipn/integration-guide/IPNandPDTVariables/

		    //also, DO NOT FORGET TO check if AMOUNT PAID BY USER is EQUALS TO YOUR SUBSCRIPTION AMOUNT
		    //sample 
		    //$mc_gross is paypal's variable "Full amount of the customer's payment, before transaction fee is subtracted."
		    if($mc_gross != $_POST['amount']) //where 10.00 is your subscription fee or product price. you must update this and on the paypal form, they must match
		    {
		    	exit("Invalid payment amount!");
		    	//edi wow
		    }
			else
			{
				echo "VALID";
			}
		    //do the codes after this line!!
		    //also, 
		    //you can now UPDATE the users's status to PAID!
		    //easy! right??

		} else {
		    // manually investigate the invalid IPN
		    error_log($listener->getTextReport());
		    return "Invalid Transaction!";
		}
	}

?>