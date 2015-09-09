<?php  include('header.php');
 require_once('endinmind.php');

    
  $page = isset($_GET['p']) ? trim($_GET['p']) : 'uregistration';
  $content = $page.".php";

  if(!file_exists($content))
  {
    $content = "uregistration.php";
    $page = "uregistration";
  }
  ?>
  <head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> 
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"><!-- Gem style -->
  <script src="js/modernizr.js"></script>
  </head>
  <br/>
  <br/>
  <div class = "container" style = "background:#F0FFF0;box-shadow:2px 3px 10px 2px #999; border:solid #999 0.07em">
  <div class = "col-md-12" style ="margin-top:30px">
    <form class = "form" role = "form">
        <div style = "margin-left:15px" class = "text-left">
          <h2><b style = "color:#eb477d;font-size:20px" >Registration</b></h2>

        </div>

      <div class = "col-md-4" style = "margin-top:15px">
         
        <div style = "margin-bottom:10px" class = "input-group">
          <span class = "input-group-addon" style=" color:#eb477d"><i class = "glyphicon glyphicon-pencil"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Firstname"/>
        </div>
        <div style = "margin-bottom:10px" class = "input-group">
          <span class = "input-group-addon" style=" color:#eb477d"><i class = "glyphicon glyphicon-pencil"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Lastname"/>
        </div>
        <div style = "margin-bottom:10px" class = "input-group">
          <span class = "input-group-addon" style=" color:#eb477d"><i class = "glyphicon glyphicon-pencil"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Middle Initial"/>
        </div>
        <div style = "margin-bottom:10px" class = "input-group">
          <span class = "input-group-addon" style=" color:#eb477d"><i class="glyphicon glyphicon-home"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Address"/>
        </div>
        
        <div class = "input-group" style = "margin-bottom:10px">
          <span class = "input-group-addon" style=" color:#eb477d"><i class = "glyphicon glyphicon-earphone"></i></span>
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Contact No."/>
        </div>
      </div>
      <div class = "col-md-4" style = "margin-top:15px">
        <div style = "margin-bottom:10px" class = "input-group">
          <span class = "input-group-addon"style=" color:#eb477d"><i class = "glyphicon glyphicon-envelope"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Email"/>
        </div>
        <div style = "margin-bottom:10px" class = "input-group">
          <span class = "input-group-addon" style=" color:#eb477d"><i class = "glyphicon glyphicon-user"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Username"/>
        </div>
        
        <div class = "input-group" style = "margin-bottom:10px">
          <span class = "input-group-addon"style=" color:#eb477d"><i class = "glyphicon glyphicon-lock"></i></span>
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Password"/>
        </div>
        <div style = "margin-bottom:10px" class =   "input-group">
          <span class = "input-group-addon"style=" color:#eb477d"><i class = "glyphicon glyphicon-lock"></i></span>   
          <input type = "text" class = "form-control" style = "height:45px" placeholder = "Retype Password"/>
        </div>
        
      </div>
      <div class = "col-md-4" style = "margin-bottom : 20px;background : #ffffff;height:315px;border: 2px solid grey; border-color:#eb477d; ">
    
       
        <div style = "margin-top:10px;" class = "input-group">
          <h2 style="color:#eb477d"><b>Terms and Conditions</b></h2>
          <br>
          <p style="color:#000000">sdfdsfsdfdsfdsfdsgsdfdsgsdfds
          dfdsfsdfdsfdsfdsfdsfsdgdsfsddsgsdf
          dsfdsgsdfsdgsdfdsgsd
          gsdfdsfdsfdsfsd
           
          </p>
          <br>
          <div class="b" style="align: right; padding-left:190px; padding-top:135px;">
         <button type="submit" class="btn btn-primary btn-sm btn-block" >
                          Register</button></div>
        </div>
        
      </div>
    </form> 
      
  </div>
    
    
    
  
  
  
   </div>



        <!-- <a href="#0" class="cd-close-form">Close</a> -->
    

      


 
  <!-- /.container -->
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    

<div class="footer">

 <?php include 'footer.php';?>
</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>
</html>