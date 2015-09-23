<?php
	
	require 'function.php';
	$pl=$_POST['pl'];
	$customer=	$_POST['customer'];
	$no = $_POST['no'];
	$paypal=	$_POST['pay'];
	$p=findplan($pl);
	$amount=$p['rate'] * $no;
	//set your paypal email here
	$your_paypal_email = 'merchantemind@gmail.com';

	//paypal_ipn_url - Explanation: After user successfully paid, paypal will POST transaction details together with the buyer's information(name,email,etc) to this link. so this link will handle every paypal transaction from your website
	$paypal_ipn_url = 'http://10.0.2.2/endinmind2/enduser/paypalipn.php';

	//set sandbox - Explanation: Sandbox means "testing". Set to true if you are trying to pay and see if IPN works perfectly. Set to false if you are ready to accept payments
	$sandbox = true;

	//return link - Explanation: After payment, the buyer or user will be redirected here. This is a "thank you page".
	$return_link = 'http://yourdomainname.com/paypalipn.php';

	//cancel return - Explanation: If buyer hits "Cancel" button on paypal, he will be redirected to this page
	$cancel_return = 'http://yourdomainname.com/your_transaction_was_cancelled.php';

	/*//////////////////////////////////////////
			THIS IS HOW PAYPAL WORKS

		1. User will click pay button on your website
		2. User will be redirected to paypal's payment page
		3. User will enter his paypal information
		4. User will click the "pay now" button after logging in
		5. User will get a confirmation that the payment was successful,
		   then user will be redirected to the RETURN_LINK value.

		After each successful payment, paypal will send trasaction details to your defined PAYPAL_IPN_URL.
		( IPN - Instant Payment Notification )

		*** Question ***
		1. How would your PAYPAL_IPN_URL script know who paid the transaction???
			- Data that will be sent by paypal to your PAYPAL_IPN_URL contains variables, such as Email, Name, Address and more!
			- We can track it by letting our IPN script check the email of the buyer's paypal account(from posted paypal data) and then compare in your database if that email is registered user,
			  HOWEVER, this is not advisable, because it is possible that your user's email address is not the same as his paypal account email.

			
			* So what's the best option? *
  			- We need to add a "custom" value to the paypal FORM, it could be user's username, or user's user_id
			
  			Please check <input type="hidden" name="custom" id="custom" value=""/> below

  			So, if paypal posts data to your PAYPAL_IPN_URL, it will contain the variable "custom"(which is the userid or the username or depends on you),
  			then your script can now determine who paid it :)
  			more information will be on paypalipn.php

		2. How can I test payments if I don't have funds on my paypal account.
			- You don't have to worry. Paypal offers Sandbox. You need to have a paypal account, 
			and then go to http://developer.paypal.com/, login, create account, 
			and add an unlimited $$$ there(but it can only be usable to testing or sandbox mode, you can't use it on other website lol)

	///////////////////////////////////////////*/

	$custom_data = "$customer"; // here you can programmatically change this// explanation on question #1

	//other details
	$product_price = "$amount";
	$product_name = "Renew Subscription";
	$_POST['id']=$customer;
	$_POST['pl']=$pl;
	$_POST['no']=$no;
	updatesubcription($_POST);


	//below is the PAYPAL FORM
?>

<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form" target="_top">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="<?php echo $your_paypal_email ?>">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="no_note" id="no_note" value="1" />
    <input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
    <input type="hidden" name="amount" value="<?php echo $product_price; ?>">
    <input type="hidden" name="return" value="<?php echo $return_link;?>">
    <input type="hidden" name="notify_url" value="<?php echo $paypal_ipn_url;?>">
    <input type="hidden" name="no_shipping" id="no_shipping" value="1" />
    <input type="hidden" name="cancel_return" id="cancel_return" value="<?php echo $cancel_return;?>" />
    <input type="hidden" name="custom" id="custom" value="<?php echo $custom_data; ?>" />
    <input type="submit" name="image_url" id="image_url" value="http://d2beuh40lcdzfb.cloudfront.net/storefront/f96f6454616b063040c2aae92d5ee9857d1d88c3.png" />
    <input type="hidden" name="cbt" id="cbt" value="Go Back" />
<style type="text/css" media="screen">
 <!--
body {
 font-family: Verdana, Arial, Helvetica, sans-serif;
} 
#centered {
 margin: 75px auto;
 width: 740px;
 border: thin solid #333;
 padding: 10px;
 text-align: center;
} 
-->
</style>

<div id="centered">
  <p>Your Subscription is being prepared. If you are not redirected shortly, please click the button below.</p>
  <p><button type="submit">Continue Checkout</button></p>
  <br/><br/>
  <br/><br/>
</div>
</form>
<script type="text/javascript">
	setTimeout(function(){submitForm();},'2500');
	function submitForm(){
		document.getElementById("form").submit();
	}
</script>