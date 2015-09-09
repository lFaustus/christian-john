<?php  include('header.php');
 require_once('endinmind.php');

    
  $page = isset($_GET['p']) ? trim($_GET['p']) : 'contact';
  $content = $page.".php";

  if(!file_exists($content))
  {
    $content = "contact.php";
    $page = "contact";
  }
  ?>

<!DOCTYPE html>
  <html lang="en">
<head>
<meta charset="UTF-8">


 <link rel="stylesheet" href="css/style.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

  <br/>
  <br/>

<div class="container"style = "background:#F0FFF0;box-shadow:2px 3px 10px 2px #999; border:solid #999 0.07em">
  <div class = "col-md-12" style ="margin-top:10px; " >
    <form class = "form" role = "form">
    <div class = "header" style = "margin-left:12px;background:#eb477d;"></div>
			<h1 style="color:#eb477d;"><b>Contact Us</b></h1><br>
      
		<div style = "margin-left:15px" class = "text-left">
          <p style = "color:#000000;font-size:15px" ><b>For more info just fill up below form</b></p>
        </div>

		<div class = "col-md-7" style = "margin-top:5px">
			<div class = "row">
				<div style = "margin-bottom:10px" class = "col-md-7">
					<span  style=" color:#000000"><p style="font-size:13px;">Your name <span style="color:red">(required)</span></p></span>   
					<input type = "text" class = "form-control" style = "height:30px"/>
				</div>
			</div>
		<div class = "row">
			<div style = "margin-bottom:10px" class = "col-md-7">
				<span  style=" color:#000000"><p style="font-size:13px;">Your Email <span style="color:red">(required)</span></p></span>   
				<input type = "text" class = "form-control" style = "height:30px"/>
			</div>
		</div>
		<div class = "row">
			<div style = "margin-bottom:10px" class = "col-md-7">
				<span  style=" color:#000000"><p style="font-size:13px;">Subject </p></span>   
				<input type = "text" class = "form-control" style = "height:30px;"/>
			</div>
		</div>
		<div class = "row">
			<div style = "margin-bottom:10px" class = "col-md-7">
				<span  style=" color:#000000"><p style="font-size:13px;">Message</p></span>   
				<textarea class = "form-control" rows = "3"> </textarea>
			</div>
        </div>
         <button type="submit" class = "btn btn-primary btn-sm">Send</button>
		<br/>
		<br/>
	 </div>
      
      <div class =  "col-md-5">
			<div id =  "divContent" style = "background : #fff;height:315px;border: 2px solid grey;margin-bottom:20px;border-color:#eb477d;">
				<br/>
				<div class = "text-center" style = "margin-top:20px">
					<b style = "font-size:20px;text-shadow:1px 2px 1px #999;"><img src="/Emind/img.jpg" width="120px" height="80px";><span style = "color:#eb477d"> WITH US</span></b>
				</div>
         <div class="i" style="align:center; padding-left:50px; padding-top: 30px;">
        <img src="/Emind/facebook.png"align="center" width="50px" height="50px";>
        &nbsp;<a href="http://www.facebook.com/" target="_blank" style="color:#eb477d; font-size:13px; position: static"><u>@endinmind.com</u></a>
        <br>
        <br>
         <img src="/Emind/twitter.png"align="center" width:"50px" height="50px">
          &nbsp;<a href="http://www.twitter.com/" target="_blank" style="color:#eb477d; font-size:13px; position: static"><u>@endinmind.com</u></a>
         </div>
			</div>
      </div>

    </div>
      
    </form> 
      
  </div>
  
   </div>

   </body>
</html>   



        <!-- <a href="#0" class="cd-close-form">Close</a> -->
    

      


 
  <!-- /.container -->
  <!-- script references -->
 

<div class="footer">

 <?php include 'footer.php';?>
</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>
</html>