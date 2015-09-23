

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<title>EndInMind</title>
	<!--<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/> -->
	
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<link type="text/css" rel="stylesheet" href="colors/corporate/corporate.css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'/>
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="cordova.js"></script>
	<script type="text/javascript" src="js/base.js"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		back.initialize();
		
		
		
		
		
		
	</script>
</head>
<body>
	<div class="pages_container">
    		<div class="logo" style="text-align: center;">
			<a href="#">EndInMind</a>
			<h5>Not a member yet? Join us! <a href="#" onclick='openURL("http://localhost/endinmind2/index.php")'><span class="quote_author" style="color: #60bbce;">www.endinmind.com</span></a></h5> 
		</div>
    		</div>


		<div class="form">
			<div id="login-form">
			
					<label>Username:</label>
					<input type="text" name="username" id="username" value="" class="form_input required" />
					<label>Password:</label>
					<input type="password" name="password" id="password" value="" class="form_input" />
					<br /><br />
					<input type="button" name="submit" class="form_submit radius4 green green_borderbottom" id="submit" value="Login" />
			</div>
			<div id = "loginMessage">
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#submit').click(function(){
						var user = $('#username').val();
						var pass = $('#password').val();
						if(user == null || user == '' || pass == null || pass == ''){
							alert('Invalid Username or Password');
						}
						else{
							$.ajax({
							type: 'POST',
							url: 'userlogin.php',
							data: "username="+user+"&password="+pass,
							success: function(data){
								if(data=='ok'){
									window.location.href = 'usermenu.php';		
								}
								else {
									alert("Invalid Email or Password");
									}
								}		
							});
						}		
					     return false;
						});
					});
					
			</script>
	</div>
</body>
</html>